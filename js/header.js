jQuery(document).ready(function(){

	var logoHeight = Math.round(jQuery('#logo-container').outerHeight(true)),
		menuHeight = Math.round(jQuery('.navbar-container').outerHeight(true)),
		collapseMenuHeight;

	var processScroll = function (target)
	{
		var delta = 0;

		if (!jQuery('.navbar-container').hasClass('fixed'))
			delta = isNaN(collapseMenuHeight) ? 0 : collapseMenuHeight;

		var top = Math.round(jQuery(target).offset().top) - menuHeight - delta;

		return top;
	};

	var fixedNavbarOnScroll = function ()
	{
		if (Math.round(jQuery(window).scrollTop()) > logoHeight) {

			if (!jQuery('.navbar-container').hasClass('fixed')) {
				jQuery('.navbar-container').addClass('fixed');
				jQuery('.mainContent').css('padding-top', menuHeight+'px');
				jQuery('.navbar-brand').show();
			}

		} else {

			if (jQuery('.navbar-container').hasClass('fixed')) {
				jQuery('.navbar-container').removeClass('fixed');
				jQuery('.mainContent').css('padding-top', 0);
				jQuery('.navbar-brand').hide();
			}
		}
	};

	jQuery(".navbar-collapse ul li a[href^='#'], a[href^='#'].navbar-brand").on('click', function(e) {

		// prevent default anchor click behavior
		e.preventDefault();

		target = this.hash;

		collapseMenuHeight = jQuery('.navbar-collapse.collapse.in').height();

		if (jQuery('.navbar-toggle.collapsed').is(":visible") && jQuery(e.target).hasClass('navbar-brand') === false) {
			jQuery('.navbar-toggle.collapsed').click(); //bootstrap 3.x by Richard
		}

		// animate
		jQuery('html, body').animate({
			scrollTop: processScroll(target)
		}, 300, function() {
		}).promise().then(function() {
			// Animation complete
			// when done, add hash to url
			// (default click behaviour)
			//document.location.hash = target;

			if(history.pushState) {
				history.pushState(null, null, target);
			}
			else {
				location.hash = target;
			}
		});

    });

	// cache the window object
	jQuerywindow = jQuery(window);

	jQuery('body').scrollspy({ target: '#my-navbar', offset: menuHeight + 1 });

	if (window.location.hash.match('#'))
		fixedNavbarOnScroll();

	jQuery('.full-panel').each(function() {

		// declare the variable to affect the defined data-type
		var jQueryscroll = jQuery(this);

		jQuery(window).scroll(function() {

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