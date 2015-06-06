<?php
$content = $_POST["result"];
$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/myText2.txt" ,"wb");
fwrite($fp,$content);
fclose($fp);

?>