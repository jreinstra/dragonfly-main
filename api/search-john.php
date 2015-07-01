<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/mysql/connect_eb.php");
$q = urldecode($_GET["q"]);

$uncut = explode(" ", $q);
$words = array();
foreach($uncut as $word) {
	if(strlen($word) > 0) {
		$words[] = $word;
	}
}

echo "<pre>"; print_r($words); echo "</pre>";

$matches = array();
foreach($words as $word) {
	$word = strtolower($word);
	$sql = "SELECT fact_id, occurrences FROM lexicon WHERE term=? ORDER BY occurrences DESC";
	$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
		mysqli_stmt_bind_param($stmt, 's', $word) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_bind_result($stmt, $factID, $factMatches);
	
	$empty = true;
	while(mysqli_stmt_fetch($stmt)) {
		$empty = false;
		if(isset($matches[$factID])) {
			$matches[$factID] = $matches[$factID] + $factMatches;
		}
		else {
			$matches[$factID] = $factMatches;
		}
	}
	mysqli_stmt_close($stmt);
	
	if($empty) {
		$q = strtolower($word);
		if(substr($q, 0, 1) != " ") $q = " " . $q;
		if(substr($q, -1) != " ") $q = $q . " ";
		$sql = 'SELECT fact_id, fact FROM eb.facts WHERE LOWER(fact) LIKE "%?%"';
		$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
			mysqli_stmt_bind_param($stmt, 's', $q) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_bind_result($stmt, $factID, $factText);
		
		$newFacts = array();
		while(mysqli_stmt_fetch($stmt)) {
			$newFacts[] = array("ID"=>$factID, "Text"=>$factText);
		}
		mysqli_stmt_close($stmt);
		
		foreach($newFacts as $newFact) {
			$newFactMatches = substr_count($newFact["Text"], $q);
			$sql = 'INSERT INTO lexicon (term, fact_id, occurrences) VALUES (?, ?, ?)';
			$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
				mysqli_stmt_bind_param($stmt, 'sii', $word, $newFact["ID"], $newFactMatches) or die(mysqli_stmt_error($stmt));
				mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
				mysqli_stmt_close($stmt);
			if(!isset($matches[$newFact["ID"]])) $matches[$newFact["ID"]] = 0;
			$matches[$newFact["ID"]] = $matches[$newFact["ID"]] + $newFactMatches;
		}
	}
}

//$subject = getSubject($q);
if(substr($q, 0, 1) != " ") $q = " " . $q;
if(substr($q, -1) != " ") $q = $q . " ";

$sql = 'SELECT fact FROM eb.facts WHERE LOWER(fact) LIKE "%' . strtolower($q) . '%"';

$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
	mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
	mysqli_stmt_bind_result($stmt, $text);

$facts = array();
while(mysqli_stmt_fetch($stmt)) {
	$facts[] = $text;
}



while($row=mysql_fetch_array($result)){
      array_push($facts,$row['fact']);
      echo $row['fact'];
}

$result = array("Matches"=>$matches, "Subject"=>$q, "Facts"=>$facts);
//echo "<pre>"; print_r($result); echo "</pre>";
echo json_encode($result);

?>