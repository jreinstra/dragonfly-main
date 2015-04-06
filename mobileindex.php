<?php
   $rad = array('search/mobileindex.php/?q=steve+jobs', 'search/mobileindex.php/?q=the+daily+show', 'search/mobileindex.php/?q=bill+gates', 'search/mobileindex.php/?q=elon+musk', 'search/mobileindex.php/?q=nanking+massecre', 'search/mobileindex.php/?q=redox+reaction', 'search/mobileindex.php/?q=acid+base', 'search/mobileindex.php/?q=particle+physics'); // array of filenames

  $n = rand(0, count($rad)-1); // generate random number size of the array
  $radsearch = "$rad[$n]"; // set variable equal to which random filename was chosen

?>

<!DOCTYPE html>
<!-- saved from url=(0037)http://dragonflyapp.com/betahome.php# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://dragonflyapp.com/Test/assets/ico/favicon.png">

    <title>dragonfly</title>

    <!-- Bootstrap core CSS -->
    <link href="http://beam.la/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="http://dragonflyapp.com/Test/dist/css/carousel.css" rel="stylesheet">
  <style>
  body {
  }
   h1 {
  color:#FF3333;
  font-family:Avenir, Avenir next, Heiti SC, Nanum Gothic;
  font-size: 60px;
  }
  .nav {
  padding:15px;
  }
h4 {
color:green;
}
.header{
height:50px;
width:100%;
padding:0px;
}
.col-lg-6{
padding:20px;
}
img {
    height:200px;
    width:200px;
}
    #wrap {  padding: 0; overflow: hidden; }

   iframe {
        -ms-zoom: 0.75;
        -moz-transform: scale(0.75);
        -moz-transform-origin: 0 0;
        -o-transform: scale(0.75);
        -o-transform-origin: 0 0;
        -webkit-transform: scale(0.75);
        -webkit-transform-origin: 0 0;
    }
</style></head>
  
  
  <body class="">
<!-- Button trigger modal -->

   <div style="padding-top:100px;" class="col-lg-6 col-lg-offset-3">
   
   
<a href="#" style="  text-decoration:none;">
<h2 class="text-center" style="color:#FF3300 ;">dragonfly - <i>beta</i></h2>

</a>
<form action="/search/mobileindex.php/" method="GET">
	<div class="input-group">
		<input name="q" placeholder="Research engine for students" type="text" class="form-control" style="background-color:rgba(255, 255, 255, .7)">
		
		<span class="input-group-btn">
		<input type="submit" value="Fly" style=" background-color:rgba(255, 255, 255, .6)" class="btn btn-default" type="button">
		</span>
	</div>
</form>
<center><div class="btn-group" style="padding:5px; color:rgba(255, 255,255, .6)">
<button type="button" class="btn btn-default" style="background-color:rgba(255, 255, 255, .6)"><a href="http://dragonflysearch.com/<?php echo $radsearch; ?>" style="color:black; text-decoration:none;">Trending</a></button>
<button type="button" class="btn btn-default center" style="background-color: rgba(255, 255, 255, .6)"><a href="http://dragonflysearch.com/<?php echo $radsearch; ?>" style="color:black; text-decoration:none;">Recommended</a></button>
</div></center>


</div>
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
       <script src="./index_files/npm.js"></script>
   <script src="./index_files/bootstrap.js"></script>
     <script src="./index_files/transition.js"></script>
     <script src="./index_files/collapse.js"></script>

<script src="./index_files/jquery.min.js"></script>
 <script src="./index_files/bootstrap.min.js"></script>
 <script src="./index_files/docs.min.js"></script>

  <script src="http://beam.la/npm.js"></script>
   <script src="http://beam.la/bootstrap.js"></script>
     <script src="http://beam.la/transition.js"></script>
     <script src="http://beam.la/collapse.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
 <script src="http://getbootstrap.com/assets/js/docs.min.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60786207-1', 'auto');
  ga('send', 'pageview');

</script>
  
<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1426438923190">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=dragonflyapp.com%2C%2F%2Fdragonflyapp.com%2Chttp%3A%2F%2Fdragonflyapp.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1426438923190" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=dragonflyapp.com%2C%2F%2Fdragonflyapp.com%2Chttp%3A%2F%2Fdragonflyapp.com" scale="exactfit">                </object></div></body></html>