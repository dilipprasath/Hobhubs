$(function() {


$('#save').click(function() {

  $('#save2').submit();
  		dis();  // function close pop up

});


$(document).click(function(event) { 
    if($(event.target).parents().index($('#toPopup')) == -1) {
        if($('#toPopup').is(":visible")) {
				  
var r=confirm("Are you sure want to Cancel ?");
if (r==true)
  {
			var ind = $("#indexpage").val();			
		    window.location = ind;
  }
				  
        }
    }        
})



$('#cancel').click(function() {
var r=confirm("Are you sure want to Cancel ?");
if (r==true)
  {
			var ind = $("#indexpage").val();			
		    window.location = ind;
  }
});

$("a#tag").click(function(){
changeTag();
});

function changeTag(){
var base = $("#base").val();
$('img').each(function () {
  var curSrc = $(this).attr('src');
  var curRes = base+'img/tag-icon-bw.png';
  var curRep = base+'img/tag-icon.png';
  if ( curSrc === curRes ) {
      $(this).attr('src', curRep);
	  $("#taghere").val($("#cmt").val());
	  $("#cmt").val("");
	  $("#cmt").attr("placeholder", "#TagHere");
  }
  if ( curSrc === curRep ) {
      $(this).attr('src', curRes);
	  $("#cmt").val($("#taghere").val());
  }
});
}
function dis(){
				$("#toPopup").fadeOut("normal");	
			$("#backgroundPopup").fadeOut("normal");
}

$('#userfile').change(function() {
  $('#imgup').submit();
});

	$("#my").load(function() {
			loading(); // loading
			setTimeout(function(){ // then show popup, deley in .5 second
				loadPopup(); // function show popup
			}, 500); // .5 second
	return false;
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

	$("div.close").click(function() {
		disablePopup();  // function close pop up
	});

	$(this).keyup(function(event) {
		if (event.which == 27) { // 27 is 'Ecs' in the keyboard
			disablePopup();  // function close pop up
		}
	});

        $("div#backgroundPopup").click(function() {
		disablePopup();  // function close pop up
	});
/*
	$('a.livebox').click(function() {
		alert('Hello World!');
	return false;
	});
	* */

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
	/************** end: functions. **************/
}); // jQuery End
