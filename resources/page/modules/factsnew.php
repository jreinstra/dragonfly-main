<blockquote>


 <p name="text" style="color:white;"><b><?php echo $i; ?>.</b> <?php echo $fact; ?>

</p> 
 <a href="http://www.britannica.com/search?query=<?php echo $subject; ?>"  target="_blank"><small  style="color:white;">Encyclopedia Britannica<cite title="Source Title"></cite></small></a>
<div><div class="btn-group btn-group-sm" role="group" aria-label="...">
  <button type="button" class="btn btn-group-sm btn-default"> <a href="#" rel="tooltip" title="" class="tooltip-test" data-original-title="Did this fact address your search?"><img src="http://beemsearch.com/glyphicons_343_thumbs_up.png" style="width:18px; height:18px;"> </a></button>
    <button type="button" class="btn btn-group-sm btn-default"> <a href="#" rel="tooltip" title="" class="tooltip-test" data-original-title="Did this fact address your search?"><img src="http://beemsearch.com/glyphicons_344_thumbs_down.png" style="width:18px; height:18px;"></a>         <input style="width:0px; height:0px; background-color:rgba(255, 255, 255, .7); text-decoration:none;" name="text" value="<?php echo $fact; ?>" > </button>
<script src="http://apis.google.com/js/platform.js"></script>
<script src="https://apis.google.com/js/platform.js"></script>
<!--<div class="g-savetodrive" 
     data-src="http://dragonflysearch.com/myText.txt" 
     data-filename="Notes" 
     data-sitename="Dragonfly"> 
     </div>
-->

<button type="submit" class="btn btn-group-sm btn-default"  onclick="Addtext()"> <img src="http://beam.la/glyphicons-151-edit.png" style="width:18px; height:18px;"> </button>

<button type="button" class="btn btn-group-sm btn-default"   onclick="responsiveVoice.speak('<?php echo $fact; ?>');"> <img src="http://dragonflysearch.com/images/glyphicons-185-volume-up.png" style="width:18px; height:18px;"></button>

<!-- Large modal -->

  </blockquote>
  <script>
        //Populate voice selection dropdown
        var voicelist = responsiveVoice.getVoices();
       
      var vselect = $("#voiceselection");
 
        $.each(voicelist, function() {
                vselect.append($("<option />").val(this.name).text(this.name));
        });
</script>