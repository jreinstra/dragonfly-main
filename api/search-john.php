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
			$matches[$factID] = $matches[$factID] * 10;
		}
		else {
			$matches[$factID] = $factMatches;
		}
	}
	mysqli_stmt_close($stmt);
	if($empty == true) {
		$query = $word;
		if(substr($query, 0, 1) != " ") $query = " " . $query;
		if(substr($query, -1) != " ") $query = $query . " ";
		$queryLike = "%" . $query . "%";
		$sql = 'SELECT fact_id, fact FROM eb.facts WHERE LOWER(fact) LIKE ?';
		$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
			mysqli_stmt_bind_param($stmt, 's', $queryLike) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_bind_result($stmt, $factID, $factText);
		$newFacts = array();
		while(mysqli_stmt_fetch($stmt)) {
			$newFacts[] = array("ID"=>$factID, "Text"=>$factText);
		}
		mysqli_stmt_close($stmt);
		foreach($newFacts as $newFact) {
			$newFactMatches = number_format(substr_count(strtolower($newFact["Text"]), $query), 1) / strlen($newFact["Text"]);
			$sql = 'INSERT INTO lexicon (term, fact_id, occurrences) VALUES (?, ?, ?)';
			$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
				mysqli_stmt_bind_param($stmt, 'sid', $word, $newFact["ID"], $newFactMatches) or die(mysqli_stmt_error($stmt));
				mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
				mysqli_stmt_close($stmt);
			if(!isset($matches[$newFact["ID"]])) $matches[$newFact["ID"]] = 0;
			$matches[$newFact["ID"]] = $matches[$newFact["ID"]] + $newFactMatches;
		}
	}
}

asort($matches);
$matches = array_reverse($matches, true);

$facts = array();
foreach($matches as $id=>$value) {
	$sql = "SELECT fact FROM facts WHERE fact_id=? LIMIT 1";
	$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
		mysqli_stmt_bind_param($stmt, 'i', $id) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_bind_result($stmt, $factText);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
	$facts[] = $factText;
	if(count($facts) >= 10) break;
}



/*while($row=mysql_fetch_array($result)){
      array_push($facts,$row['fact']);
      echo $row['fact'];
}*/

$result = array("Subject"=>$q, "Facts"=>$facts);
//echo "<pre>"; print_r($result); echo "</pre>";
echo json_encode($result);

?>
