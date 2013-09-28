<div class="login_box">

<h2>set Password For Hobhubs.com</h2>
<form method="post" action="<?php echo base_url('user/fbpass')."/".$salt ?>"class="bs-docs-example" style="padding-bottom: 15px;">
<div class="docs_input_box row-fluid">
	<br><h4>Please enter your desired new password below.</h4><br>
<input type="password" name="newpw" class="input-block-level f_name padding2 span12" placeholder="New Password" required="">
<input type="password" name="confirmpw" class="input-block-level l_name padding2 span12" placeholder="Confirm New Password" required="">
</div>
<label class="control-label" for="passstrength">Password Strength</label>
<div class="row-fluid">
<input type="submit" value="Save Changes" class="hh_button span6">
 <input class="btn" type="reset" class=" span6" value="Cancel">
</div>
</form>


</div>