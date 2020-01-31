$(document).ready(function(){
	$(window).scroll(function() {
	  var scrollTop = $(window).scrollTop();
	  if ( scrollTop > 100 ) { 
	    $(".menu").css({"position":"fixed","top":"0"});
	    $(".menu_expand").css({"position":"fixed","top":"45px"});
	  } else if (scrollTop == 0) {
	  	$(".menu").css({"position":"absolute"});
	  	$(".menu_expand").css({"position":"absolute"});
	  }
	});
});