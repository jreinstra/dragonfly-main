<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/mysql/connect_eb.php");
$q = urldecode($_GET["q"]);

//$subject = getSubject($q);
if(substr($q, 0, 1) != " ") $q = " " . $q;
if(substr($q, -1) != " ") $q = $q . " ";

$sql = 'SELECT fact FROM eb.facts WHERE fact LIKE "%' . $q . '%"';

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

$uncut = explode(" ", $q);
$words = array();
foreach($uncut as $word) {
	if(strlen($word) > 0) {
		$words[] = $word;
	}
}

$result = array("Words"=>$words, "Subject"=>$q, "Facts"=>$facts);
//echo "<pre>"; print_r($result); echo "</pre>";
echo json_encode($result);

?>
