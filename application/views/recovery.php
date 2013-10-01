
<div class="container">
<div class="row-fluid padding1">
<div class="span6 offset2">
<h4 class="normal_font">Having problem signing in?</h4><br>
<form action=""  method="post">
<label class="radio">
<input id="rdb1" type="radio" name="toggler" value="1" />I don't know my password</label>
<div id="blk-1" class="toHide1 toHide" style="display:none">
<p><small>To reset your password, enter the email address you use to sign in to hobhubs. This can be your Email address.</small></p>
<label class="stacked_label">
<p><input type="text" name="Email" value="" class="english-text" size="30" placeholder="Email address"></p></label>
</div>
<br>    
<label class="radio">
<input id="rdb3" type="radio" name="toggler"  value="3" />I don't know my username</label><br>
<div id="blk-2" class="toHide1 toHide" style="display:none">
   <p><small>Enter the username or email address you used to sign in  hobhubs.</small></p>
<label class="stacked_label">
<p><input type="text" name="Signmail" value="" class="english-text" size="30" placeholder="Email address"></p></label> 
</div>
<div class="ar_ct_button">
<input type="submit" value="continue"class="hh_button" />
</div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
$(function() {
    $("[name=toggler]").click(function(){
            $('.toHide').hide();
            $("#blk-"+$(this).val()).show('slow');
    });
 });
</script>
