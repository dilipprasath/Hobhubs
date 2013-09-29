<div id="img_left2" class="disabled"><a href="#">Back</a></div>
<div class="hob_select_box container">
<h4>Profile Photo</h4>
<?php if(isset($file_name)){ ?>
<?php echo $file_name; } ?>
<form action="" method="post">
  <input type="hidden" name="x1" value="" />
  <input type="hidden" name="y1" value="" />
  <input type="hidden" name="x2" value="" />
  <input type="hidden" name="y2" value="" />
  <div id="img_right"><input type="submit" value="Done"  class="hh_button"></div>
</form>
<!--Hobby box1 start-->
<div class="row photo_crop">
	<img id='user_img' src="<?php echo base_url('uploads/user_photos/temp').'/'.$file_name; ?>"
</div>

<!--Hobby box1 end-->
</div>