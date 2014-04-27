<!DOCTYPE html>
<html>
<head>
<title><?php echo $title ?> | <?php echo $this->config->item('site_name') ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo base_url('img/fav.ico') ?>" rel="shortcut icon" type="image/ico" />
<!-- Bootstrap -->
<link href="<?php echo asset_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo asset_url('css/bootstrap-responsive.min.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo asset_url('css/style.css') ?>" rel="stylesheet" media="screen">
<!--[if lte IE9 ]>
<link rel="stylesheet" type="text/css" href="<?php echo asset_url('css/ie9-down.css') ?>" />
<![endif]-->

<link href="<?php echo asset_url('css/profile_page.css') ?>" rel="stylesheet" media="screen">
<script src="<?php echo asset_url('js/jQuery v1.10.2.js') ?>"></script>
<script src="<?php echo asset_url('js/bootstrap.min.js') ?>"></script>
</head>
<body style="background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;">
  <header>
  <div id="top_header" class="container-fluid">
    <div class="row-fluid">
      <div class="span2 side_top_fe"> <a href="#"> <img src="http://hobhubs.com/test/assets/img/hobhubs_logo.png" class="mar_auto"></a>
        <section class="bot-zero"> <?php echo $this->session->userdata('firstname');  ?><br>
          <?php echo $this->session->userdata('lastname');  ?> </section>
      </div>
      <div class="span2"></div>
      <div class="span2 pos_rel">
        <div class="pos_rel profile_photo"><img alt="" style=" width:150px; height:180px" src=""></div>
      </div>
      <div class="span2"></div>
      <div class="span2 row-fluid marcutl">
        <div class="span12 chat_top1">Chat<span><a href="<?php echo base_url('user/logout')  ?>"><img src="http://hobhubs.com/test/assets/img/chat-settings.png"></a></span></div>
        <div class="row-fluid">
          <div class="span12 chat_bot1 force-overflow" id="style-1">
            <ul class="unstyled chat_list">
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo1.jpg">Monisha Priya</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo2.jpg">William James</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo1.jpg">Priya</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo4.jpg">Abi</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo3.jpg">Sharmila</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo1.jpg">Monisha Priya</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo4.jpg">Moni</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo2.jpg">Kamal</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo1.jpg">Monisha Priya</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo3.jpg">Monisha Priya</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo2.jpg">William James</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo1.jpg">Monisha Priya</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo2.jpg">William James</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo4.jpg">Shalini</a></li>
    <li><a href="#"><img src="http://hobhubs.com/test/assets/img/chat_photo1.jpg">Monisha Priya</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="span2 row-fluid marcutl">
        <div class="span12 abtme_top">About Me</div>
        <div class="row-fluid">
          <div class="span12 abtme_bot">
            <ul class="unstyled abtme_list">
              <li><a href="#"><img src="http://hobhubs.com/test/assets/img/photos-icon.png">Photos</a></li>
              <li><a href="#"><img src="http://hobhubs.com/test/assets/img/post-icon.png">Text</a></li>
              <li><a href="#"><img src="http://hobhubs.com/test/assets/img/h-icon.png">Hobby(s)</a></li>
              <li><a href="#"><img src="http://hobhubs.com/test/assets/img/friends-icon.png">Friends</a></li>
              <li><a href="#"><img src="http://hobhubs.com/test/assets/img/apps-icon.png">Apps</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<?php echo  $contents ?>
<script type="text/javascript">
// select all desired input fields and attach tooltips to them
$("#myform :input").tooltip({
// place tooltip on the right edge
position: "center right",
// a little tweaking of the position
offset: [-2, 10],
// use the built-in fadeIn/fadeOut effect
effect: "fade",
// custom opacity setting
opacity: 0.7
});
</script> 
<script language='javascript' type='text/javascript'>
function check(input) {
if (input.value != document.getElementById('password').value) {
input.setCustomValidity('The two passwords must match.');
} else {
input.setCustomValidity('');}}
</script>
<script language="javascript" type="text/javascript">
var test = document.createElement('input');
if (!('placeholder' in test)) {
    $('input').each(function () {
        if ($(this).attr('placeholder') != "" && this.value == "") {
            $(this).val($(this).attr('placeholder'))
                   .css('color', 'grey')
                   .on({
                       focus: function () {
                         if (this.value == $(this).attr('placeholder')) {
                           $(this).val("").css('color', '#000');
                         }
                       },
                       blur: function () {
                         if (this.value == "") {
                           $(this).val($(this).attr('placeholder'))
                                  .css('color', 'grey');
                         }
                       }
                   });
        }
    });
}
</script>
<script type="text/javascript">
    $(function () {
        $("[rel='tooltip']").tooltip();
	 });
</script>

<script src="<?php echo asset_url('js/classie.js') ?>"></script> 
<script src="<?php echo asset_url('js/modalEffects.js') ?>"></script>
<script src="<?php echo asset_url('js/bootstrap-popover.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function()
{
    $('#myMenu').on('click','a',function()
    {
        // fade out all open subcontents
        $('.subcontent:visible').hide();
        // fade in new selected subcontent
        $('.subcontent[id='+$(this).attr('data-id')+']').show();
    });
});
</script>
</body>
</html>