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
for(var i = 0; i < 2; i++) {
ol.innerHTML = sentences[i];

//    var li = document.createElement("li");
//     li.appendChild(document.createTextNode(sentences[i]));
//    ol.appendChild(li);
//    console.log(sentences[i]);
}

    
</script>
<blockquote>
  <p id="result"><b><?php echo $i; ?>.</b> 
                             

</p> 
 <small>en.wikipedia.org<cite title="Source Title"></cite></small>
<div><div class="btn-group btn-group-sm" role="group" aria-label="...">
  <button type="button" class="btn btn-group-sm btn-default"> <a href="#" rel="tooltip" title="" class="tooltip-test" data-original-title="Did this fact address your search?"><img src="http://beemsearch.com/glyphicons_343_thumbs_up.png" style="width:18px; height:18px;"> </a><script>  tooltip  $('.tooltip-test').tooltip() </script></button>
    <button type="button" class="btn btn-group-sm btn-default"> <a href="#" rel="tooltip" title="" class="tooltip-test" data-original-title="Did this fact address your search?"><img src="http://beemsearch.com/glyphicons_344_thumbs_down.png" style="width:18px; height:18px;"></a><script>  tooltip  $('.tooltip-test').tooltip() </script></button>
 <button type="button" class="btn btn-group-sm btn-default" data-toggle="modal" data-target="#myModal2"  onClick='document.getElementById("<?php echo $i; ?>").src="http://en.wikipedia.org/wiki/<?php echo $subject; ?>";'> <img src="http://beam.la/glyphicons-187-move.png" style="width:18px; height:18px;"></button>
 <!-- Large modal -->


<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" "==" style="display: none;">
  <div class="modal-dialog" style="width:80%; height:93%;">
    <div class="modal-content" style="height:95%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title text-left" id="myModalLabel">en.wikipedia.org/<?php echo $subject; ?></h4>
      </div>
      <div class="modal-body">
        <iframe  id="<?php echo $i; ?>" frameborder="0"  style="text-decoration:none; width:100%; height:75%;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


 
 
</div></div>


  </blockquote>