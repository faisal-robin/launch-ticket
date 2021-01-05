(function ($) {
	"use strict";


	/**-------------------------------------------------
	*Fixed Header
	*----------------------------------------------------**/
	$(window).on('scroll', function () {

		/**Fixed header**/
		if ($(window).scrollTop() > 250) {
		$('.navbar-sticky').addClass('sticky fade_down_effect');
		} else {
		$('.navbar-sticky').removeClass('sticky fade_down_effect');
		}
	});
	
	jQuery(document).ready(function ($) {
		   

		/* 
		=================================================================
		01 - Main Slider JS
		=================================================================	
		*/

		$(".abh-slide").owlCarousel({
			smartSpeed: 5000,
			autoplayTimeout: 7000,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			items: 1,
			dots: false,
			autoplay: true,
			loop: true,
			navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
			mouseDrag: true,
			touchDrag: true,
			responsive: {
				0: {
					items: 1,
					nav: false,
				},
				480: {
					items: 1,
					nav: false,
				},
				600: {
					items: 1,
					nav: false,
				},
				1000: {
					items: 1,
					nav: false,
				},
				1200: {
					items: 1,
					nav: false,
				}
			}
		});


		/* 
		=================================================================
		02 - Destination Slider
		=================================================================	
		*/

		$(".destination-slider").owlCarousel({
			autoplay: true,
			loop: true,
			margin: 5,
			touchDrag: true,
			mouseDrag: true,
			items: 1,
			nav: false,
			dots: false,
			autoplayTimeout: 6000,
			autoplaySpeed: 1200,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			responsive: {
				0: {
					items: 1,
					nav: false,
				},
				480: {
					items: 1,
					nav: false,
				},
				600: {
					items: 2,
					nav: false,
				},
				1000: {
					items: 3
				},
				1200: {
					items: 4
				}
			}
		});

		$(".details-slider").owlCarousel({
			autoplay: true,
			loop: true,
			margin: 5,
			touchDrag: true,
			mouseDrag: true,
			items: 1,
			nav: true,
			dots: false,
			autoplayTimeout: 6000,
			autoplaySpeed: 1200,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			items: 1,
			// responsive: {
			// 	0: {
			// 		items: 1
			// 	},
			// 	480: {
			// 		items: 1
			// 	},
			// 	600: {
			// 		items: 1
			// 	},
			// 	1000: {
			// 		items: 1
			// 	},
			// 	1200: {
			// 		items: 1
			// 	}
			// }
		});


		/* 
		=================================================================
		03 - Reviews Slider
		=================================================================	
		*/

		$(".reviews-slider").owlCarousel({
			autoplay: true,
			loop: true,
			margin: 25,
			touchDrag: true,
			mouseDrag: true,
			items: 1,
			nav: true,
			dots: false,
			autoplayTimeout: 6000,
			autoplaySpeed: 1200,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 1
				},
				600: {
					items: 1
				},
				1000: {
					items: 1
				},
				1200: {
					items: 1
				}
			}
		});


		/* 
		=================================================================
		04 - Destination Page Slider
		=================================================================	
		*/

		$(".abh-carousel").owlCarousel({
			autoplay: true,
			loop: true,
			margin: 0,
			touchDrag: true,
			mouseDrag: true,
			items: 3,
			nav: false,
			dots: true,
			autoplayTimeout: 6000,
			autoplaySpeed: 1200,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 3
				},
				1200: {
					items: 3
				}
			}
		});

		/* 
		=================================================================
		05 - Tour Gallery Slider
		=================================================================	
		*/

		$(".tour-gallery-slider").owlCarousel({
			autoplay: true,
			loop: true,
			margin: 10,
			touchDrag: true,
			mouseDrag: true,
			items: 1,
			nav: false,
			dots: false,
			autoplayTimeout: 6000,
			autoplaySpeed: 1200,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 1
				},
				600: {
					items: 3
				},
				1000: {
					items: 5
				},
				1200: {
					items: 5
				}
			}
		});

		/*---------------====================
			Bootstrp Tab Active On Hover
		================-------------------*/

		$(document).on('mouseenter', '[data-toggle="tab"]', function ()
		{
			$(this).tab('show');
		});



		/* 
		=================================================================
		06 - Youtube Popup
		=================================================================	
		*/

		$('.popup-youtube').magnificPopup({
			disableOn: 320,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
		});

		$('.popup-img').magnificPopup({
			type: 'image',
			mainClass: 'mfp-fade',
		});


		/* 
		=================================================================
		07 - Select
		=================================================================	
		*/

		// $('select').niceSelect();

		
		/* 
		=================================================================
		08 - Animated Headline
		=================================================================	
		*/


		$(function () {
			$('.caption-inner').animatedHeadline({
				animationType: 'clip'
			});
		})


		/* 
		=================================================================
		09 - Search Box
		=================================================================	
		*/

		$.fn.searchBox = function (ev) {

			var $searchEl = $('.search-elem');
			var $sField = $('#search-field');

			if (ev === "open") {
				$searchEl.addClass('search-open')
			};

			if (ev === 'close') {
				$searchEl.removeClass('search-open'),
					$sField.val('');
			};


		}

		$('.search-btn').on('click', function (e) {
			$(this).searchBox('open');
			e.preventDefault();
		});

		$('.search-close').on('click', function () {
			$(this).searchBox('close');
		});


		/* 
		=================================================================
		10 - Sidebar Navigation
		=================================================================	
		*/
		// $('.sidenav-toggle').on('click', function () {
		// 	var $sidenav, $this;
		// 	$this = $(this);
		// 	$sidenav = $('.ct-sidenav');
		// 	if ($this.hasClass('active')) {
		// 		$this.removeClass('active');
		// 		return $sidenav.removeClass('active');
		// 	} else {
		// 		$this.addClass('active');
		// 		return $sidenav.addClass('active');
		// 	}
		// });
		// $('#sidenav-toggle').on('click', function () {
		// 	var $sidenav, $this;
		// 	$this = $(this);
		// 	$sidenav = $('.ct-sidenav');
		// 	if ($this.hasClass('open')) {
		// 		$this.removeClass('open');
		// 		return $sidenav.removeClass('open');
		// 	} else {
		// 		$this.addClass('open');
		// 		return $sidenav.addClass('open');
		// 	}
		// });
		// $('.ct-sidenav').find('button.close').on('click', function () {
		// 	$(this).parent().removeClass('open');
		// 	return $('#sidenav-toggle').removeClass('open');
		// });


		/* 
		=================================================================
		11 - Responsive Menu
		=================================================================	
		*/
		$("ul#navigation_menu").slicknav({
			prependTo: ".abh-responsive-menu"
		});


		/* 
		=================================================================
		12 - Back To Top
		=================================================================	
		*/
		if ($("body").length) {
			var btnUp = $('<div/>', {
				'class': 'btntoTop'
			});
			btnUp.appendTo('body');
			$(document).on('click', '.btntoTop', function () {
				$('html, body').animate({
					scrollTop: 0
				}, 700);
			});
			$(window).on('scroll', function () {
				if ($(this).scrollTop() > 200) $('.btntoTop').addClass('active');
				else $('.btntoTop').removeClass('active');
			});
		}


	});
    
    /* 
    =================================================================
    		Sidebar
    =================================================================	
    */
   $('#sidebar').stickySidebar({
    topSpacing: 60,
    bottomSpacing: 60
});
    /* 
    =================================================================
    13 - preloader
    =================================================================	
    */
    
    // $(window).on('load', function () {
    //     $(".loading-text").delay(1e3).fadeOut("slow");
    //     $(".preloader").delay(2e3).fadeOut("slow");
	// })
	


	/* -----------------------------------------------------------
    				tooltip
   ----------------------------------------------------------- */

   $(document).ready(function () {
	$('[data-toggle="tooltip"]').tooltip();
	$('[data-toggle="tooltip"]').hover(function(){
		$('.tooltip-inner').css('color', 'green');
	});


	$(".niceCountryInputSelector").each(function(i,e){
		new NiceCountryInput(e).init();
	});
 });



	$(window).on('load', function () {
		$('#status').fadeOut();
		$('#preloader').delay(350).fadeOut('slow');
	});



}(jQuery));

