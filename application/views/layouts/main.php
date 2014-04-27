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
<link href="<?php echo asset_url('css/hob-selection.css') ?>" rel="stylesheet" media="screen">
<script src="<?php echo asset_url('js/jQuery v1.10.2.js') ?>"></script>
<script src="<?php echo asset_url('js/bootstrap.min.js') ?>"></script>
</head>
<body>
<header>
<div class="head_bg navbar-fixed-top">
<div class="row-fluid">
<div class="span4  hobhubs_logo">
<a href="<?php echo base_url() ?>">
<img src="<?php echo asset_url('img/hobhubs_logo.png') ?>">
</a>
</div>
<div class="span8"><br>
<a href="<?php echo base_url('user/logout') ?>">
<input type="button" class="btn btn-small fright" value="Logout">
</a>
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
</body>
</html>