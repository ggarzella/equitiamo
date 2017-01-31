jQuery(document).ready(function(){
      
	jQuery('body').scrollspy({ target: '#my-navbar' });

	if (window.location.href.match('#')) {
		jQuery('#logo-container').remove();
		jQuery('.navbar-brand').show();
	}

    jQuery(".navbar-collapse ul li a[href^='#'], a[href^='#'].navbar-brand").on('click', function(e) {
	    
	    target = this.hash;
       // prevent default anchor click behavior
       e.preventDefault();

       // animate
       jQuery('html, body').animate({
           scrollTop: jQuery(this.hash).offset().top 
         }, 300, function(){
   
           // when done, add hash to url
           // (default click behaviour)
           window.location.hash = target;
         });

    });

	// cache the window object
	jQuerywindow = jQuery(window);

	jQuery('.full-panel').each(function() {
		// declare the variable to affect the defined data-type
		var jQueryscroll = jQuery(this);

		jQuery(window).scroll(function() {

			jQuery('#logo-container').remove();
			jQuery('.navbar-brand').show();

			// HTML5 proves useful for helping with creating JS functions!
			// also, negative value because we're scrolling upwards
			var yPos = -(jQuerywindow.scrollTop() / 6);

			// background position
			var coords = '50% ' + yPos + 'px';

			// move the background
			jQueryscroll.css({ backgroundPosition: coords });
		}); // end window scroll
	});  // end section function
		 
}); // close out script