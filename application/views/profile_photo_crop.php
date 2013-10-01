<div id="img_left2" class="disabled"><a href="#">Back</a></div>
<div class="hob_select_box container">
<h4>Profile Photo</h4>
<div class="jc-demo-box">
    <header>
      <h1><span>Jcrop Live Avatar Demo</span></h1>
    </header>

    <img src="<?php echo base_url('uploads/user_photos/temp').'/'.$file_name; ?>" id="target" alt="[Jcrop Example]" />

    <div id="preview-pane">
      <div class="preview-container">
        <img src="<?php echo base_url('uploads/user_photos/temp').'/'.$file_name; ?>" class="jcrop-preview" alt="Preview" />
      </div>
    </div><!-- @end #preview-pane -->
    
    <div id="form-container">
      <form id="cropimg" name="cropimg" method="post" action="">
			 <input type="hidden" id="x" name="x">
        <input type="hidden" id="y" name="y">
        <input type="hidden" id="w" name="w">
        <input type="hidden" id="h" name="h">
        <input type="submit" id="submit" value="Crop Image!">
      </form>
    </div><!-- @end #form-container -->
  </div>
<?php if(isset($file_name)){ ?>
<?php echo $file_name; } ?>

<!--Hobby box1 start-->


<!--Hobby box1 end-->
</div>
