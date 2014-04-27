<div id="img_left2" class="disabled"><a href="#">Back</a></div>
<div id="img_right2" class="disabled"><a href="#">Done</a></div>
<div class="hob_select_box container">
  <h4>Profile Photo</h4>
  <div class="jc-demo-box">
  <div class="crop_img_sel"> <img src="<?php echo base_url('uploads/user_photos/temp').'/'.$file_name; ?>" id="target" alt="[Jcrop Example]"  />
   </div>
   
    <div id="preview-pane">
      <div class="preview-container"> <img src="<?php echo base_url('uploads/user_photos/temp').'/'.$file_name; ?>" class="jcrop-preview" alt="Preview" /> </div>
    </div>
    <!-- @end #preview-pane -->
    
    <div id="form-container">
      <form id="cropimg" name="cropimg" method="post" action="">
        <input type="hidden" id="x" name="x">
        <input type="hidden" id="y" name="y">
        <input type="hidden" id="w" name="w">
        <input type="hidden" id="h" name="h">
        <input type="submit" id="submit" value="Crop Image!" style="display:none">
        <div class="row photo_crop_link">
<span class="pull-left"><a href="#"onclick="$('input[id=submit]').click();">Done Cropping</a></span>
<span class="pull-right"><a href="<?php echo base_url('/profile_photo') ?>">Cancel</a></span>
</div>
      </form>
    </div>
    <!-- @end #form-container --> 
  </div>
  <?php if(isset($file_name)){ ?>
  <?php echo $file_name; } ?> 
  
  <!--Hobby box1 start--> 
  
  <!--Hobby box1 end--> 
</div>
