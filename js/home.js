function open() {
	// $('.log-options-list').removeClass('hide');
	$('.log-options-list').show("slow").fadeIn("slow");
}

function close() {
	$('.log-options-list').hide(200);
}

$(document).click(function() {
	close();
});

$(".more-vert").click(function(e) {
    open();
    e.stopPropagation(); // This is the preferred method.
    return false;        // This should not be used unless you do not want
                         // any click events registering inside the div
});


var isOpen = false;

$(".filter-label").click(function() {
	
	if(!isOpen) {

		// If not open, open the filter area ...

		$(".filter-items").slideToggle("slow").fadeIn("slow");
		// $(".filter-items").animate({width: 'show'});
		// $(".filter-items").show("slide", {direction: "left"}, 3000);
	}
    else {

		// Close the filter area (if open) ...

		$(".filter-items").hide("slow").fadeOut("slow");
		// $(".filter-items").animate({width: 'hide'});
		// $(".filter-items").hide("slide", {direction: "left"}, 3000);
	}

	isOpen = !isOpen;
});

$('.list-items').click(function() {

	var destination;

	if($(this).hasClass('in-opt')) {
		destination = 'login.php';
	}
	else {
		destination = 'signup.php';
	}

	window.location.href = destination;
});

$('.login').click(function() {
	window.location.href = 'login.php';
});

$('.signup').click(function() {
	window.location.href = 'signup.php';
});

$('.card').click(function() {
	window.location.href = 'video-repo.php';
});

$('.media-links').click(function() {
	window.location.href = '';
});