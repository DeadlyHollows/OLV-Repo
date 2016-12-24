$(document).click(function(e) {
	$(".entries").removeClass("highlight");
});

$(".entries").click(function(e) {
	$(".entries").removeClass('highlight').addClass("clicked");
	$(this).addClass('highlight');
	e.stopPropagation();
	return false;
});