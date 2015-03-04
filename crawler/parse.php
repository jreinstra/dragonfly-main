<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/lib/simplehtmldom/simple_html_dom.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/mysql/connect.php");

$sql = "SELECT * FROM queue_document LIMIT 100";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if(mysqli_num_rows($result) < 1) die();

while($row = mysqli_fetch_assoc($result)) {
	parseFileNew($_SERVER["DOCUMENT_ROOT"] . "/documents/" . $row["docID"] . ".html", $row["BaseURL"], $row["docID"]);
	deleteFile($row["docID"]);
	//parseFile($_SERVER["DOCUMENT_ROOT"] . "/documents/" . $row["docID"] . ".html", $row["BaseURL"]);
}

function parseFileNew($path, $baseUrl, $docID) {
	echo "parse file<br>";
	$content = file_get_contents($path, true);
	$title = getTitle($content);
	deleteFacts($title);
	logSubject($title);
	$GLOBALS["paragraphs"] = array();
	$contentParse = $content;
	while($contentParse != null) {
		$contentParse = parseText($contentParse);
	}
	echo "got paragraphs<br>";
	$paragraphs = $GLOBALS["paragraphs"];
	foreach($paragraphs as $text) {
		logFact($text, $title, $docID);
	}
	
	/*$GLOBALS["urls"] = array();
	$contentParse = $content;
	while($contentParse != null) {
		$contentParse = parseURL($contentParse, $baseUrl);
	}
	logURLs($GLOBALS["urls"]);*/
	//echo "<pre>"; print_r($GLOBALS["urls"]); echo "</pre>";
}

function getTitle($content) {
	$pattern = '#<title>(.*)</title>#Us';
	$matches = array();
	if(preg_match($pattern, $content, $matches)) {
		$result = $matches[1];
		$index = strpos($result, " - Wikipedia, ");
		$result = substr($result, 0, $index);
		return $result;
	}
	return "null?!";
}

function parseText($content) {
	$matches = array();
	$pattern = '#<p>(.*)</p>#Us'; // http://www.phpbuilder.com/board/showthread.php?t=10352690
	if(preg_match($pattern, $content, $matches)) {
		$paragraph = htmlspecialchars(strip_tags($matches[1]));
		if(strlen($paragraph) > 30) {
			$GLOBALS["paragraphs"][] = $paragraph;
		}
		//echo "<pre>"; echo $paragraph; echo "</pre><br><br>";
		//echo "<pre>"; print_r($GLOBALS["paragraphs"]); echo "</pre>";
		//parseParagraph($paragraph);
		
		$patternReplace = '/<p>(.*)</p>/';
		$content = preg_replace($pattern, "", $content, 1);
		return $content;
	}
	else {
		return null;
		//echo "<h1>False!</h1>";
	}
}

function parseParagraph($paragraph) {
	//$paragraph = strtolower($paragraph);
	/*for($i = 99;$i > 0;$i=$i - 1){
		$paragraph = str_replace("world","", $paragraph);
	}*/
	$sentences = preg_split('/(?<=[.?!])\s+/', $paragraph, -1, PREG_SPLIT_NO_EMPTY);
	echo "<pre>"; print_r($sentences); echo "</pre><br><br>";
}

/*function parseFile($path, $baseUrl) {
	$con = $GLOBALS["con"];
	$html = file_get_html($path, true);
	$dom = $html["DOM"];
	$contents = $html["Contents"];
	//echo "<pre>"; print_r($dom); echo "</pre>";
	
	//echo "find: " . $html->find("div.mw-content-text", 0)->plaintext . "<br>";
	parsePlaintext($dom->plaintext);
	//parseURLs($dom, $baseUrl);
}

function parsePlaintextNew($text) {
	$matches = array();
	$found = preg_match("/^\\s+[A-Za-z,;'\"\\s]+[.?!]$/", $text, $matches);
	echo "<pre>Matches: "; print_r($matches); echo "</pre> found: $found<br>";
}

function parsePlaintext($text) {
	echo "<br><br><br>text: " . $text;
	$sentences = array();
	$token = strtok($text, ".");
	while($token !== false) {
		//echo $token . "<br>";
		$sentences[] = (string) $token;
		$token = strtok(".");
	}
	//echo "<pre>"; print_r($sentences); echo "</pre>";
	$words = array();
	foreach($sentences as $sentence) {
		$wordArray = array();
		$token = strtok($sentence, " ");
		while($token !== false) {
			$wordArray[] = (string) $token;
			$token = strtok(" ");
		}
		$words[] = $wordArray;
	}
	echo "<pre>"; print_r($words); echo "</pre>";
}*/

