//Menu expand
$(document).ready(function(){
	$(".expand_icon").click(function(){
		$("#menuExpand").fadeToggle(300);
		if ($("#menu-bar").css("display") == 'block') {
			$("#menu-bar").css("display","none");
			$("#menu-close").css("display","block");	
		}
		else {
			$("#menu-bar").css("display","block");
			$("#menu-close").css("display","none");
		}
	});
});
