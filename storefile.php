<?php
if (!isset($_SESSION["loop_count"])
$_SESSION["loop_count"] = 0;

$content = $_POST["result"];
$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/myText" . $_SESSION["loop_count"] . ".txt" ,"wb");
fwrite($fp,$content);
fclose($fp);

$_SESSION["loop_count"]++;

?>