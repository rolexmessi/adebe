/*
 * Copyright (c) 2013 kentooz
 * Kentooz Theme Custom Javascript
 */
jQuery(document).ready(function() {
// WOOCOMMERCE JS
// CART SLIDEUP
    jQuery(document).on('click', '.login-block .ktz-cart-head', function(e){
          //e.preventDefault();
    });
	jQuery(document).on('hover', '.login-block .ktz-cart-head', function(){
         jQuery(this).next('.cart_wrapper').slideDown();
    }).on('mouseleave', '.login-block .ktz-cart-head', function(){
         jQuery(this).next('.cart_wrapper').delay(500).slideUp();
    });
	jQuery(document).on('mouseenter', '.cart_wrapper', function(){ jQuery(this).stop(true,true).show() });
	jQuery(document).on('mouseleave', '.cart_wrapper', function(){ jQuery(this).delay(500).slideUp() });
// WISHLISH SLIDEUP
    jQuery(document).on('click', '.login-block .ktz-wishlist-head', function(e){
          //e.preventDefault();
    });
	jQuery(document).on('hover', '.login-block .ktz-wishlist-head', function(){
         jQuery(this).next('.ktz-wishlist-wrapper').slideDown();
    }).on('mouseleave', '.login-block .ktz-wishlist-head', function(){
         jQuery(this).next('.ktz-wishlist-wrapper').delay(500).slideUp();
    });
	jQuery(document).on('mouseenter', '.ktz-wishlist-wrapper', function(){ jQuery(this).stop(true,true).show() });
	jQuery(document).on('mouseleave', '.ktz-wishlist-wrapper', function(){ jQuery(this).delay(500).slideUp() });

// FLIP Thumbnail
	jQuery( 'ul.products li.ktz-has-gallery a:first-child' ).hover( function() {
		jQuery( this ).children( '.wp-post-image' ).removeClass( 'fadeIn' ).addClass( 'animated fadeOut' );
		jQuery( this ).children( '.secondary-image' ).removeClass( 'fadeOut' ).addClass( 'animated fadeIn' );
	}, function() {
		jQuery( this ).children( '.wp-post-image' ).removeClass( 'fadeOut' ).addClass( 'fadeIn' );
		jQuery( this ).children( '.secondary-image' ).removeClass( 'fadeIn' ).addClass( 'fadeOut' );
	});
	
}); 

// TAB magnifier In single WOOCOMMERCE
    var yith_magnifier_options = {
        enableSlider: true,
        sliderOptions: {
            responsive: true,
            circular: true,
            infinite: true,
            direction: 'left',
            debug: false,
            auto: false,
            align: 'left',
            prev	: {
                button	: "#slider-prev",
                key		: "left"
            },
            next	: {
                button	: "#slider-next",
                key		: "right"
            },
            scroll : {
                items     : 1,
                pauseOnHover: true
            },
            items   : {
                visible: 3
            }
        },
        showTitle: false,
        zoomWidth: '500',
        zoomHeight: '400',
        position: 'right',
        lensOpacity: 0.5,
        softFocus: false,
        adjustY: 0,
        disableRightClick: false,
        phoneBehavior: 'center',
        loadingLabel: 'loading'
    };