<?php
$content = $_POST["result"];
$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/myText.txt" ,"wb");
fwrite($fp,$content);
fclose($fp);

?>