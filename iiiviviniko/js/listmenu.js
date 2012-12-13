$(document).ready(function(){
	$(".left-menu").mouseenter(function(){
		$(this).children(".listhidden").css("visibility", "visible");
	}).mouseleave(function(){
		$(this).children(".listhidden").css("visibility", "hidden");
	});
	
	$(".images-list > li ").mouseenter(function(){
		$(this).children("a").children("font").css("display", "block");
	}).mouseleave(function(){
		$(this).children("a").children("font").css("display", "none");
	});
});

