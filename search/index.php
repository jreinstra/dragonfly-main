<?php
$q = $_GET["q"];
/*if(!isset($q) || strlen($q) < 1) {
	header("Location: /");
	die();
}*/

$results = file_get_contents("http://localhost:8080/api/search.php?q=" . $q);
$results = json_decode($results, true);

$subject = $results["Subject"];
$facts = $results["Facts"];

?>
<!-- saved from url=(0039)http://dragonflyapp.com/betasearch.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><script async="" src="http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ"></script><script>
</script>


 
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="shortcut icon" href="http://dragonflyapp.com/Test/assets/ico/favicon.png">

   <title><?php echo $subject; ?> - Dragonfly</title>

   <!-- Bootstrap core CSS -->
   <link href="http://beam.la/bootstrap.css" rel="stylesheet">
       <link href="http://beam.la/glyphicons-halflings-regular.svg">

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Muli:300,400,300italic,400italic">
 
<link rel="stylesheet" href="http://dragonflyapp.com/modern.css">
<link rel="stylesheet" href="http://chrisgrant.co/css/custom.css">

   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
     <script src="../../assets/js/html5shiv.js"></script>
     <script src="../../assets/js/respond.min.js"></script>
   <![endif]-->

   <!-- Custom styles for this template -->
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

 
 <body class="">

  <div class="col-xs-10 col-sm-6 col-md-7">

<a href="/" style="text-decoration:none;"><h1 class="text-center" style=" color: #D92F03; font-size: 40px;">dragonfly - <i>beta</i> </h1></a>

<form action="/search/" method="GET">
<div class="input-group">
 <input name="q" placeholder="<?php echo $subject; ?>" type="text" class="form-control">
 <span style="color:#C00000; background-color:#F8F8F8 ;" class="input-group-addon"><input type="submit" value="Fly" style="color:#C00000; text-decoration:none;"></span>
</form>
</div>

<!---Tabs -->
 <div role="tabpanel" style="padding:5px;">

 <!-- Nav tabs -->
 <ul class="nav nav-tabs" role="tablist">
   <li role="presentation" class="active"><a href="http://dragonflyapp.com/betasearch.html#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Facts</a></li>

<div class="text-right" style="padding-left:70%;">
<!-- Button trigger modal -->
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
  Give us feedback!
</button>
<script>$("#myModal").modal("show");
$("#myModal").css("z-index", "1500");
</script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" =="">
  <div class="modal-dialog" style="width:80%; height:95%;">
    <div class="modal-content" style="height:97%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title text-left" id="myModalLabel">Fill out a 5 question survey</h4>
      </div>
      <div class="modal-body">
        <iframe src="./index_files/PJMKQVL.html" style="text-decoration:none; width:100%; height:75%;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

 </ul>

 <!-- Tab panes -->
 <div class="tab-content">
   <div role="tabpanel" class="tab-pane active" id="home">

   <!-- FACTS SECTION START -->
<h1 style="color: 47A2B2"><?php echo $subject; ?> </h1>
<p>
</p><hr class="featurette-divider">

<?php
	$i = 1;
	foreach($facts as $fact) {
		include($_SERVER["DOCUMENT_ROOT"] . "/resources/page/modules/fact.php");
		$i++;
	}
?>
   <!-- FACTS SECTION END -->
<!-- FACTS CONTINUE INFINITELY -->

   </div>
   <div role="tabpanel" class="tab-pane" id="profile">

   <!-- START OF IMAGES -->
   <h1 style="color:#330099">Images </h1>
<hr class="featurette-divider">

Images coming April 1st! 

   </div>
   <div role="tabpanel" class="tab-pane" id="messages">
       <h1 style="color:#33CCFF">Videos </h1>
<hr class="featurette-divider">
Videos coming April 1st! 

   </div>
   <div role="tabpanel" class="tab-pane" id="settings">Not sure how I'm going to do this yet. </div>
 </div>

</div>
 <!-- End of tabs -->

   </div>
 


   
 



<div class="row">
 <div class="col-xs-6 col-sm-3"></div>
 <div class="col-xs-6 col-sm-3"></div>
   <div class="col-xs-6 col-sm-3"></div>

 <div style="padding-top:90px;" class="col-xs-6 col-sm-3">  

 <!--- START -->

 




<!-- END -->
 <div style="position:fixed; background-color:#F8F8F8;  border:1px solid #C8C8C8; border-radius:5px; width:23.6%; height:319.5px;"> <form name="contactform" method="post" action="http://dragonflyapp.com/email.php">
<table style="width:100%; padding:4px;">

<tbody><tr>
<td valign="top" style="padding:5px;">
<textarea class="form-control" rows="7" placeholder="Notes" name="comments" maxlength="10000" cols="15"></textarea>
</td>
</tr>
</tbody></table>

    <p class="lead" style="color:black;padding-left:3px;">Save</p>


<p> </p>
<div style="padding-right:5px; padding-left:5px;">


<input style="padding:10px;" class="form-control" id="exampleInputEmail" placeholder="Email" type="text" name="email" maxlength="80" size="30">

</div>
<p> </p>

<div style="padding-right:5px; padding-left:5px;">

<input style="padding:10px; background-color: #0DA50F" class="btn btn-success btn-lg" type="submit" value="Submit"><a href="http://dragonflyapp.com/email.php">    </a>

</div>
</form>
<!-- End Email Form -->    
      <div id="carbonads-container"><div class="carbonad" style="width:100%;"><div id="azcarbon"></div><script>var z = document.createElement("script"); z.async = true; z.src = "http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(z, s);</script></div></div>

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
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <!--SCRIPTS-->
<!--END SCRIPTS-->


 
</div><div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1426438929368">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=dragonflyapp.com%2C%2F%2Fdragonflyapp.com%2Chttp%3A%2F%2Fdragonflyapp.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1426438929368" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=dragonflyapp.com%2C%2F%2Fdragonflyapp.com%2Chttp%3A%2F%2Fdragonflyapp.com" scale="exactfit">                </object></div></body></html>