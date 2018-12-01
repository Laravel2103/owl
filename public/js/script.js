$(document).ready(function(){

	$('[data-toggle="tooltip"]').tooltip(); 
	
	$(".test").mouseenter(function(){
		$(this).css("paddingLeft","10px");
	});
	$(".test").mouseleave(function(){
		$(this).css("paddingLeft","20px");
	});

	// Change logo when hover it
	$("#logo").mouseenter(function(){
		$(this).attr("src","img/logo6.png");
	});
	$("#logo").mouseleave(function(){
		$(this).attr("src","img/logo8.png");
	});
	$("#btnaddfriend").click(function(){
		$("#showaddfriend").toggle();
	});
});