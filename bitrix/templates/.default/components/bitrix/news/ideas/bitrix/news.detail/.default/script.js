/*---------------------------
	IDEAS DETAIL
---------------------------*/

$(function() {
	"use strict";
	$(".ideas-detail-picture").each(function() {
		var img = $(this).attr("data-img");
		if (typeof img !== typeof undefined && img !== false) {
			$(this).css("background-image","url(" + img + ")");
		}
	});
});