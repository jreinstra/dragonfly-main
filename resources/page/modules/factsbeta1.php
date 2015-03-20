<?php // test.php Rev:20130820_1000
$re = '/# Split sentences on whitespace between them.
    (?<=                # Begin positive lookbehind.
      [.!?]             # Either an end of sentence punct,
    | [.!?][\'"]        # or end of sentence punct and quote.
    )                   # End positive lookbehind.
    (?<!                # Begin negative lookbehind.
      Mr\.              # Skip either "Mr."
    | Mrs\.             # or "Mrs.",
    | Ms\.              # or "Ms.",
    | Jr\.              # or "Jr.",
    | Dr\.              # or "Dr.",
    | Prof\.            # or "Prof.",
    | Sr\.              # or "Sr.",
    | T\.V\.A\.         # or "T.V.A.",
                        # or... (you get the idea).
    )                   # End negative lookbehind.
    \s+                 # Split on whitespace between sentences.
    /ix';

$text = $fact;

$sentences = preg_split($re, $text, -1, PREG_SPLIT_NO_EMPTY);
for ($i = 0; $i < count($sentences); ++$i) {
   // printf("Sentence[%d] = [%s]\n", $i + 1, $sentences[$i]);
}
$sentences2 = (array_chunk($sentences, $sentences.length, true));
$finalfact = array_merge($sentences2, $fact);
?>

<blockquote>
  <p><b><?php echo $i; ?>.</b> <?php echo $finalfact; ?>
                             

</p> 
 <small>en.wikipedia.org<cite title="Source Title"></cite></small>
<div><div class="btn-group btn-group-sm" role="group" aria-label="...">
  <button type="button" class="btn btn-group-sm btn-default"> <a href="#" rel="tooltip" title="" class="tooltip-test" data-original-title="Did this fact address your search?"><img src="http://beemsearch.com/glyphicons_343_thumbs_up.png" style="width:18px; height:18px;"> </a><script>  tooltip demo $('.tooltip-test').tooltip() </script></button>
    <button type="button" class="btn btn-group-sm btn-default"> <a href="#" rel="tooltip" title="" class="tooltip-test" data-original-title="Did this fact address your search?"><img src="http://beemsearch.com/glyphicons_344_thumbs_down.png" style="width:18px; height:18px;"></a><script>  tooltip demo $('.tooltip-test').tooltip() </script></button>
 <button type="button" class="btn btn-group-sm btn-default" data-toggle="modal" data-target="#myModal2"  onClick='document.getElementById("<?php echo $i; ?>").src="http://en.wikipedia.org/wiki/<?php echo $subject; ?>";'> <img src="http://beam.la/glyphicons-187-move.png" style="width:18px; height:18px;"></button>
 <!-- Large modal -->


<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" =="" style="display: none;">
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