<div id="img_left"><a href="<?php echo base_url('/select_hobby') ?>">Back</a></div>
<div id="img_right"><a href="#">Done</a></div>
<div class="hob_select_box container">
<h4>Profile Photo</h4>
<!--Hobby box1 start-->
<br><br><br>
<div class="row">
<a href="#"  onclick="$('input[id=lefile]').click();">
<div class="profile_photo_space row-fluid">
<div class="profile_photo_space_inner"></div>
</div>
</a>
<div class="profile_photo_up">
<form method="post" enctype="multipart/form-data" action="" class="form-search">
<input type="hidden" name="checkval" value="yes">
<div class="profile_photo_up"></div>
<input id="lefile" type="file" style="display:none" name="userfile" onchange="this.form.submit();">
<input id="photoCover" class="input-medium search-query " type="text" onFocus="$('input[id=lefile]').click();">&nbsp;
<a class="btn btn-success" onclick="$('input[id=lefile]').click();">Browse</a>
<br>
</form>
</div>
<div class="hobby_name muted">
</div>
<div class="hobby_name muted"><i>Optional</i></div>


<br>
<br>
</div>


<!--Hobby box1 end-->
</div>
<script>
$("#upload_file").change(function () {
$('#upload_video').submit();
});

</script>