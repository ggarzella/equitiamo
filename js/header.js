jQuery(document).ready(function(){

	var logoHeight = Math.round(jQuery('#logo-container').height()),
		menuHeight = Math.round(jQuery('.navbar-container').height());

	var processScroll = function (target)
	{
		var top = Math.round(jQuery(target).offset().top) - menuHeight + 1;

		return top;
	};

	var fixedNavbarOnScroll = function ()
	{
		if (Math.round(jQuery(window).scrollTop()) > Math.round(jQuery('#logo-container').innerHeight())) {

			if (!jQuery('.navbar-container').hasClass('fixed')) {
				console.log(Math.round(jQuery(window).scrollTop()));
				console.log("Logo height : " + logoHeight);
				console.log("Menu height : " + menuHeight);

				jQuery('.navbar-container').addClass('fixed');
				jQuery('.mainContent').css('margin-top', menuHeight);
			}

		} else {

			if (jQuery('.navbar-container').hasClass('fixed')) {
				jQuery('.navbar-container').removeClass('fixed');
				jQuery('.mainContent').css('margin-top', 0);
				console.log("not fixed");
			}
		}
	}

	jQuery(".navbar-collapse ul li a[href^='#'], a[href^='#'].navbar-brand").on('click', function(e) {

		console.log("click");

		// prevent default anchor click behavior
		e.preventDefault();

		target = this.hash;

		// animate
		jQuery('html, body').animate({
			scrollTop: processScroll(target)
		}, 300, function() {
		}).promise().then(function() {
			// Animation complete
			// when done, add hash to url
			// (default click behaviour)
			// window.location.hash = target;

			history.pushState(null, null, target);

			if(history.pushState)
				history.pushState(null, null, target);
			else
				location.hash = target;

			return false;
		});

    });

	// cache the window object
	jQuerywindow = jQuery(window);

	jQuery('body').scrollspy({ target: '#my-navbar', offset: menuHeight + 1 });

	if (window.location.hash.match('#'))
		fixedNavbarOnScroll();

	jQuery('.full-panel').each(function() {

		//console.log("each");

		// declare the variable to affect the defined data-type
		var jQueryscroll = jQuery(this);

		jQuery(window).scroll(function() {

			//console.log("scroll");

			// HTML5 proves useful for helping with creating JS functions!
			// also, negative value because we're scrolling upwards
			var yPos = -(jQuerywindow.scrollTop() / 6);

			// background position
			var coords = '50% ' + yPos + 'px';

			// move the background
			jQueryscroll.css({ backgroundPosition: coords });

			fixedNavbarOnScroll();
		}); // end window scroll
	});  // end section function
		 
}); // close out script