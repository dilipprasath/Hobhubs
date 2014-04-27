<script src="<?php echo asset_url('js/image-picker.min.js') ?>"></script>
<!--<div id="img_left"><a href="#item1">Back</a></div>-->

<div class="hob_select_box container">
<h4>Select your Hobby(s)</h4>
<?php if (isset($hobbynone)): ?>
<div class="alert alert-error">
<p class="text-error">You must select at least one Hobby</p>
</div>
<?php endif ?>
<!--Hobby box1 start-->
<form method="post" action="" >
<select multiple="multiple" name="groups[]" class="image-picker  limit_callback">
  <option data-img-src="img/logo1.png" value="1">Blogging</option>
  <option data-img-src="img/logo1.png" value="2">Cooking</option>
  <option data-img-src="img/logo1.png" value="3">Dance</option>
  <option data-img-src="img/logo1.png" value="4">Drawing</option>
  <option data-img-src="img/logo1.png" value="5">Football</option>
  <option data-img-src="img/logo1.png" value="6">Gaming</option>
  <option data-img-src="img/logo1.png" value="7">Hiking</option>
  <option data-img-src="img/logo1.png" value="8">Motor sports</option>
  <option data-img-src="img/logo1.png" value="9">Photography</option>
 <!-- <option data-img-src="img/logo3.png" value="10">Surfing</option>-->
</select>
<input type="hidden" name="checkval"  value="done">
<div id="img_right"><input type="submit" value="Next"  class="hh_button"></div>

</form>

 <script type="text/javascript">

    $("select.image-picker.limit_callback")
	.imagepicker({ limit_reached:  
	  function()
	  {alert('you can select only three  items !')},
	  //hide_select:  false,
	  show_label:   true,
    });
 
  </script>

<!--<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>-->

<!--Hobby box1 end-->
</div>
