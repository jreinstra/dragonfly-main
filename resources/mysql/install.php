<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/mysql/connect.php");

$time = time();

$sql = array(
			"CREATE TABLE queue_url (
				PID int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY(PID),
				URL varchar(400) NOT NULL,
				Degree int NOT NULL
			)",
			"CREATE TABLE queue_document (
				docID int NOT NULL,
				PRIMARY KEY(docID),
				BaseURL varchar(400) NOT NULL,
				Degree int NOT NULL
			)",
			"CREATE TABLE documents (
				docID int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY(docID)
				URL varchar(400),
				LastCrawled bigint
			)",
			"CREATE TABLE facts (
				factID int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY(factID),
				docID int,
				Subject varchar(200),
				Text varchar(1000)
			)",
			"CREATE TABLE subjects (
				subjectID int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY(subjectID),
				Name varchar(255)
			)"
			);

for($i = 0; $i < count($sql); $i++) {
	$success = true;
	$stmt = mysqli_prepare($con, $sql[$i]) or $success = false;
		mysqli_stmt_execute($stmt) or $success = false;
	
	if($success) {
		mysqli_stmt_close($stmt);
		echo "Success for query no. ". $i . "<br>";
	} else {
		echo "Error: " . mysqli_error($con) . mysqli_stmt_error($stmt) . "<br>";
	}
}
?>

?>