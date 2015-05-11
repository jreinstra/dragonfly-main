<blockquote>
  <p><b><?php echo $i; ?>.</b> <?php echo $fact; ?>
                             

</p> 
 <a href="http://en.wikipedia.org/wiki/<?php echo $subject; ?>"  target="_blank"><small>en.wikipedia.org<cite title="Source Title"></cite></small></a>
<div><div class="btn-group btn-group-sm" role="group" aria-label="...">
  <button type="button" class="btn btn-group-sm btn-default"> <a href="#" rel="tooltip" title="" class="tooltip-test" data-original-title="Did this fact address your search?"><img src="http://beemsearch.com/glyphicons_343_thumbs_up.png" style="width:18px; height:18px;"> </a><script>  tooltip  $('.tooltip-test').tooltip() </script></button>
    <button type="button" class="btn btn-group-sm btn-default"> <a href="#" rel="tooltip" title="" class="tooltip-test" data-original-title="Did this fact address your search?"><img src="http://beemsearch.com/glyphicons_344_thumbs_down.png" style="width:18px; height:18px;"></a><script>  tooltip  $('.tooltip-test').tooltip() </script></button>
 <button type="button" class="btn btn-group-sm btn-default" data-toggle="modal" data-target="#myModal2"  > <img src="http://beam.la/glyphicons-187-move.png" style="width:18px; height:18px;"></button>
 <button type="button" class="btn btn-group-sm btn-default"  > <img src="http://beam.la/glyphicons-151-edit.png" style="width:18px; height:18px;"></button>
<button type="button" class="btn btn-group-sm btn-default"   onclick="responsiveVoice.speak('<?php echo $fact; ?>');"> <img src="http://dragonflysearch.com/images/glyphicons-185-volume-up.png" style="width:18px; height:18px;"></button>

<!-- Large modal -->


<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" style="width:80%; height:93%;">
    <div class="modal-content" style="height:95%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title text-left" id="myModalLabel">More info from - en.wikipedia.org/<?php echo $subject; ?></h4>
      </div>
      <div class="modal-body">
      <!--Facts-->
      
  <div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="http://cdn.animals-pics.com/pictures/ruthlesshumor.com/wp-content/uploads/2012/02/cool-animals-5.jpg" alt="...">
      <div class="caption">
        <h3>A Main Idea</h3>
        <p>Echoing facts about one of the main ideas pulled from HP's suggest API here.</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
   <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="http://cdn.animals-pics.com/pictures/ruthlesshumor.com/wp-content/uploads/2012/02/cool-animals-5.jpg" alt="...">
      <div class="caption">
        <h3>A second Main idea</h3>
        <p>Pull this from the website. Echoing facts about one of the main ideas pulled from HP's suggest API here.</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
   <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="http://cdn.animals-pics.com/pictures/ruthlesshumor.com/wp-content/uploads/2012/02/cool-animals-5.jpg" alt="...">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p>Pull this from the website. Echoing facts about one of the main ideas pulled from HP's suggest API here.</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
</div>
       
       </div>
       </div>
      <div class="modal-footer">
      </div>
    </div>
  
</div>


 
 



  </blockquote>
  <script>
        //Populate voice selection dropdown
        var voicelist = responsiveVoice.getVoices();
       
      var vselect = $("#voiceselection");
 
        $.each(voicelist, function() {
                vselect.append($("<option />").val(this.name).text(this.name));
        });
</script>