<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>: : Hobup : :</title>
		<script type="text/javascript">
			function followed(element){ 
				var WEBURL = $("#WEBURL").val();
				if(element) {
				$.ajax({
					type : 'POST',
					url :   WEBURL + 'home/update_follow',
					dataType : 'json',
					data: {element: element},
					success : function(data) 	{
						//$('#follow').html('<span id="follow">Following</span>')
						window.location.reload();
						//for firefox
						//top.location.href=top.location.href
					},	
				});	
				}
				return false;
			}
		</script>
	</head>
	<body>
		<div class="container">
			
			<?php
			if(isset($existing_hobbys))
			{ ?>
				<div class="row">
					<?php foreach($existing_hobbys as $val) 
					{ ?>
						<div class="col-sm-2 hobby-boxes margin-t20   ">
							<h1 class="text-center margin-t30"><?php echo $val->hobname; ?></h1>
							<button type="button" class="btn btn-success hup-btn-width center-block margin-t30 margin-b10 hobby-fol-btn" value= "<?php echo $val->hodid;  ?>" onclick="unfollowed(this.value);"><span id="unfollow">Following</span></button>
						</div>
					<?php 
					} ?>
				</div>
			<?php 
			} ?>
			
			<div class="row main-searchbar-bg margin-t40">
				<div class="col-lg-12">
					<div id="custom-search-input">
						<div class="input-group col-md-12">
							<form action="<?php echo base_url('search_hobby') ?>" method="post" name="hobbySearch_form" >
									<input type="text" name="WEBURL" id="WEBURL" value= "<?php echo base_url(); ?>" hidden>
									<input type="text" name="keywords" class="search-query form-control" placeholder="Search for your Hobby(s)" />
								<span class="input-group-btn">
									<button class="btn btn-info" type="submit"> <span class=" glyphicon glyphicon-search"  ></span> </button>
								</span> 
							</form>  
						 </div>
					</div>
				</div>
			</div>
		  <!--Hobby Boxes-->

			<?php 
			if(isset($search_details))
			{ ?>
				<div class="row">
					<?php foreach($search_details as $row) 
					{
						$hobId  = $row->Hob_id;
						if(!in_array($hobId,$hob_ids))
						{ ?>
							<div class="col-sm-2 hobby-boxes margin-t20   ">
								<h1 class="text-center margin-t30"><?php echo $row->Hob_hobbylist; ?></h1>
								<button type="button" class="btn btn-success hup-btn-width center-block margin-t30 margin-b10 hobby-fol-btn" value= "<?php echo $row->Hob_id;  ?>" onclick="followed(this.value); this.onclick=null;"><span id="follow">Follow</span></button>
							</div>
						<?php 
						}
					} ?>
				</div>
			<?php 
			} 
			?>
				
		</div>
	
		<div class="prev-button">
			<button type="button" class="btn btn-info pull-left hup-btn-width"><!--<a href="<?php //echo base_url('search_hobby')?>">Cancel</a>-->Cancel</button>
		</div>
		<div class="next-button">
			<button type="button" class="btn btn-info pull-left hup-btn-width">Next</button>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
	</body>
</html>