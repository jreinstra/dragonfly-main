<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/mysql/connect.php");
$q = urldecode($_GET["q"]);

$subject = getSubject($q);

$sql = "SELECT Text FROM facts WHERE Subject=? ORDER BY PID ASC LIMIT 10";
$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
	mysqli_stmt_bind_param($stmt, 's', $subject) or die(mysqli_stmt_error($stmt));
	mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
	mysqli_stmt_bind_result($stmt, $text);
	
$facts = array();
while(mysqli_stmt_fetch($stmt)) {
	$facts[] = $text;
}

$result = array("Subject"=>$subject, "Facts"=>$facts);
//echo "<pre>"; print_r($result); echo "</pre>";
echo json_encode($result);


function getSubject($q, $front = false, $back = false) {
	if(strlen($q) < 1) return "none";
	else {
		$con = $GLOBALS["con"];
		$param = $q;
		if($front == true) $param = "%" . $param;
		if($back == true) $param = $param . "%";
		$sql = "SELECT Name FROM subjects WHERE Valid=1 AND Name LIKE ? LIMIT 1";
		$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
		mysqli_stmt_bind_param($stmt, 's', $param) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_bind_result($stmt, $name);
		if(mysqli_stmt_fetch($stmt)) {
			return $name;
		}
		else {
			if($back == false) {
				return getSubject($q, false, true);
			}
			else if($front == false) {
				return getSubject($q, true, true);
			}
			else {
				return getSubject(substr($q, 0, strlen($q) - 1), false, false);
			}
		}
	}
}
?>
