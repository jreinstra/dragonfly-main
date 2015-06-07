<?php
$q = $_GET["q"];
if(!isset($q) || strlen($q) < 1) {
	header("Location: /");
	die();
}
$q = strtolower($q);
//$results = file_get_contents("http://" . $_SERVER["HTTP_HOST"] . "/api/suggest.php?q=" . urlencode($q)); //calls the suggest API to store the search results
$results = file_get_contents("http://" . $_SERVER["HTTP_HOST"] . "/api/search-codeday.php?q=" . urlencode($q)); //calls the seach API to get the search data
$searchname = urlencode($q); //making a new variable for the search query 
$searchname = str_replace("+"," ",$searchname); //removing the "+" marks in the string
$searchname = urlencode($q); //making a new variable for the search query 
$searchname = str_replace("+"," ",$searchname); //removing the "+" marks in the string
$results = json_decode($results, true);
$subject = $results["Subject"];
$facts = $results["Facts"];

$rad = array('search/?q=steve+jobs', 'search/?q=Colbert+report', 'search/?q=Mitosis', 'search/?q=Marxism', 'search/?q=Industrial+Revolution', 'search/?q=Dragonfly'); // array of filenames

  $n = rand(0, count($rad)-1); // generate random number size of the array
  $radsearch = "$rad[$n]"; // set variable equal to which random filename was chosen

?>
<!-- saved from url=(0039)http://dragonflyapp.com/betasearch.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><script>
</script>


 
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">

   <title><?php echo $searchname; ?> - dragonfly</title>

   <!-- Core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- <link href="http://beam.la/bootstrap.css" rel="stylesheet">-->
       <link href="http://beam.la/glyphicons-halflings-regular.svg">

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Muli:300,400,300italic,400italic">
 
<link rel="stylesheet" href="http://dragonflyapp.com/modern.css">


   <!-- Javascript for speach API -->    
       <link href="http://beam.la/glyphicons-halflings-regular.svg">
       <script src="http://code.jquery.com/jquery-git2.js"></script>
       <script type="text/javascript" src="http://dragonflysearch.com/scripts/responsivevoice.js"></script>

 

   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
     <script src="../../assets/js/html5shiv.js"></script>
     <script src="../../assets/js/respond.min.js"></script>
   <![endif]-->

   <!-- Custom styles for this page -->
 <style>
img {
   height:60px;
   width:90px;
}
.thumbs-up:hover {
	-moz-box-shadow: 0 0 10px #ccc;
	-webkit-box-shadow: 0 0 10px #ccc;
	box-shadow: 0 0 10px #ccc;
}
.thumbs-down:hover {
	-moz-box-shadow: 0 0 10px #ccc;
	-webkit-box-shadow: 0 0 10px #ccc;
	box-shadow: 0 0 10px #ccc;
}
p {
color:#606060 ;

}
</style></head>

 <body style="background-color:#580000;">
 <div style="">
  <div>
    <div style="width:90%; padding-left:10%;">
      <a href="/" style="text-decoration:none;"><h1 class="text-center" style=" color: #D92F03; font-size: 40px;">dragonfly - <i>beta</i> </h1></a>

   <form action="/search/newsearch.php" method="GET">
       <div class="input-group">
         <input  name="q" value="<?php echo $searchname; ?>" type="text" class="form-control" placeholder="What are you researching?"  style="background-color:rgba(255, 255, 255, .7);">
         <span class="input-group-btn">
         <button class="btn btn-default" type="submit"   style="background-color:rgba(255, 255, 255, .7);">Fly</button>
         </span>
       </div><!-- /input-group -->
     </form>

<!---Tabs -->
 <div role="tabpanel" style="padding:5px;">

 <!-- Nav tabs -->

 <!-- Tab Content -->
 
 <!-- FACTS SECTION TAB START -->
    <form name="contactform" method="post" action="/emailtest.php">
<table style="width:100%; padding:4px;">

<tbody><tr>
<td valign="top" style="padding:5px;">
<textarea class="form-control" rows="10" placeholder="Notes" name="notes" maxlength="10000" cols="15"></textarea>
</td>
</tr>
</tbody></table>



<p> </p>
<div style="padding-right:5px; padding-left:5px;">


<input style="padding:10px;" class="form-control" id="email " placeholder="Email" type="text" name="email" maxlength="80" size="30">

</div>
<p> </p>

<div style="width:200px; padding-right:5px; padding-left:5px;">

<input style="padding:10px; background-color: #0DA50F" class="btn btn-success btn-lg" type="submit" value="Save"><a href="/emailtest.php">    </a>

</div>
</form>
   <hr class="featurette-divider">
<!-- This is where all the facts are pulled from. Facts are not loaded and the code for them is not on this page --> 
<?php
	$i = 1;
	foreach($facts as $fact) {
		include($_SERVER["DOCUMENT_ROOT"] . "/resources/page/modules/factsnew.php");
		$i++;
	}
?>
<!-- FACTS SECTION END -->
<!-- Facts will continue "infinitely" because we're pulling from a seperate file -->

   

</div>
 <!-- End of tabs -->

   </div>
 


   
 



<!-- originally thrown in to increase distance between the notes content and the top of the page. --> 

</div>


   <!-- Bootstrap core JavaScript
   ================================================== -->
   <!-- Placed at the end of the document  -->
  
 <script src="http://beam.la/npm.js"></script>
  <!-- <script src="http://beam.la/bootstrap.js"></script>-->
     <script src="http://beam.la/transition.js"></script>
     <script src="http://beam.la/collapse.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
 <script src="http://getbootstrap.com/assets/js/docs.min.js"></script>


<!--END SCRIPTS-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60786207-1', 'auto');
  ga('send', 'pageview');

</script>

 
</div><div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1426438929368">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=dragonflyapp.com%2C%2F%2Fdragonflyapp.com%2Chttp%3A%2F%2Fdragonflyapp.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1426438929368" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=dragonflyapp.com%2C%2F%2Fdragonflyapp.com%2Chttp%3A%2F%2Fdragonflyapp.com" scale="exactfit">                </object></div> </div> </body> </html>