<?php
//require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/mysql/connect.php");

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
			"CREATE TABLE links (
				FromURL varchar(400) NOT NULL,
				ToURL varchar(400) NOT NULL
			)",
			"CREATE TABLE websites (
				siteID int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY(siteID),
				URL varchar(400),
				Rating double
			)",
			"CREATE TABLE website_document (
				siteID int NOT NULL,
				docID int NOT NULL,
				PRIMARY KEY(siteID, docID)
			)",
			"CREATE TABLE documents (
				docID int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY(docID),
				siteID int,
				URL varchar(400),
				LastCrawled bigint
			)",
			"CREATE TABLE document_fact (
				docID int NOT NULL,
				factID int NOT NULL,
				PRIMARY KEY(docID, factID)
			)",
			"CREATE TABLE subjects (
				subjectID int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY(subjectID),
				Name varchar(255)
			)",
			"CREATE TABLE subject_fact (
				subjectID int NOT NULL,
				factID int NOT NULL,
				PRIMARY KEY(subjectID, factID)
			)",
			"CREATE TABLE facts (
				factID int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY(factID),
				docID int,
				subjectID int,
				Active tinyint,
				Text varchar(1000),
				Timestamp bigint
			)",
			"CREATE TABLE users (
				userID int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY(userID),
				Email varchar(255),
				Password varchar(255),
				Salt varchar(255)
			)",
			"CREATE TABLE user_project (
				userID int NOT NULL,
				projectID int NOT NULL,
				PRIMARY KEY(userID, projectID)
			)",
			"CREATE TABLE projects (
				projectID int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY(projectID),
				Name varchar(255)
			)",
			"CREATE TABLE project_fact (
				projectID int NOT NULL,
				factID int NOT NULL,
				PRIMARY KEY(projectID, factID)
			)",
			"CREATE TABLE project_note (
				projectID int NOT NULL,
				noteID int NOT NULL,
				PRIMARY KEY(projectID, noteID)
			)",
			"CREATE TABLE notes (
				noteID int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY(noteID),
				Content text,
				Timestamp bigint
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