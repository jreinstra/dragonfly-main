<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/mysql/connect_eb.php");
$q = urldecode($_GET["q"]);

//$subject = getSubject($q);

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

$subject = $q;

$result = array("Subject"=>$subject, "Facts"=>$facts);
//echo "<pre>"; print_r($result); echo "</pre>";
echo json_encode($result);

?>
