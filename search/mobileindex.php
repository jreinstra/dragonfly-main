<?php
$q = $_GET["q"];
if(!isset($q) || strlen($q) < 1) {
	header("Location: /");
	die();
}
$q = strtolower($q);
$results = file_get_contents("http://" . $_SERVER["HTTP_HOST"] . "/api/suggest.php?q=" . urlencode($q));
$results = file_get_contents("http://" . $_SERVER["HTTP_HOST"] . "/api/search.php?q=" . urlencode($q));
$results = json_decode($results, true);

$subject = $results["Subject"];
$facts = $results["Facts"];

$rad = array('search/?q=steve+jobs', 'search/?q=Colbert+report', 'search/?q=Mitosis', 'search/?q=Marxism', 'search/?q=Industrial+Revolution', 'search/?q=Dragonfly'); // array of filenames

  $n = rand(0, count($rad)-1); // generate random number size of the array
  $radsearch = "$rad[$n]"; // set variable equal to which random filename was chosen

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../Test/assets/ico/favicon.png">

    <title><?php echo $subject; ?> - dragonfly</title>

    <!-- Bootstrap core CSS -->
 <link href="http://beam.la/bootstrap.css" rel="stylesheet">
       <link href="http://beam.la/glyphicons-halflings-regular.svg" >

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Muli:300,400,300italic,400italic">
 
<link rel="stylesheet" href="http://dragonflyapp.com/modern.css">
<link rel="stylesheet" href="http://chrisgrant.co/css/custom.css">



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../Test/dist/css/carousel.css" rel="stylesheet">
  </head>
  
  <style>
  
</style>
   <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://media-cache-ak0.pinimg.com/originals/52/ca/09/52ca090a26388d04dff0fed9947effbd.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://media-cache-ak0.pinimg.com/originals/52/ca/09/52ca090a26388d04dff0fed9947effbd.jpg">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://media-cache-ak0.pinimg.com/originals/52/ca/09/52ca090a26388d04dff0fed9947effbd.jpg">
                    <link rel="apple-touch-icon-precomposed" href="http://media-cache-ak0.pinimg.com/originals/52/ca/09/52ca090a26388d04dff0fed9947effbd.jpg">
                                   <link rel="shortcut icon" href="http://media-cache-ak0.pinimg.com/originals/52/ca/09/52ca090a26388d04dff0fed9947effbd.jpg">

 <body>
  <form action="/search/mobileindex.php/" method="GET">
    <div class="input-group">
      <span style="color:white; background-color:#B80000 ; font-size:20px;"class="input-group-addon"><strong>D</strong></span>
      <input  name="q" value="<?php echo $subject; ?>" type="text" class="form-control" placeholder="What are you looking for?">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit" style="color: color: #D00000;">Fly</button>
      </span>
    </div><!-- /input-group -->
</form>

<!-- <form action="/search/mobileindex.php" method="GET">
<div style="padding:15PX;">
<div style=" padding:3px;" class="input-group">

      
  <input   name="q"  value="<?php echo $subject; ?>" placeholder="What are you researching?" type="text" class="form-control" >
 <span style="
     background-color:white;
    padding: 0px;
    color:white ;
    border-radius:0em;
    font-size: .9em;
" class="input-group-btn">
        <button class="btn btn-default" type="submit"><a href="index.html" style="text-decoration:none; color: #D00000;">Fly</a></button>
      </span>
</div>
</form>-->

<?php
	$i = 1;
	foreach($facts as $fact) {
		include($_SERVER["DOCUMENT_ROOT"] . "/resources/page/modules/mobilefacts.php");
		$i++;
	}
?>
  </div>
  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46804681-1', 'beam.la');
  ga('send', 'pageview');

</script>
</html>