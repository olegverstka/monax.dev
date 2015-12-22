$(window).load(function() {

	$(".loader_inner").fadeOut();
	$(".loader").delay(400).fadeOut("slow");

});

$(document).ready(function(){
	
	$(".select").selecter();

	$(".bxSlider").bxSlider({
		'pager'        : false
	});
	$(".hitSlider").bxSlider({
		'useCSS'       : false,
		'minSlides'    : 5,
		'maxSlides'    : 5,
		'moveSlides'   : 1,
		'slideWidth'   : 225,
		'infiniteLoop' : true
	});
	$('.foot_menu ul').autocolumnlist({
		columns: 2
	});
});