<?php
$content = "some text here";
$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/myText" . $x . ".txt" ,"wb");
fwrite($fp,$content);
fclose($fp);

?>