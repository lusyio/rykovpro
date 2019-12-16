/*---------------------------
	SERVICES TABS
---------------------------*/

$(function() {
	"use strict";

		$(".services-nav li").click(function() {
			var item_id = $(this).attr("data-id");
			$(".services-nav li").removeClass("active");
			$(this).addClass("active");
			$(".services-text").removeClass("_show");
			$(".services-text[data-id = " + item_id + "]").addClass("_show");
		});

});