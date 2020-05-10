jQuery(document).ready(function($){
	if ($(window).width()>992)
{
$(".collapse").addClass("in");	
}
	$( window ).resize(function() {
if ($(window).width()>992)
{
$(".collapse").css("height","auto");
$(".collapse").addClass("in");	
}
	});
	
}); 
