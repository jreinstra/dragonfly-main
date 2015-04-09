<script>
var splitSentences = function(text) {
    //var messy = text.split(/((?:\S[^\.\?\!]*)[\.\?\!]*)/g);
    var messy = text.match(/\(?[^\.\?\!]+[\.!\?]\)?/g);
    var clean = [];
    for(var i = 0; i < messy.length; i++) {
        var s = messy[i];
        var sTrimmed = s.trim();
        if(sTrimmed.length > 0) {
            if(sTrimmed.indexOf(' ') >= 0) {
                clean.push(sTrimmed);
            } else {
                var d = clean[clean.length - 1];
                d = d + s;
                
                var e = messy[i + 1];
                if(e.trim().indexOf(' ') >= 0) {
                    d = d + e;
                    i++;
                }
                clean[clean.length - 1] = d;
            }
        }
    }
    return clean;
};


var text = "<?php echo $fact; ?>";
    
var sentences = splitSentences(text);
//<?php echo $fact; ?> = sentences;

var ol = document.getElementById("result");
for(var i = 0; i < sentences.length; i++) {
ol.innerHTML = sentences[i];


    var li = document.createElement("p");
     li.appendChild(document.createTextNode(sentences[i]));
    ol.appendChild(li);
    console.log(sentences[i]);
}

    
</script>

<?php 
$sentence = preg_split('/\(?[^\.\?\!]+[\.!\?]\)?/g',$fact);
?>
<blockquote>
  <p style="color:#383838"><b><?php echo $i; ?> .</b><?php echo $fact; ?>
                             

</p> 
 <small><a href="#" data-toggle="modal" data-target="#myModal2"  onClick='document.getElementById("<?php echo $i; ?>").src="http://en.wikipedia.org/wiki/<?php echo $subject; ?>";'> en.wikipedia.org </a> <cite title="Source Title"></cite></small>
<div><div class="btn-group btn-group-sm" role="group" aria-label="...">
  <button type="button" class="btn btn-group-sm btn-default"> <a href="#" rel="tooltip" title="" class="tooltip-test" data-original-title="Did this fact address your search?"><img src="http://beemsearch.com/glyphicons_343_thumbs_up.png" style="width:18px; height:18px;"> </a><script>  tooltip  $('.tooltip-test').tooltip() </script></button>
    <button type="button" class="btn btn-group-sm btn-default"> <a href="#" rel="tooltip" title="" class="tooltip-test" data-original-title="Did this fact address your search?"><img src="http://beemsearch.com/glyphicons_344_thumbs_down.png" style="width:18px; height:18px;"></a><script>  tooltip  $('.tooltip-test').tooltip() </script></button>
 <!-- Large modal -->


<!-- Start Fact Source Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" "==" style="display: none;" align="left">
  <div class="modal-dialog" style="width:80%; height:93%;" align="left">
    <div class="modal-content" style="height:95%;">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title text-left" id="myModalLabel">en.wikipedia.org/<?php echo $subject; ?></h4>
      </div>
      <div class="modal-body">
        <iframe id="<?php echo $i; ?>" frameborder="0" style="text-decoration:none; width:100%; height:75%;"></iframe>
        <div style="position:fixed; background-color:#F8F8F8;  border:1px solid #C8C8C8; border-radius:5px; width:30%; height:350px;"> <form name="contactform" method="post" action="/email.php">
<table style="width:100%; padding:4px;">

<tbody><tr>
<td valign="top" style="padding:5px;">
<textarea class="form-control" rows="10" placeholder="Notes" name="comments" maxlength="10000" cols="15"></textarea>
</td>
</tr>
</tbody></table>



<p> </p>
<div style="padding-right:5px; padding-left:5px;">


<input style="padding:10px;" class="form-control" id="exampleInputEmail" placeholder="Email" type="text" name="email" maxlength="80" size="30">

</div>
<p> </p>

<div style="width:200px; padding-right:5px; padding-left:5px;">

<input style="padding:10px; background-color: #0DA50F" class="btn btn-success btn-lg" type="submit" value="Save"><a href="/email.php">    </a>

</div>
</form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

 <!--End Fact Sourcce Modal-->

 
 
</div></div>


  </blockquote>