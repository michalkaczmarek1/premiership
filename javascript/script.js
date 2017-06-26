$(document).ready(function() {
	
	$('#navlist').lavalamp({
		easing: 'easeOutBack'
	});

	$("#top-menu a.bookmark").hover(function() {
		$(this).addClass('active');
	}, function() {
		$(this).removeClass('active');
	});

	$("#nav-footer a.bookmark").hover(function() {
		$(this).addClass('active-l');
	}, function() {
		$(this).removeClass('active-l');
	});

	$("#nav-down-team a.bookmark").hover(function() {
		$(this).addClass('active-l');
	}, function() {
		$(this).removeClass('active-l');
	});

	$("#nav-down-player a.bookmark").hover(function() {
		$(this).addClass('active-l');
	}, function() {
		$(this).removeClass('active-l');
	});

});