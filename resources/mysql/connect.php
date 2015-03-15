<?php

//old hosted database settings
/*$dbhost = localhost;
$dbuser = "root";//beam_root
$dbpass = "BEAM123";//Rx4sS4KJwDVEMGZc
$dbname = "beam";*/

//i)8aiYsbXHeGxox[P(TdLZkG*BJm9LJGzZD9tkbWmC8%y2X^tt

$dbhost = localhost;
$dbuser = "beam";//beam_root
$dbpass = "i)8aiYsbXHeGxox[P(TdLZkG*BJm9LJGzZD9tkbWmC8%y2X^tt";//Rx4sS4KJwDVEMGZc
$dbname = "dragonfly";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);
if(mysqli_connect_errno($con)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else {
	mysqli_select_db($con, $dbname);
}

?>