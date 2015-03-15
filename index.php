<?php
  $bg = array('backgroundimages/bananaback1.jpg', 'backgroundimages/bananaback2.jpg', 'backgroundimages/bananaback3.jpg', 'backgroundimages/bananaback4.jpg', 'backgroundimages/bananaback5.jpg', 'backgroundimages/bananaback6.jpg', 'backgroundimages/bananaback7.jpg', 'backgroundimages/bananaback8.jpg', 'backgroundimages/bananaback10.jpg', 'backgroundimages/bananaback11.jpg', 'backgroundimages/bananaback12.jpg', 'backgroundimages/bananaback13.jpg', 'backgroundimages/bananaback14.jpg'); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $backgroundimage = "$bg[$i]"; // set variable equal to which random filename was chosen
  $rad = array('search/?q=steve+jobs', 'search/?q=steven+colbert', 'search/?q=john+stewart', 'search/?q=apple', 'search/?q=iPhone', 'search/?q=holocaust', 'search/?q=chicken', 'search/?q=armadillo'); // array of filenames

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
background: url("<?php echo $backgroundimage; ?>") no-repeat;
background-size: 100%;
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
<div style="padding:10px;">

<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" style="opacity:.9;">
  Static Full Dragonfly
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" style="width:90%; ">
    <div class="modal-content" style="height:600px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:red;">Dragonfly Full Launch April 1st</h4>
      </div>
      <div class="modal-body">
        <iframe src="http://beam.la/modernsearchcenter.html" style="width:125%; height:650px"></iframe>
      </div>
     
    </div>
  </div>
</div>

   <div class="col-lg-6 col-lg-offset-3">
   
   
<a href="#" style="  text-decoration:none;">
<div class="text-center"><img class="text-center" style="padding-top:0px; padding-left:0%; width:350px; height:250px;" src="http://beam.la/DragonflyLogo.png"></div>
<h1 class="text-center" style="color:red;">dragonfly - <i>beta</i></h1>

</a>
<form action="/search/" method="GET">
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
    <div class="navbar navbar-default navbar-fixed-bottom" style="background-color: rgba(50, 50, 50, 0.7); float:bottom;">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse">
            <ul style="padding: 0px;" class="nav navbar-nav">
               <li><a href="http://dragonflyapp.com/about.html" style="color:white;">API</a></li>
              <li><a href="http://dragonflyapp.com/about.html" style="color:white;">About</a></li>
                            <li><a href="mailto:bayareastudententrepreneurs@gmail.com" style="color:white;">Contact</a></li>

              <li><a href="https://www.facebook.com/bayareastudententrepreneurs" style="color:white;">Facebook</a></li>
                            <li><a href="http://twitter.com/codingsf" style="color:white;">Twitter</a></li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
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


  
<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1426438923190">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=dragonflyapp.com%2C%2F%2Fdragonflyapp.com%2Chttp%3A%2F%2Fdragonflyapp.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1426438923190" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=dragonflyapp.com%2C%2F%2Fdragonflyapp.com%2Chttp%3A%2F%2Fdragonflyapp.com" scale="exactfit">                </object></div></body></html>