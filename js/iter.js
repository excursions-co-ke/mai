/**
	* Iter Theme functions
*/
(function($){
	"use strict";
	/*
		* This code changes the default behavior of the navbar:
		* now the submenu pops in when the user rolls his mouse
		* over the parent level menu entry.
	*/
	$('ul.nav li.dropdown, ul.nav li.dropdown-submenu').hover(function() {
		$(this).find(' > .dropdown-menu').stop(true, true).slideDown();
		}, function() {
		$(this).find(' > .dropdown-menu').stop(true, true).slideUp();
	});
	
	if ( ! Modernizr.objectfit ) {
		$('.flexslider.partners-gallery .slides>li').each(function () {
			var $container = $(this),
	        imgUrl = $container.find('img').prop('src');
			if (imgUrl) {
				$container
				.css('backgroundImage', 'url(' + imgUrl + ')')
				.addClass('compat-object-fit');
			}
		});
	}
	
	new WOW().init();
	
	$('.btn-book').click(function(){
    	var title = $(this).attr('dataTitle');
    	$('input.tour-subject').val('Booking for ' + title);	
    });
	
	$('#newsletter-sc').Stickyfill();
	
	// Custom Classes
	$( '#top-menu > li.has-children > ul').addClass('gg-top-secondary-nav');
	$(".gallery-icon a, .woocommerce-product-gallery__image a").attr('data-rel', 'prettyPhoto');
	$( 'a.more-link, a.comment-reply-link, .woocommerce ul.products li.product .add_to_cart_button').addClass('simple-link');
	$( 'a.more-link').addClass('hvr-pop');
	$( '.woocommerce ul.products li.product').addClass('card');
	$( 'li.comment, .post-search').addClass('wow fadeInUp').attr('data-wow-duration', '2s');
	$( '.card').addClass('hvr-underline-from-center');
	$( '#primary:not(.woocommerce) .comment-form-author, #primary:not(.woocommerce) .comment-form-email, .comment-form-url').addClass('col-md-4');
	$( '#primary.woocommerce .comment-form-author, #primary.woocommerce .comment-form-email, #reviews #comments, #reviews #review_form_wrapper').addClass('col-md-6');
	$( '.tagcloud a').addClass('hvr-rectangle-out');
	$( 'aside select').addClass('form-control');
	$( '.woocommerce #reviews').addClass('row');
	$( '.comment-form-author, .comment-form-email, .comment-form-url').wrapAll( '<div class="row" />');
	$( 'input[type="submit"]:not(.search-submit)').wrap('<label class="input-btn" />');
	$( '.gg-top-search input[type="search"]').wrap('<div class="container" />');
	$( ".woocommerce #content div.product div.summary div[itemprop='description'] p:last-child" ).after( $( ".woocommerce div.product p.price" ) );
	$( ".woocommerce-product-search input[type='submit']" ).val('\uf002');
	$( ".testimonial-slide .post-excerpt p" ).prepend( "<i class='fa fa-quote-left'></i>" );
	$( ".testimonial-slide .post-excerpt p" ).append( "<i class='fa fa-quote-right'></i>" );
	$( ".link-test-content p" ).append( "<i class='fa fa-link pull-right'></i>" );
	$( ".woocommerce ul.products li.product h3, .woocommerce ul.products li.product .price" ).wrap( "<div class='woo-product-details'></div>" );
	$( ".woocommerce ul.products li.product .star-rating" ).wrap( "<div class='woo-product-details card-stars'></div>" );
	$( '#gg-vertical-nav .gg-dot').wrap('<span class="dot-back" />');
	$( '.service-section .col-md-4:nth-child(2)').addClass('delay-05s');
	$( '.service-section .col-md-4:nth-child(3)').addClass('delay-1s');
	$( '.service-section .col-md-4:nth-child(4)').addClass('delay-15s');
	$( '.service-section .col-md-4:nth-child(5)').addClass('delay-2s');
	$( '.service-section .col-md-4:nth-child(6)').addClass('delay-25s');
	$( "iframe, object, embed" ).wrap( "<div class='video-container'></div>" );
	$( "#page.front-page-iter, .home .site-footer" ).wrapAll( "<div id='home-wrap'></div>" );
	$(".tabcordion li:first-child").addClass("active");
	$(".tabcordion .tab-content>div:first-child").addClass("active in");
	$(".panel-group:not(#accordion-s-destination) .panel-default:first-child .panel-collapse").addClass("in");
	$("table:not(.shop_table)").addClass("table table-bordered");
	$(".card .gallery").addClass("flexslider");
	$(".card .gallery figure").wrapAll( "<ul class='slides'></ul>" );
	$(".card .gallery figure").wrap( "<li>" );
	$( "<input class='minus' type='button' value='-'>" ).insertBefore( ".single-product.woocommerce input[type='number']" );
	$( "<input class='plus' type='button' value='+'>" ).insertAfter( ".single-product.woocommerce input[type='number']" );
	$( ".woocommerce a.button > br" ).remove();
	$(".woocommerce-billing-fields").addClass("row");
	$(".form-row-first").addClass("col-md-6");
	$(".form-row-last").addClass("col-md-6");
	$(".form-row-wide").addClass("col-md-12");;
	$( ".gallery-icon a" ).append( "<div class='gallery-plus-icon'><span aria-hidden='true' class='icon_plus'></span></div>" );
	$( ".gg-top-primary-nav .gg-top-secondary-nav > li.has-children > a" ).append( "<i class='arrow-menu'></i>" );
	$( ".ggts-primary-nav .menu-item-has-children > a" ).append( "<i class='arrow-slide-menu'></i>" );
	$( ".widget_categories ul.children").parent().addClass("cat-item-has-children");
	
	$('.widget_product_categories ul li.cat-parent, .widget_categories ul li.cat-item-has-children,.widget_pages ul li.page_item_has_children,.widget_nav_menu ul li.menu-item-has-children').hover(function(){
		$(this).children('ul').stop().slideToggle(400);
		$(this).children('a').toggleClass('arr-down');
	});
	
	$('.plus').on('click',function(e){
		var val = parseInt($(this).prev('input').val());
		$(this).prev('input').val( val+1 );
	});
	
	$('.minus').on('click',function(e){
		var val = parseInt($(this).next('input').val());
		if(val !== 0){
			$(this).next('input').val( val-1 );
		}
	});
	
	$('a.button.add_to_cart_button.ajax_add_to_cart').on('click',function(){
		$(this).fadeOut();
		$(this).next('.added_to_cart').addClass('button');
	});
	
	function toggleChevron(e) {
	    $(e.target)
		.prev('.accordion-heading')
		.find("i.indicator")
		.toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
	}
	$('.tabcordion').on('hidden.bs.collapse', toggleChevron);
	$('.tabcordion').on('shown.bs.collapse', toggleChevron);
	
	function toggleChevronAcc(e) {
		$(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
	}
	$('.panel-group').on('hidden.bs.collapse', toggleChevronAcc);
	$('.panel-group').on('shown.bs.collapse', toggleChevronAcc);
	
	$(document).delegate('.accordion-toggle', 'click', function () {
		$(this).parent().toggleClass('open-color');
	});
	
	// Change logo
	// $(window).on('resize',function() {
	// 	if (window.innerWidth <= 767) {
	// 		$( "a.gg-top-logo" ).html( function() {
	// 			return "<img src='" + iter_gioga_php_vars.logo_img_less767 + "' alt='" + iter_gioga_php_vars.logo_alt_name + "'/>";
	// 		} );
	// 		} else {
	// 		$( "a.gg-top-logo.homelogo" ).html( function() {
	// 			return "<img src='" + iter_gioga_php_vars.logo_img_plus767 + "' alt='" + iter_gioga_php_vars.logo_alt_name + "'/>";
	// 		});
	// 		$( "a.gg-top-logo.innerlogo" ).html( function() {
	// 			return "<img src='" + iter_gioga_php_vars.logo_img_plus767inner + "' alt='" + iter_gioga_php_vars.logo_alt_name + "'/>";
	// 		});
	// 	}
	// }).trigger('resize');
	
	$(document).ready(function(){
		// 1. This code loads the IFrame Player API code asynchronously.
		var tag = document.createElement( 'script' );
		tag.src = "https://www.youtube.com/iframe_api";
		tag.type = 'text/javascript';
		tag.async = 'true';
		var firstScriptTag = document.getElementsByTagName( 'script' )[0];
		firstScriptTag.parentNode.insertBefore( tag, firstScriptTag );
		
		// 2. This function creates an <iframe> (and YouTube player)
		//    after the API code downloads.
		var player;
		window.onYouTubePlayerAPIReady = function() {
			player = new YT.Player('player', {
				height: '100%',
				width: '100%',
				playerVars: {
					autoplay: 1,
					cc_load_policy: 0,
					iv_load_policy: 3,
					version: 3,
					loop: 1,
					enablejsapi: 1,
					fs: 0,
					controls: 0,
					showinfo: 0,
					autohide: 1,
					playlist: iter_gioga_php_vars.iter_yt_url,
					rel: 0,
					modestbranding: 1
				},
				videoId: iter_gioga_php_vars.iter_yt_url,
				events: {
					'onReady': onPlayerReady
				}
			});
		}	
		// 3. The API will call this function when the video player is ready.
		window.onPlayerReady = function(event) {
			event.target.playVideo();
			player.mute();
		}
		
		
		//primary navigation slide-in effect
		var MQL = 1200;
		if($(window).width() > MQL) {
			var headerHeight = $('.site-header').height();
			$(window).on('scroll',
			{
				previousTop: 0
			}, 
			function () {
				var currentTop = $(window).scrollTop();
				//check if user is scrolling up
				if (currentTop < this.previousTop ) {
					//if scrolling up...
					if (currentTop > 0 && $('.site-header').hasClass('is-fixed')) {
						$('.site-header').addClass('is-visible');
						// $( "a.gg-top-logo" ).html( function() {
						// 	return "<img src='" + iter_gioga_php_vars.logo_img_less767 + "' alt='" + iter_gioga_php_vars.logo_alt_name + "'/>";
						// } );
						} else {
						$('.site-header').removeClass('is-visible is-fixed');
						// $( "a.gg-top-logo.homelogo" ).html( function() {
						// 	return "<img src='" + iter_gioga_php_vars.logo_img_plus767 + "' alt='" + iter_gioga_php_vars.logo_alt_name + "'/>";
						// });
						// $( "a.gg-top-logo.innerlogo" ).html( function() {
						// 	return "<img src='" + iter_gioga_php_vars.logo_img_plus767inner + "' alt='" + iter_gioga_php_vars.logo_alt_name + "'/>";
						// });
					}
					} else {
					//if scrolling down...
					$('.site-header').removeClass('is-visible');
					if( currentTop > headerHeight && !$('.site-header').hasClass('is-fixed')) $('.site-header').addClass('is-fixed');
				}
				this.previousTop = currentTop;
			});
		}
		
		// object-fit-images
		objectFitImages();
		
		// Scroll to top
		$(window).scroll(function(){
			if ($(this).scrollTop() > 100) {
				$('.scrollup').fadeIn();
				} else {
				$('.scrollup').fadeOut();
			}
		});
		$('.scrollup').click(function(){
			$("html, body").animate({ scrollTop: 0 }, 600);
			return false;
		});
		
		$(".entry-footer").append($(".gg-social"));
		
		$('.tabcordion').tabcordion();
		
		$('div.post-next').hover(function(){
			$(this).find('.service-icon-pag').toggleClass('hvr-bounce-in');
		});
		
		$(".latest-posts li .blog-post").hover(function(){
			$(this).children().children(".post-labels").children(".postformat").toggleClass("active");  //Toggle the active class to the area is hovered
		});
		
		// Parallax section background
		$('section[data-type="background"], div[data-type="background"]').each(function(){
			var $bgobj = $(this); // assigning the object
			var $window = $(window);
			$window.scroll(function() {
				var yPos = -($window.scrollTop() / $bgobj.data('speed'));
				
				// Put together our final background position
				var coords = '50% '+ yPos + 'px';
				
				// Move the background
				$bgobj.css({ backgroundPosition: coords });
			});
		});
		
		// Counter-Up Jquery Plugin
		$('.counter').counterUp({
			delay: 10,
			time: 1000
		});
		
		// Owl Carousel and prettyPhoto
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			deeplinking:false,
			social_tools: false,
			theme:'dark_rounded',
		});
		$(".owl-slider, .owl-partners").owlCarousel({
			autoPlay: 3000, //Set AutoPlay to 3 seconds
			items: 4,
			itemsDesktop: [1199, 3],
			itemsDesktopSmall: [979, 3]
		});
		
		// Cards
		$(document).on('click.card', '.card', function (e) {
			if ($(this).find('> .card-reveal').length) {
				if ($(e.target).is($('.card-reveal .card-title')) || $(e.target).is($('.card-reveal .card-title i'))) {
					// Make Reveal animate down and display none
					$(this).find('.card-reveal').velocity(
					{translateY: 0}, {
						duration: 225,
						queue: false,
						easing: 'easeInOutQuad',
						complete: function() { $(this).css({ display: 'none'}); }
					}
					);
				}
				else if ($(e.target).is($('.card .activator')) ||
				$(e.target).is($('.card .activator i')) ) {
					$(e.target).closest('.card').css('overflow', 'hidden');
					$(this).find('.card-reveal').css({ display: 'block'}).velocity("stop", false).velocity({translateY: '-100%'}, {duration: 300, queue: false, easing: 'easeInOutQuad'});
				}
			}
			$('.card-reveal').closest('.card').css('overflow', 'hidden');
		});
	});
	
	$(".gallery-icon a").each(function(i, el) {
		var href_value = el.href;
		if (/\.(jpg|png|gif)$/.test(href_value)) {
			} else {
			$(this).removeAttr( "data-rel" );
		}
	});
	
	// Contact Form 7 style
	$('.wpcf7-form input, .wpcf7-form textarea').click(function() {
	    var value=$.trim($(this).val());
		if(value.length>0) {
			$(this).parent().parent().addClass('input--filled');
			} else {
			$(this).parent().parent().toggleClass('input--filled');
		}
	});
	
	$("#commentform input:not([type='submit']), .wpcf7-form input:not([type='submit'])").focusin(function () {
		$(this).prev().attr("style", "height:200%;");
	});
	$("#commentform textarea, .wpcf7-form textarea").focusin(function () {
		$(this).prev().attr("style", "height:230px;transform:translateY(-30px);");
	});
	$(".woocommerce #commentform textarea").focusin(function () {
		$(this).prev().attr("style", "height:105px;transform:translateY(-30px);");
	});
	$("#commentform input:not([type='submit']), .wpcf7-form input:not([type='submit'])").focusout(function() {
		$(this).prev().attr("style", "height:100%;");
		if( !$(this).val() ) {
			$(this).prev().attr("style", "height:100%;");
			} else {
			$(this).prev().attr("style", "height:200%;");
		}
	});
	$("#commentform textarea, .wpcf7-form textarea").focusout(function() {
		$(this).prev().attr("style", "height:200px;");
		if( !$(this).val() ) {
			$(this).prev().attr("style", "height:200px;");
			} else {
			$(this).prev().attr("style", "height:230px;transform:translateY(-30px);");
		}
	});
	$(".woocommerce #commentform textarea").focusout(function() {
		$(this).prev().attr("style", "height:75px;");
		if( !$(this).val() ) {
			$(this).prev().attr("style", "height:75px;");
			} else {
			$(this).prev().attr("style", "height:105px;transform:translateY(-30px);");
		}
	});
	
	// Overlay Navigation
	$('#toggle').click(function() {
		$(this).toggleClass('active');
		$('#overlay').toggleClass('open');
	});
	
	$('.ggts-nav-trigger').click(function() {
		if ( $(this).hasClass( "nav-open" ) ) {
			$(".ggts-logo").removeClass("fixed-logo");
			} else {
			$(".ggts-logo").addClass("fixed-logo");
		}
		if ( $('.ggts-logo img.logo-dark').hasClass( "logo-visible" ) ) {
			$(".ggts-logo .logo-white").toggle();
			$(".ggts-logo .logo-dark").toggle();
		}
	});
	
	$( ".search-btn" ).click(function() {
		if ( $("#overlay").hasClass( "open" ) ) {
			$('.ggts-logo, .ggts-nav-trigger, #gg-vertical-nav').fadeOut();
			} else {
			$('.ggts-logo, .ggts-nav-trigger, #gg-vertical-nav').fadeIn();
		}
	});
	
	$(".gmnoprint img").css({'width': '45px', 'height': '45px'});
	
	// Bootstrap DateTimePicker v4
	var options = {
		widgetPositioning: {
            horizontal: 'auto',
            vertical: 'bottom',
		},
		format: 'MM-DD-YYYY',
		ignoreReadonly: true,
		extraFormats: [ 'MM-DD-YYYY', 'MM-DD-YY']
	};
	$('.datetimepicker-from, .datetimepicker-to').datetimepicker(options);
	$('.datetimepicker-from input, .datetimepicker-to input').off('focus')
	.click(function () {
        $(this).parent().data("DateTimePicker").show();
	});
	
	$(window).on("load", function() {
		// Page Preloader
		$("#loadIcon").fadeOut(500);
		
		// Flexslider
		$('.flexslider.homeflex').flexslider({
			controlNav: false,
			directionNav: false,
			slideshowSpeed: 5000,
		});
		$('.testimonial-slide .flexslider').flexslider({
			controlNav: true,
			directionNav: false,
			slideshowSpeed: 5000,
		});
		$('.flexslider').flexslider({
			controlNav: false,
			directionNav: true,
			slideshowSpeed: 5000,
		});
		
		// init Isotope
		var $container_results = $('#isotope-tours .tour-results').isotope({
			itemSelector: '.tour-item',
			getSortData: {
				name: '.tour-title a',
				number: '.price-sort parseInt',
			}
		});
		
		$('.latest-posts .blog-row').isotope({
			itemSelector: '.sc-blog-1',
		});
		
		// bind sort button click
		$('#sort').on( 'click', 'a', function() {
			var sortByValue = $(this).attr('data-sort-by');
			$container_results.isotope({ sortBy: sortByValue });
		});
		
		// change is-checked class on buttons
		$('#sort').each( function( i, buttonGroup ) {
			var $buttonGroup = $( buttonGroup );
			$buttonGroup.on( 'click', 'a', function() {
				$buttonGroup.find('.is-checked').removeClass('is-checked');
				$( this ).addClass('is-checked');
			});
		});
		
		// Blog filter
		var $container = $('.sorter');
		$container.isotope({
			filter: '*',
			animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false
			}
		});
		$('.filters a').click(function(){
			$('.filters .current').removeClass('current');
			$(this).addClass('current');
			
			var selector = $(this).attr('data-filter');
			$container.isotope({
				filter: selector,
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false
				}
			});
			return false;
		});
	});
	
})(jQuery);
