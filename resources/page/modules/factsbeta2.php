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


<!-- Modal -->
<div align="left" class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" "==" style="display: none;">
  <div class="modal-dialog" style="width:80%; height:93%;">
    <div class="modal-content" style="height:95%;">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title text-left" id="myModalLabel">en.wikipedia.org/<?php echo $subject; ?></h4>
      </div>
      <div class="modal-body">
        <iframe id="<?php echo $i; ?>" frameborder="0"  align="left" style="text-decoration:none; width:100%; height:75%;"></iframe>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


 
 
</div></div>


  </blockquote>