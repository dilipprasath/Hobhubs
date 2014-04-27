<!-- popup form end --> 
<div class="login_box">
	<div class="row-fluid">
<h4 class="lp_color">Lost Password Reset</h4>
<p class="text-info">Please enter your desired new password below</p>
<form action="" method="post" name="login_form" >
<div id="myform">      
<input name="newpw" type="password" class="input_username span12 padding2 " placeholder="Password" id="password" title="Password should contain atleast 1 (special characters, Numbers, Uppercase & Lowercase Letter)" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])^\D.{6,}"  />
</div>
<input name="confirmpw" type="password" class="input_password span12 padding2" placeholder="Confirm  Password" id="passwordconf"  oninput="check(this)" required 
pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])^\D.{6,}" />
<p></p>
<input type="submit" value="Save Changes" class=" hh_button span6 ">
<input type="reset" value="Cancel" class="hh_button span6  " >
</form>

</div>

</div>