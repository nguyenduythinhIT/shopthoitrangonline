$table_index=0;
$index=true;

function exspan_dmk()
{
	if($index)
	{
		$index=false;
		$("#dmk").css({"height":"300px"});
	}
	else
	{
		$index=true;
		$("#dmk").css({"height":0});
	}
}


$(document).ready(function(){
	$('#backtotop').fadeOut();
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('#backtotop').fadeIn();
		} else {
			$('#backtotop').fadeOut();
		}
	});
	$('#backtotop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});
$(document).ready(function(){
	$(window).scroll(function(){
		if ($(this).scrollTop() > 300) {
			$('#head').css({"position":"fixed"});
			$width=$('#head').css("height");
			$('#space').css({"height":$width});
		} else {
			$('#head').css({"position":"relative"});
			$('#space').css({"height":0});
		}
	});

});