function parseURL($content, $baseUrl) {
	$matches = array();
	$pattern = '#href="(.*)"#Us'; // http://www.phpbuilder.com/board/showthread.php?t=10352690
	if(preg_match($pattern, $content, $matches)) {
		$href = $matches[1];
		if(substr($href, 0, 1) == "/" && substr($href, 1, 1) != "/") {
			$href = $baseUrl . $href;
			if($baseUrl == "http://en.wikipedia.org") {
				$GLOBALS["urls"][] = $href;
			}
		}
		else {
			$parts = parse_url($href);
			$baseUrl = $parts["scheme"] . "://" . $parts["host"];
			//echo $baseUrl . "<br>";
			if($baseUrl == "http://en.wikipedia.org") {
				$GLOBALS["urls"][] = $href;
			}
		}
		//echo "<pre>"; echo $paragraph; echo "</pre><br><br>";
		//echo "<pre>"; print_r($GLOBALS["paragraphs"]); echo "</pre>";
		//parseParagraph($paragraph);
		
		$patternReplace = '/href="(.*)"/';
		$content = preg_replace($pattern, "", $content, 1);
		return $content;
	}
	else {
		return null;
		//echo "<h1>False!</h1>";
	}
}

function logURLs($urls) {
	$con = $GLOBALS["con"];
	foreach($urls as $url) {
		$sql = "DELETE FROM queue_url WHERE URL=?";//$url
		$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
			mysqli_stmt_bind_param($stmt, 's', $url) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_close($stmt);
			
		$sql = "INSERT INTO queue_url (URL) VALUES (?)";//$url
		$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
			mysqli_stmt_bind_param($stmt, 's', $url) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_close($stmt);
	}
}

function deleteFacts($title) {
	$con = $GLOBALS["con"];
	$sql = "DELETE FROM facts WHERE Subject=?";
	$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
			mysqli_stmt_bind_param($stmt, 's', $title) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_close($stmt);
}

function deleteFile($docId) {
	//echo "about to delete file...<br>";
	$con = $GLOBALS["con"];
	$sql = "DELETE FROM queue_document WHERE docID=?";//$docId;
	$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
	//echo "1";
		mysqli_stmt_bind_param($stmt, 'i', $docId) or die(mysqli_stmt_error($stmt));
	//echo "2";
		mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
	//echo "3";
		mysqli_stmt_close($stmt);
	//echo "done<br";
}

function logFact($fact, $title, $docID) {
	$con = $GLOBALS["con"];
	$sql = "INSERT INTO facts (docID, Subject, Text) VALUES (?, ?, ?)";//$docID, $title, $fact
	$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
			mysqli_stmt_bind_param($stmt, 'iss', $docID, $title, $fact) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_close($stmt);
}

function logSubject($title) {
	$con = $GLOBALS["con"];
	$sql = "SELECT subjectID FROM subjects WHERE Name=?";//$title
	$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
		mysqli_stmt_bind_param($stmt, 's', $title) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_store_result($stmt);
		$rows = mysqli_stmt_num_rows($stmt);
		mysqli_stmt_close($stmt);
	if($rows < 1) {
		$sql = "INSERT INTO subjects (Name) VALUES (?)";//$title
		$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
			mysqli_stmt_bind_param($stmt, 's', $title) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_close($stmt);
	}
}


?>