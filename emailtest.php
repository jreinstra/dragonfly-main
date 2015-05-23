<?php

$email = $_POST["email"];

$title = $_POST["title"];

$notes = $_POST["notes"];



$to = $email;

$subject = "$title - Notes";

$message = $notes;

$from = "bayareastudententrepreneurs@gmail.com";

$headers = "From:" . $from;

$headers = "From: " . $from . "\r\n";

$headers .= "Reply-To: ". "bayareastudententrepreneurs@gmail.com" . "\r\n";

$headers .= "CC: bayareastudententrepreneurs@gmail.com\r\n";

$headers .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($to,$subject,$message,$headers);

?>