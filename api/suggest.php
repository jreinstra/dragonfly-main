<?php

$q = $_GET["q"];

$result = file_get_contents("http://en.wikipedia.org/w/api.php?action=opensearch&search=" . $q . "&format=json");
$result = json_decode($result, true);
$result = $result[1];

$result = json_encode($result);
echo $result;
