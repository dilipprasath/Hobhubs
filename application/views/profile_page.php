<!DOCTYPE html>
<html lang="en">
		<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap -->
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<link href="<?php echo asset_url('css/bootstrap_style.css') ?>" rel="stylesheet">
		<link href="<?php echo asset_url('css/bootstrap_style.css') ?>" rel="stylesheet">
		<link href="<?php echo asset_url('css/popup.css') ?>" rel="stylesheet">
		<link href="<?php echo asset_url('css/messi.css') ?>" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="<?php echo asset_url('js/jquery-1.11.0.min.js') ?>"></script>
		<script type='text/javascript'>
			$(function(){
			var imgn = $("#lorun").val();
			 if((imgn.length) != 0)
			  {
				 load_popup();
			  }		  
			});
		</script>
		</head>

		<body>
<div class="container">
          <div class="row">
    <div class="col-md-2">
              <div class="profile-picture-box text-center">
        <?php if(isset($User_img)) 
						{ ?>
        <img src="<?php echo base_url('uploads/user_photos/temp')."/".$User_img; ?>"  width="150" height="150" class="hobup-logo img-responsive">
        <?php 
						} 
						else
						{ ?>
        <img src="<?php echo base_url('uploads/user_photos/temp/avatar.jpg') ?>"  width="150" height="150" class="hobup-logo img-responsive">
        <?php 
						} ?>
        <span class="profile-name">
                <?php if(isset($User_firstname)) { echo $User_firstname; } ?>
                <br>
                <?php if(isset($User_lastname)) { echo $User_lastname; } ?>
                </span> </div>
            </div>
    <?php if(isset($error)) { echo $error; } ?>
    <div class="col-md-10">
              <div class="row">
        <div class="col-md-4">
                  <div class="text-center margin-t20 "> <a href="#" id="open-pop-up-1" class="add-photo-box  padding-t50" onclick="$('input[id=userfile]').click();"> <img src="<?php echo base_url('img/add-icon.png'); ?>" width="30" height="29"> Add Photo</a> 
            <!--Form which contains File input type & auto submit --> 
            <!--  <form method="post" id="imgup" name="imgup" enctype="multipart/form-data" action="<?php echo base_url(); ?>home/imgupload" class="form-search">
								--> 
            <?php echo form_open_multipart('home/imgupload','id="imgup"');?>
            <input type="hidden" name="lorun" id="lorun" value="<?php if(isset($img_tmp_name)) { echo $img_tmp_name; } ?>">
            <input style="display:none;" type="file" id="userfile" name="userfile" size="20" />
            </form>
            <br />
            <br />
            <!--Popup Start-->
            <div id="toPopup"> 
                      <!--<div class="close"></div>-->
                      <div class="main-photo-comment-icon"> <a href="#" class="main-comment-icon"><img src="<?php echo base_url()."img/close-icon.png"; ?>" width="14" height="14"></a> <a href="#" class="main-heart-icon"><img src="<?php echo base_url()."img/save-icon.png"; ?>" width="14" height="14"></a> </div>
                      <div> </div>
                      <span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
                      <div id="popup_content">
                <form id="save2" action="<?php echo base_url();?>home/imgsave" method="post">
                          <?php if(isset($img_tmp_name)) { ?>
                          <img src="<?php echo base_url()."prof_temp/".$img_tmp_name; ?>" height="200" width="350">
                          <?php } ?>
                          <br>
                          <input type="text" name="cmt"  class="imgup_pop_text" size="100" maxlength="99" id="cmt" placeholder="Enter your Text here (99 characters)" class="cmt">
                          <span id="characterLeft"></span> <a href="#" id="tag" class="tag" > <img id="tagimg" src="<?php echo base_url()."img/tag-icon-bw.png"; ?>"> </a>
                          <input type="hidden" name="taghere" id="taghere"  class="taghere">
                          <input type="hidden" name="img_name" value="<?php echo $img_tmp_name;?>">
                          <input type="button" name="save" id="save" value="save">
                          <input type="button" name="cancel" id="cancel" value="cancel">
                        </form>
                <input type="hidden" name="base" id="base" value="<?php echo base_url();?>">
              </div>
                      <input type="hidden" name="indexpage" id="indexpage" value="<?php echo base_url('/home/index');?>">
                    </div>
            <!--Popup End--> 
          </div>
                </div>
      </div>
            </div>
    <div style="margin-left:200px;">
					<?php if($user_profile_details)
					{
						foreach($user_profile_details as $row)
						{
						
						$taghere = $row->taghere;
						
						$wordsbyarray = explode(" ",$taghere);
						$wordlen = count($wordsbyarray);
						?>
							<div>
						<?php
						for($i = 0;$i<$wordlen;$i++){
							$retvalue = $this->home_model->findvalidtag($wordsbyarray[$i]);
							echo $retvalue."&nbsp;";
						}
						?>
						</div>
						<?php
						 $img_name = $row->Profile_image_name; ?>
							<div>
								<img src="<?php echo base_url()."prof_img/".$img_name; ?>" height="200" width="350">
							</div>
							
							
						<?php 
						}
					}?>
				</div>
