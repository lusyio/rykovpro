/*---------------------------
	NEWS TOP
---------------------------*/

$(function() {
	"use strict";
	$(".news-top").each(function() {
		var img = $(this).attr("data-img");
		if (typeof img !== typeof undefined && img !== false) {
			$(this).css("background-image","url(" + img + ")");
		}
	});
	$(".news-favorites-item").each(function() {
		var img = $(this).attr("data-img");
		if (typeof img !== typeof undefined && img !== false) {
			$(this).css("background-image","url(" + img + ")");
		}
	});
});