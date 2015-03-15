<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/mysql/connect.php");

$q = $_GET["q"];
$q = preg_replace("/ /", "_", $q);

$result = file_get_contents("http://en.wikipedia.org/w/api.php?action=opensearch&search=" . $q . "&format=json");
$result = json_decode($result, true);
$result = $result[1];
foreach($result as $subject) {
	$sql = "SELECT SubjectID FROM subjects WHERE Name=?";//$subject
	$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
		mysqli_stmt_bind_param($stmt, 's', $subject) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_store_result($stmt);
		if(mysqli_stmt_num_rows($stmt) == 0) {
			$url = $subject;
			$url = preg_replace("/ /", "_", $url);
			$url = "http://en.wikipedia.org/wiki/" . $url;
			//echo "url: " . $url . "<br>";
			$temp = file_get_contents("http://" . $_SERVER["HTTP_HOST"] . "/crawler/downloadOne.php?u=" . urlencode($url) . "&s=" . urlencode($subject), true) . "<br><br><br>";
			echo "result: " . $temp;
		}
		mysqli_stmt_close($stmt);
}
$result = json_encode($result);
echo $result;