<<<<<<< HEAD
			</div>
		</div>

		<script src="<?php echo asset_url('js/messi.js') ?>"></script>
		<script src="<?php echo asset_url('js/popup.js') ?>"></script>
		<!--<script src="<?php //echo asset_url('js/bootstrap.min.js'); ?>"></script> -->
		<script src="<?php echo asset_url('js/demo.js'); ?>"></script>
		<script type='text/javascript'>
=======
  </div>
        </div>
<script src="<?php echo asset_url('js/popup.js') ?>"></script> 
<script src="<?php echo asset_url('js/bootstrap.min.js'); ?>"></script> 
<script src="<?php echo asset_url('js/demo.js'); ?>"></script> 
<script src="<?php echo asset_url('js/messi.js') ?>"></script> 
<script type='text/javascript'>
>>>>>>> e67fc31bb8c1083fa228c0b384f89a9b1a8480c5
		
			$(function(){	
				$('#characterLeft').css('color', 'green');
				$('#characterLeft').text('99');
				$('#cmt').keyup(function () {
					var max = 99;
					var len = $(this).val().length;
					var ch = max - len;
					$('#characterLeft').text(ch);
					if(len == max){
						alert("You have reached the maximum limit");
						$('#characterLeft').css('color', 'black');
					} 
					if(len < lmax){
						$('#characterLeft').css('color', 'green');
					}
				});
			});
			
			function load_popup(){
				loading(); // loading
				setTimeout(function(){ // then show popup, deley in .5 second
					loadPopup(); // function show popup
				}, 500); // .5 second
				return false;
			}
			/************** start: functions. **************/
			function loading() {
				$("div.loader").show();
			}
			function closeloading() {
				$("div.loader").fadeOut('normal');
			}

			var popupStatus = 0; // set value
			function loadPopup() {
				if(popupStatus == 0) { // if value is 0, show popup
					closeloading(); // fadeout loading
					$("#toPopup").fadeIn(0500); // fadein popup div
					$("#backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
					$("#backgroundPopup").fadeIn(0001);
					popupStatus = 1; // and set value to 1
				}
			}

			function disablePopup() {
				if(popupStatus == 1) { // if value is 1, close popup
					$("#toPopup").fadeOut("normal");
					$("#backgroundPopup").fadeOut("normal");
					popupStatus = 0;  // and set value to 0
				}
			}
			
			$("div.close").click(function() {
				disablePopup();  // function close pop up
			});
				
			/* event for close the popup */
			$("div.close").hover(
				function() {
					$('span.ecs_tooltip').show();
				},
				function () {
					$('span.ecs_tooltip').hide();
				}
			);
				/************** end: functions. **************/
		</script>
</body>
</html>
