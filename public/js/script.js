"use strict";

/* ==== Jquery Functions ==== */
(function($) {
	
	
if($('.company_profile').length > 0){
	$('.company_profile').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
  		autoplaySpeed: 2000,
		dots: false,
		arrows: true,
        prevArrow: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
        nextArrow: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
	});
}
if($('.companies').length > 0){
	$('.companies').slick({
		infinite: true,
		slidesToShow: 6,
		slidesToScroll: 1,
		dots: false,
		arrows: true,
        prevArrow: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
        nextArrow: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
		centerPadding: '60px',
		autoplay: true,
  		autoplaySpeed: 2000,
		responsive: [
			{
				breakpoint: 968,
				settings: {
				  arrows: false,
				  centerMode: true,
				  centerPadding: '40px',
				  slidesToShow: 3
				}
			  },
			{
			  breakpoint: 768,
			  settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 2
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 1
			  }
			}
		  ]
	});
}
if($('.school_slider').length > 0){
	$('.school_slider').slick({
		infinite: true,
		slidesToShow: 6,
		slidesToScroll: 1,
		dots: false,
		arrows: true,
        prevArrow: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
        nextArrow: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
		centerPadding: '60px',
		autoplay: true,
  		autoplaySpeed: 2000,
		responsive: [
			{
				breakpoint: 968,
				settings: {
				  arrows: false,
				  centerMode: true,
				  centerPadding: '40px',
				  slidesToShow: 3
				}
			  },
			{
			  breakpoint: 768,
			  settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 2
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 1
			  }
			}
		  ]
	});
}
if($('.college_slider').length > 0){
	$('.college_slider').slick({
		infinite: true,
		slidesToShow: 6,
		slidesToScroll: 1,
		dots: false,
		arrows: true,
        prevArrow: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
        nextArrow: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
		centerPadding: '60px',
		autoplay: true,
  		autoplaySpeed: 2000,
		responsive: [
			{
				breakpoint: 968,
				settings: {
				  arrows: false,
				  centerMode: true,
				  centerPadding: '40px',
				  slidesToShow: 3
				}
			  },
			{
			  breakpoint: 768,
			  settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 2
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 1
			  }
			}
		  ]
	});
}
	
	
	/* ==== Revolution Slider ==== */
	if($('.tp-banner').length > 0){
		$('.tp-banner').show().revolution({
			delay:6000,
	        startheight:550,
	        startwidth: 1140,
	        hideThumbs: 1000,
	        navigationType: 'none',
	        touchenabled: 'on',
	        onHoverStop: 'on',
	        navOffsetHorizontal: 0,
	        navOffsetVertical: 0,
	        dottedOverlay: 'none',
	        fullWidth: 'on'
		});
	}
	
	
	//Top search bar open/close
    if (!$('.srchbox').hasClass("searchStayOpen")) {
        $("#jbsearch").click(function() {
            $(".srchbox").addClass("openSearch");
            $(".additional_fields").slideDown();
        });


        $(".srchbox").click(function(e) {
            e.stopPropagation();
        });
    }
	
})(jQuery);
//  var testimonialResponsive = {
//             0: {
//                 items: 1
//             },
//             992: {
//                 items: 1
//             },
//         };
// owlCarsouelActivate('.mian_slider', false, testimonialResponsive, 5000, 1500, true, false, 1500, true, 30);

// function owlCarsouelActivate(selector, nav, responsive, autoplayTimeout, autoplaySpeed, dots, animateOut, smartSpeed, autoplayHoverPause, margin = 0, loop = false, autoplay = false) {
//     var $selector = $(selector);
//     if ($selector.length > 0) {
//         $selector.owlCarousel({
//             loop: loop,
//             autoplay: autoplay,
//             autoplayTimeout: autoplayTimeout,
//             autoplaySpeed: autoplaySpeed,
//             dots: dots,
//             nav: nav,
            
//             smartSpeed: smartSpeed,
//             autoplayHoverPause: autoplayHoverPause,
//             animateOut: animateOut,
//             margin: margin,
//             responsive: responsive
//         });
//     }
// }




if (typeof menu === 'undefined' || typeof navbar === 'undefined') {
  const navbar = document.querySelector("#nav-main");
  const menu = document.querySelector("#menu-icon");

  menu.onclick = () => {
    menu.classList.toggle("active");
    navbar.classList.toggle("right-open");
  };
}

if (typeof toggleButtons === 'undefined') {
  const toggleButtons = document.querySelectorAll("li.nav-item");

  toggleButtons.forEach((toggleButton) => {
    toggleButton.addEventListener("click", () => {
      toggleButton.firstElementChild.lastElementChild.classList.toggle("up");
      toggleButton.lastElementChild.classList.toggle("open");
    });
  });
}
