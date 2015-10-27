/*
 * Copyright (c) 2013 kentooz
 * Kentooz Theme Custom Javascript
 */
jQuery(document).ready(function() {
// JS TOOLTIPS
	jQuery('ul.ktz-socialicon a, ul.sharethis a, .ktz-gallery a').tooltip({placement: 'top'});
	jQuery('ul.icon-author a').tooltip({placement: 'bottom'});
	jQuery('a[rel=tooltip]').tooltip();

// JS TABS - Select first tab in shortcode
	jQuery('#ktztab a:first, #kentooz-comment a:first').tab('show'); 
	
// Back to top	
	var jQueryscrolltotop = jQuery("#ktz-backtotop");
	jQueryscrolltotop.css('display', 'none');
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQueryscrolltotop.slideDown('fast');
			} else {
				jQueryscrolltotop.slideUp('fast');
			}
		});
		jQueryscrolltotop.click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 'fast');
			return false;
		});
	});
// JS SELECT NAV FOR SMALL SCREEN
	jQuery('#topmenu').slicknav({
		prependTo:'.ktz-mobilemenu'
	});
// SUPERFIST
	jQuery('ul#topmenu').superfish({
		delay:       1000,
		animation:     {opacity:'show'},
		animationOut:  {opacity:'hide'},  
		speed:       'fast',
		cssArrows:     true
	});
// FB Script
	(function(w, d, s) {
	function go(){
		var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); 
			js.src = url; 
			js.id = id;
			js.async = true;
			fjs.parentNode.insertBefore(js, fjs);
		};
		load('//connect.facebook.net/en_US/all.js#xfbml=1', 'fbjssdk');
		load('//apis.google.com/js/plusone.js', 'gplus1js');
		load('//platform.twitter.com/widgets.js', 'tweetjs');
	}
	if (w.addEventListener) { w.addEventListener("load", go, false); }
	else if (w.attachEvent) { w.attachEvent("onload",go); }
	}(window, document, 'script'));
}); 
