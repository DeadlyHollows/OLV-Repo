$(document).click(function() {
	$("#search-svg").attr('style', 'fill: #AAA');
	$(".search").removeClass("highlight");
});

$(".search").click(function(e) {
	$(this).addClass("highlight");
	$("#search-svg").attr('style', 'fill: #2EA5F5');
	e.stopPropagation();
	return false;
});

$('.video-res').click(function() {
	window.location.href = 'play.php';
});