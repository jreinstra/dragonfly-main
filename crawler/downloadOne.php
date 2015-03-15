<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/mysql/connect.php");
$url = urldecode($_GET["u"]);
$subject = urldecode($_GET["s"]);
if(!isset($url) || !isset($subject)) die();
$docID = getDocID($url);

$parts = parse_url($url);
$baseUrl = $parts["scheme"] . "://" . $parts["host"];

$contents = file_get_contents($url);
if($contents == null) {
	$sql = "INSERT INTO subjects (Name, Valid) VALUES (?, 0)";//$subject
	$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
		mysqli_stmt_bind_param($stmt, 's', $subject) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_close($stmt);
	die();
}

$localfile = fopen($_SERVER["DOCUMENT_ROOT"] . "/documents/" . $docID . ".html", "w") or die("Unable to open file!");
fwrite($localfile, $contents);
fclose($localfile);
echo "http://localhost:8080/crawler/parseOne.php?d=" . $docID . "&b=" . urlencode($baseUrl);
echo "file: " . file_get_contents("../crawler/parseOne.php?d=" . $docID . "&b=" . urlencode($baseUrl) . "&s=" . urlencode($subject));


function getDocID($url) {
	$con = $GLOBALS["con"];
	
	$sql = "SELECT docID FROM documents WHERE URL=?";
	$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
		mysqli_stmt_bind_param($stmt, 's', $url) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_store_result($stmt);
	if(mysqli_stmt_num_rows($stmt) < 1) {
		mysqli_stmt_close($stmt);
		
		$sql = "INSERT INTO documents (URL) VALUES (?)";
		$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
			mysqli_stmt_bind_param($stmt, 's', $url) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_bind_result($stmt, $docID);
			mysqli_stmt_fetch($stmt);
		return getDocID($url);
	}
	else {
		mysqli_stmt_bind_result($stmt, $docID);
		mysqli_stmt_fetch($stmt);
		return $docID;
	}
}

?>