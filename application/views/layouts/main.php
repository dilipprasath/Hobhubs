<!DOCTYPE html>
<html>
<head>
<title><?php echo $title ?> | <?php echo $this->config->item('site_name') ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="<?php echo asset_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo asset_url('css/bootstrap-responsive.min.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo asset_url('css/style.css') ?>" rel="stylesheet" media="screen">
</head>
<body>
<header>
<div class="head_bg navbar-fixed-top">
<div class="row-fluid">
<div class="span4  hobhubs_logo">
<img src="<?php echo asset_url('img/hobhubs_logo.png') ?>">
</div>
</div>
</div>
</header>

 <?php echo  $contents ?>


<script src="<?php echo asset_url('js/jQuery v1.10.2.js') ?>"></script>
<script src="<?php echo asset_url('js/bootstrap.min.js') ?>"></script>
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
<script type="text/javascript">
$(function() {
    $("[name=toggler]").click(function(){
            $('.toHide').hide('slow');
            $("#blk-"+$(this).val()).show('slow');
    });
 });
</script>

</body>
</html>