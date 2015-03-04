<?php

//old hosted database settings
$dbhost = localhost;
$dbuser = "root";//beam_root
$dbpass = "BEAM123";//Rx4sS4KJwDVEMGZc
$dbname = "beam";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);
if(mysqli_connect_errno($con)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else {
	mysqli_select_db($con, $dbname);
}

?>