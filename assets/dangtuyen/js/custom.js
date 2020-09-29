// JavaScript Document


	$(window).on('load', function() {

		"use strict";

		/*----------------------------------------------------*/
		/*	Preloader
		/*----------------------------------------------------*/

		var preloader = $('#loader-wrapper'),
			loader = preloader.find('.loader-inner');
			loader.fadeOut();
			preloader.delay(400).fadeOut('slow');

		$(window).stellar({});

	});


	$(document).ready(function() {

		"use strict";


		/*----------------------------------------------------*/
		/*	Animated Scroll To Anchor
		/*----------------------------------------------------*/

		$('.header a[href^="#"], .page a.btn[href^="#"], .page a.internal-link[href^="#"]').on('click', function (e) {

			e.preventDefault();

			var target = this.hash,
				$target = jQuery(target);

			$('html, body').stop().animate({
				'scrollTop': $target.offset().top - 60 // - 200px (nav-height)
			}, 'slow', 'easeInSine', function () {
				window.location.hash = '1' + target;
			});

		});


		/*----------------------------------------------------*/
		/*	Hero Slider
		/*----------------------------------------------------*/

		$('.slider').slider({
			full_width: false,
			interval:8000,
			transition:700,
			draggable: false,
		});


		/*----------------------------------------------------*/
		/*	ScrollUp
		/*----------------------------------------------------*/

		$.scrollUp = function (options) {

			// Defaults
			var defaults = {
				scrollName: 'scrollUp', // Element ID
				topDistance: 600, // Distance from top before showing element (px)
				topSpeed: 800, // Speed back to top (ms)
				animation: 'fade', // Fade, slide, none
				animationInSpeed: 200, // Animation in speed (ms)
				animationOutSpeed: 200, // Animation out speed (ms)
				scrollText: '', // Text for element
				scrollImg: false, // Set true to use image
				activeOverlay: false // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			};

			var o = $.extend({}, defaults, options),
				scrollId = '#' + o.scrollName;

			// Create element
			$('<a/>', {
				id: o.scrollName,
				href: '#top',
				title: o.scrollText
			}).appendTo('body');

			// If not using an image display text
			if (!o.scrollImg) {
				$(scrollId).text(o.scrollText);
			}

			// Minium CSS to make the magic happen
			$(scrollId).css({'display':'none','position': 'fixed','z-index': '2147483647'});

			// Active point overlay
			if (o.activeOverlay) {
				$("body").append("<div id='"+ o.scrollName +"-active'></div>");
				$(scrollId+"-active").css({ 'position': 'absolute', 'top': o.topDistance+'px', 'width': '100%', 'border-top': '1px dotted '+o.activeOverlay, 'z-index': '2147483647' });
			}

			// Scroll function
			$(window).on('scroll', function(){
				switch (o.animation) {
					case "fade":
						$( ($(window).scrollTop() > o.topDistance) ? $(scrollId).fadeIn(o.animationInSpeed) : $(scrollId).fadeOut(o.animationOutSpeed) );
						break;
					case "slide":
						$( ($(window).scrollTop() > o.topDistance) ? $(scrollId).slideDown(o.animationInSpeed) : $(scrollId).slideUp(o.animationOutSpeed) );
						break;
					default:
						$( ($(window).scrollTop() > o.topDistance) ? $(scrollId).show(0) : $(scrollId).hide(0) );
				}
			});

			// To the top
			$(scrollId).on('click', function(event){
				$('html, body').animate({scrollTop:0}, o.topSpeed);
				event.preventDefault();
			});

		};

		$.scrollUp();


		/*----------------------------------------------------*/
		/*	Services Rotator
		/*----------------------------------------------------*/

		var owl = $('.services-holder');
			owl.owlCarousel({
				items: 4,
				loop:true,
				autoplay:true,
				navBy: 1,
				autoplayTimeout: 4500,
				autoplayHoverPause: false,
				smartSpeed: 3000,
				responsive:{
					0:{
						items:1
					},
					767:{
						items:1
					},
					768:{
						items:2
					},
					991:{
						items:3
					},
					1000:{
						items:4
					}
				}
		});


		/*----------------------------------------------------*/
		/*	Portfolio Grid
		/*----------------------------------------------------*/

		$('.grid-loaded').imagesLoaded(function () {

	        // filter items on button click
	        $('.gallery-filter').on('click', 'button', function () {
	            var filterValue = $(this).attr('data-filter');
	            $grid.isotope({
	              filter: filterValue
	            });
	        });

	        // change is-checked class on buttons
	        $('.gallery-filter button').on('click', function () {
	            $('.gallery-filter button').removeClass('is-checked');
	            $(this).addClass('is-checked');
	            var selector = $(this).attr('data-filter');
	            $grid.isotope({
	              filter: selector
	            });
	            return false;
	        });

	        // init Isotope
	        var $grid = $('.masonry-wrap').isotope({
	            itemSelector: '.gallery-item',
	            percentPosition: true,
	            transitionDuration: '0.7s',
	            masonry: {
	              // use outer width of grid-sizer for columnWidth
	              columnWidth: '.gallery-item',
	            }
	        });

	    });


		/*----------------------------------------------------*/
		/*	Single Image Lightbox
		/*----------------------------------------------------*/

		$('.image-link').magnificPopup({
		  type: 'image'
		});


		/*----------------------------------------------------*/
		/*	Video Link #1 Lightbox
		/*----------------------------------------------------*/

		$('.video-popup1').magnificPopup({
		    type: 'iframe',
				iframe: {
					patterns: {
						youtube: {
							index: 'youtube.com',
							src: 'https://www.youtube.com/embed/SZEflIVnhH8'
								}
							}
						}
		});


		/*----------------------------------------------------*/
		/*	Video Link #2 Lightbox
		/*----------------------------------------------------*/

		$('.video-popup2').magnificPopup({
		    type: 'iframe',
				iframe: {
					patterns: {
						youtube: {
							index: 'youtube.com',
							src: 'https://www.youtube.com/embed/7e90gBu4pas'
								}
							}
						}
		});


		/*----------------------------------------------------*/
		/*	Statistic Counter
		/*----------------------------------------------------*/

		$('.count-element').each(function () {
			$(this).appear(function() {
				$(this).prop('Counter',0).animate({
					Counter: $(this).text()
				}, {
					duration: 4000,
					easing: 'swing',
					step: function (now) {
						$(this).text(Math.ceil(now));
					}
				});
			},{accX: 0, accY: 0});
		});


		/*----------------------------------------------------*/
		/*	Testimonials Rotator
		/*----------------------------------------------------*/

		var owl = $('.reviews-holder');
			owl.owlCarousel({
				items: 3,
				loop:true,
				autoplay:true,
				navBy: 1,
				autoplayTimeout: 6000,
				autoplayHoverPause: false,
				smartSpeed: 5000,
				responsive:{
					0:{
						items:1
					},
					767:{
						items:1
					},
					768:{
						items:2
					},
					991:{
						items:3
					},
					1000:{
						items:3
					}
				}
		});


		$('#datetimepicker').datetimepicker({
		minDate:'today'});


		/*----------------------------------------------------*/
		/*	Appointment Form Validation
		/*----------------------------------------------------*/

		$(".appointment-form").validate({
			rules: {
				select: "required",
				name: "required",
				email: {
					required: true,
					email: true
				},
				phone:{
					required: true,
					digits: true,
				}
			},
			messages: {
				select: "Thông tin này là bắt buộc",
				name: "Vui lòng nhập họ tên",
				email: "Chúng tôi cần email của bạn để liên hệ",
				phone: "Vui lòng nhập đúng số điện thoại",
			}
		});


		/*----------------------------------------------------*/
		/*	Hero Form Validation
		/*----------------------------------------------------*/

		$(".hero-form").validate({
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				},
				phone:{
					required: true,
					digits: true,
				},
				date: "required",
				select: "required",
			},
			messages: {
				name: "Vui lòng nhập họ tên",
				email: "Chúng tôi cần email của bạn để liên hệ",
				phone: "Vui lòng nhập đúng số điện thoại",
				date: "Vui lòng chọn ngày giờ",
				select: "Thông tin này là bắt buộc",
			}
		});


		/*----------------------------------------------------*/
		/*	Contact Form Validation
		/*----------------------------------------------------*/

		$(".contact-form").validate({
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				},
				phone:{
					required: true,
					digits: true,
				},
				select: "required",
				subject: "required",
				message: "required",
			},
			messages: {
				select: "Thông tin này là bắt buộc",
				name: "Vui lòng nhập họ tên",
				email: "Chúng tôi cần email của bạn để liên hệ",
				phone: "Vui lòng nhập đúng số điện thoại",
				subject: "Vui lòng nhập nhiều hơn 1 ký tự",
				message: "Vui lòng nhập nhiều hơn 1 ký tự",
			}
		});


		/*----------------------------------------------------*/
		/*	Comment Form Validation
		/*----------------------------------------------------*/

		$(".comment-form").validate({
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				},
				phone:{
					required: true,
					digits: true,
				},
				message: "required",
			},
			messages: {
				name: "Please enter your name",
				email: "We need your email address to contact you",
				message: "Please enter no more than (1) characters",
			}
		});


		/*----------------------------------------------------*/
		/*	Newsletter Subscribe Form
		/*----------------------------------------------------*/

		$('.newsletter-form').ajaxChimp({
        language: 'cm',
        url: 'http://dsathemes.us3.list-manage.com/subscribe/post?u=af1a6c0b23340d7b339c085b4&id=344a494a6e'
            //http://xxx.xxx.list-manage.com/subscribe/post?u=xxx&id=xxx
		});

		$.ajaxChimp.translations.cm = {
			'submit': 'Submitting...',
			0: 'We have sent you a confirmation email',
			1: 'Please enter your email address',
			2: 'An email address must contain a single @',
			3: 'The domain portion of the email address is invalid (the portion after the @: )',
			4: 'The username portion of the email address is invalid (the portion before the @: )',
			5: 'This email address looks fake or invalid. Please enter a real email address'
		};


	});
