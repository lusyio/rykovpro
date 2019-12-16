/*---------------------------
	GLOBAL JS
---------------------------*/

$(function() {
	"use strict";

	//BEGIN BACKGROUND
	if($(".page-header-wrap").attr("data-background")) {
		var bg_page = $(".page-header-wrap").attr("data-background");
		$(".page-header-wrap").css("background-image","url(" + bg_page + ")");
	}
	//END BACKGROUND

	//BEGIN MODAL
	$(".block-modal-header-back, .block-modal-overlay").click(function() {
		$(".block-modal").removeClass("open");
		$("body").css("overflow-y","auto");
	});

	$("[data-toggle = 'block-modal']").click(function() {
		$(".block-modal").removeClass("open");
		var target = $(this).attr("data-target");
		$(document).find(target).addClass("open");
		$("body").css("overflow-y","hidden");
	});
	//BEGIN MODAL

	//YOUTUBE VIDEO
	var youtube = $(".youtube");
	if(!youtube.hasClass("embed-responsive")) {
		$(".youtube").addClass("embed-responsive embed-responsive-16by9");
	}
	var image = $(".embed-responsive");
	for (var i = 0; i < youtube.length; i++) {
		var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/maxresdefault.jpg";
		var name = youtube[i].dataset.name;
		$(image[i]).css("background-image","url(" + source + ")");
		$(youtube[i]).click(function() {
			var iframe = document.createElement("iframe");
					iframe.setAttribute("frameborder", "0");
					iframe.setAttribute("class", "embed-responsive-item");
					iframe.setAttribute("allowfullscreen", "");
					iframe.setAttribute("src", "https://www.youtube.com/embed/" + this.dataset.embed + "?rel=0&showinfo=0&autoplay=1" );
					this.innerHTML = "";
					this.appendChild(iframe);
		});
	};

	//VIDEO SLIDER
	$(".video-slider-list").slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		prevArrow: $(".video-slider-prev"),
		nextArrow: $(".video-slider-next"),
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