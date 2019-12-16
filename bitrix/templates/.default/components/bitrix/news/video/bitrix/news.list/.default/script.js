/*---------------------------
	VIDEO TOP
---------------------------*/

$(function() {
	"use strict";
	$(".video-top").each(function() {
		var img = $(this).attr("data-img");
		if (typeof img !== typeof undefined && img !== false) {
			$(this).css("background-image","url(" + img + ")");
		}
	});
});