/*---------------------------
	PUBLICATIONS TOP
---------------------------*/

$(function() {
	"use strict";
	$(".publications-top").each(function() {
		var img = $(this).attr("data-img");
		if (typeof img !== typeof undefined && img !== false) {
			$(this).css("background-image","url(" + img + ")");
		}
	});
	$(".publications-favorites-item").each(function() {
		var img = $(this).attr("data-img");
		if (typeof img !== typeof undefined && img !== false) {
			$(this).css("background-image","url(" + img + ")");
		}
	});
});