jQuery(window).load(function() {

	jQuery(".loader_inner").fadeOut();
	jQuery(".loader").delay(400).fadeOut("slow");

});

jQuery(document).ready(function(){

	jQuery(".login").fancybox({
 		'scrolling' : 'no',
		'titleShow'	: false,
		'onClosed'	: function() {
		    jQuery(".modal").hide();
		}
 	});

 	jQuery(".fancy").fancybox();
	
	jQuery(".select").selecter();

	jQuery(".bxSlider").bxSlider({
		'pager'        : false
	});
	jQuery(".hitSlider").bxSlider({
		'useCSS'       : false,
		'minSlides'    : 5,
		'maxSlides'    : 5,
		'moveSlides'   : 1,
		'slideWidth'   : 225,
		'infiniteLoop' : true
	});
	jQuery('.foot_menu ul').autocolumnlist({
		columns: 2
	});
});