<?php

if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
   
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if( !isset($_POST['email']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $email_from = $_POST['email']; // required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
 
    $email_message .= "Your Notes: ".clean_string($comments)."\n"."\n"."You're notes from dragonflysearch.com";
     
      $email_to = $email_from;
    $email_subject = "Your Notes";
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>


<!DOCTYPE html>
<html lang="en">
 <head>
<script>
 alert("Your notes have been sent! Check your spam folder if you can't find them in a few minutes.");
</script>
  <meta http-equiv="refresh" content="0; url=/index.php" />
 <script type="text/javascript">
            window.location.href = "http://dragonflysearch.com/"
        </script>
 </head>
 
 <body>
<script>
    alert("Your notes have been saved! Expect an email shortly. If you don't see it, check your spam folder.");

</script>

 </body>
</html>
<?php
}
?>
