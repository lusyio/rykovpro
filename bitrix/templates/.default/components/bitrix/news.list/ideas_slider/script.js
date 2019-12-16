/*---------------------------
	IDEAS SLIDER
---------------------------*/

$(function() {
	"use strict";
	$(".ideas-slider-list").slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		prevArrow: $(".ideas-slider-prev"),
		nextArrow: $(".ideas-slider-next"),
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
				}
			},
			{
				breakpoint: 575,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					infinite: true,
					dots: true
				}
			},
		]
	});
});