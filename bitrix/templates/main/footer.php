<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
							</div>
						</div>
					</div>
				</div>
				<div class = "articles">
					<div class = "articles-slider">
						<div class = "container">
							<div class = "row">
								<div class = "col-12 col-sm-9 col-lg-10">
									<div class = "articles-slider-title">
										<h3>Популярные статьи</h3>
									</div>
								</div>
								<div class = "d-none d-sm-block col-sm-3 col-lg-2">
									<div class = "articles-slider-nav">
										<span class = "articles-slider-prev"><i class = "icon-left-arrow"></i></span>
										<span class = "articles-slider-next"><i class = "icon-right-arrow"></i></span>
									</div>
								</div>
							</div>
							<div class = "row">
								<div class = "col-12">
									<?
										$GLOBALS['arrFilterArticles'] = array(
											"PROPERTY_BX_PUBLICATIONS_SLIDER_VALUE" => "Да",
										);
									?>
									<?$APPLICATION->IncludeComponent(
										"bitrix:news.list",
										"articles_slider",
										Array(
											"ACTIVE_DATE_FORMAT" => "d.m.Y",
											"ADD_SECTIONS_CHAIN" => "N",
											"AJAX_MODE" => "N",
											"AJAX_OPTION_ADDITIONAL" => "",
											"AJAX_OPTION_HISTORY" => "N",
											"AJAX_OPTION_JUMP" => "N",
											"AJAX_OPTION_STYLE" => "N",
											"CACHE_FILTER" => "N",
											"CACHE_GROUPS" => "N",
											"CACHE_TIME" => "36000000",
											"CACHE_TYPE" => "A",
											"CHECK_DATES" => "Y",
											"DETAIL_URL" => "",
											"DISPLAY_BOTTOM_PAGER" => "N",
											"DISPLAY_DATE" => "Y",
											"DISPLAY_NAME" => "Y",
											"DISPLAY_PICTURE" => "Y",
											"DISPLAY_PREVIEW_TEXT" => "N",
											"DISPLAY_TOP_PAGER" => "N",
											"FIELD_CODE" => array("", ""),
											"FILTER_NAME" => "arrFilterArticles",
											"HIDE_LINK_WHEN_NO_DETAIL" => "N",
											"IBLOCK_ID" => "4",
											"IBLOCK_TYPE" => "content",
											"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
											"INCLUDE_SUBSECTIONS" => "Y",
											"MESSAGE_404" => "",
											"NEWS_COUNT" => "12",
											"PAGER_BASE_LINK_ENABLE" => "N",
											"PAGER_DESC_NUMBERING" => "N",
											"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
											"PAGER_SHOW_ALL" => "N",
											"PAGER_SHOW_ALWAYS" => "N",
											"PAGER_TEMPLATE" => ".default",
											"PAGER_TITLE" => "Публикации",
											"PARENT_SECTION" => "",
											"PARENT_SECTION_CODE" => "",
											"PREVIEW_TRUNCATE_LEN" => "",
											"PROPERTY_CODE" => array("", ""),
											"SET_BROWSER_TITLE" => "N",
											"SET_LAST_MODIFIED" => "N",
											"SET_META_DESCRIPTION" => "N",
											"SET_META_KEYWORDS" => "N",
											"SET_STATUS_404" => "N",
											"SET_TITLE" => "N",
											"SHOW_404" => "N",
											"SORT_BY1" => "ACTIVE_FROM",
											"SORT_BY2" => "SORT",
											"SORT_ORDER1" => "DESC",
											"SORT_ORDER2" => "ASC",
											"STRICT_SECTION_CHECK" => "N"
										)
									);?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class = "ideas">
					<div class = "ideas-slider">
						<div class = "container">
							<div class = "row">
								<div class = "col-12 col-sm-9 col-lg-10">
									<div class = "ideas-slider-title">
										<h3>Идеи и мнения</h3>
									</div>
								</div>
								<div class = "d-none d-sm-block col-sm-3 col-lg-2">
									<div class = "ideas-slider-nav">
										<span class = "ideas-slider-prev"><i class = "icon-left-arrow"></i></span>
										<span class = "ideas-slider-next"><i class = "icon-right-arrow"></i></span>
									</div>
								</div>
							</div>
							<div class = "row">
								<div class = "col-12">
									<?
										$GLOBALS['arrFilterIdeas'] = array(
											"PROPERTY_BX_IDEAS_SLIDER_VALUE" => "Да",
										);
									?>
									<?$APPLICATION->IncludeComponent(
										"bitrix:news.list",
										"ideas_slider",
										Array(
											"ACTIVE_DATE_FORMAT" => "d.m.Y",
											"ADD_SECTIONS_CHAIN" => "N",
											"AJAX_MODE" => "N",
											"AJAX_OPTION_ADDITIONAL" => "",
											"AJAX_OPTION_HISTORY" => "N",
											"AJAX_OPTION_JUMP" => "N",
											"AJAX_OPTION_STYLE" => "N",
											"CACHE_FILTER" => "N",
											"CACHE_GROUPS" => "N",
											"CACHE_TIME" => "36000000",
											"CACHE_TYPE" => "A",
											"CHECK_DATES" => "Y",
											"DETAIL_URL" => "",
											"DISPLAY_BOTTOM_PAGER" => "N",
											"DISPLAY_DATE" => "Y",
											"DISPLAY_NAME" => "Y",
											"DISPLAY_PICTURE" => "Y",
											"DISPLAY_PREVIEW_TEXT" => "Y",
											"DISPLAY_TOP_PAGER" => "N",
											"FIELD_CODE" => array("", ""),
											"FILTER_NAME" => "arrFilterIdeas",
											"HIDE_LINK_WHEN_NO_DETAIL" => "N",
											"IBLOCK_ID" => "8",
											"IBLOCK_TYPE" => "content",
											"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
											"INCLUDE_SUBSECTIONS" => "Y",
											"MESSAGE_404" => "",
											"NEWS_COUNT" => "12",
											"PAGER_BASE_LINK_ENABLE" => "N",
											"PAGER_DESC_NUMBERING" => "N",
											"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
											"PAGER_SHOW_ALL" => "N",
											"PAGER_SHOW_ALWAYS" => "N",
											"PAGER_TEMPLATE" => ".default",
											"PAGER_TITLE" => "Идеи",
											"PARENT_SECTION" => "",
											"PARENT_SECTION_CODE" => "",
											"PREVIEW_TRUNCATE_LEN" => "",
											"PROPERTY_CODE" => array("", ""),
											"SET_BROWSER_TITLE" => "N",
											"SET_LAST_MODIFIED" => "N",
											"SET_META_DESCRIPTION" => "N",
											"SET_META_KEYWORDS" => "N",
											"SET_STATUS_404" => "N",
											"SET_TITLE" => "N",
											"SHOW_404" => "N",
											"SORT_BY1" => "ACTIVE_FROM",
											"SORT_BY2" => "SORT",
											"SORT_ORDER1" => "DESC",
											"SORT_ORDER2" => "ASC",
											"STRICT_SECTION_CHECK" => "N"
										)
									);?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class = "video">
					<div class = "video-slider">
						<div class = "container">
							<div class = "row">
								<div class = "col-12 col-sm-9 col-lg-10">
									<div class = "video-slider-title">
										<h3>Видео публикации</h3>
									</div>
								</div>
								<div class = "d-none d-sm-block col-sm-3 col-lg-2">
									<div class = "video-slider-nav">
										<span class = "video-slider-prev"><i class = "icon-left-arrow"></i></span>
										<span class = "video-slider-next"><i class = "icon-right-arrow"></i></span>
									</div>
								</div>
							</div>
							<div class = "row">
								<div class = "col-12">
									<?
										$GLOBALS['arrFilterVideo'] = array(
											"PROPERTY_BX_VIDEO_SLIDER_VALUE" => "Да",
										);
									?>
									<?$APPLICATION->IncludeComponent(
										"bitrix:news.list",
										"videos_slider",
										Array(
											"ACTIVE_DATE_FORMAT" => "d.m.Y",
											"ADD_SECTIONS_CHAIN" => "N",
											"AJAX_MODE" => "N",
											"AJAX_OPTION_ADDITIONAL" => "",
											"AJAX_OPTION_HISTORY" => "N",
											"AJAX_OPTION_JUMP" => "N",
											"AJAX_OPTION_STYLE" => "Y",
											"CACHE_FILTER" => "N",
											"CACHE_GROUPS" => "Y",
											"CACHE_TIME" => "36000000",
											"CACHE_TYPE" => "A",
											"CHECK_DATES" => "Y",
											"DETAIL_URL" => "",
											"DISPLAY_BOTTOM_PAGER" => "N",
											"DISPLAY_DATE" => "Y",
											"DISPLAY_NAME" => "Y",
											"DISPLAY_PICTURE" => "Y",
											"DISPLAY_PREVIEW_TEXT" => "N",
											"DISPLAY_TOP_PAGER" => "N",
											"FIELD_CODE" => array("", ""),
											"FILTER_NAME" => "arrFilterVideo",
											"HIDE_LINK_WHEN_NO_DETAIL" => "N",
											"IBLOCK_ID" => "6",
											"IBLOCK_TYPE" => "content",
											"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
											"INCLUDE_SUBSECTIONS" => "Y",
											"MESSAGE_404" => "",
											"NEWS_COUNT" => "12",
											"PAGER_BASE_LINK_ENABLE" => "N",
											"PAGER_DESC_NUMBERING" => "N",
											"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
											"PAGER_SHOW_ALL" => "N",
											"PAGER_SHOW_ALWAYS" => "N",
											"PAGER_TEMPLATE" => ".default",
											"PAGER_TITLE" => "Видео",
											"PARENT_SECTION" => "",
											"PARENT_SECTION_CODE" => "",
											"PREVIEW_TRUNCATE_LEN" => "",
											"PROPERTY_CODE" => array("BX_VIDEO_LINK", ""),
											"SET_BROWSER_TITLE" => "N",
											"SET_LAST_MODIFIED" => "N",
											"SET_META_DESCRIPTION" => "N",
											"SET_META_KEYWORDS" => "N",
											"SET_STATUS_404" => "N",
											"SET_TITLE" => "N",
											"SHOW_404" => "N",
											"SORT_BY1" => "ACTIVE_FROM",
											"SORT_BY2" => "SORT",
											"SORT_ORDER1" => "DESC",
											"SORT_ORDER2" => "ASC",
											"STRICT_SECTION_CHECK" => "N"
										)
									);?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class = "tagline">
					<div class = "container">
						<div class = "row">
							<div class = "col-12">
								<?$APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									Array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => INC."/footer-tagline.php"
									)
								);?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<footer class = "footer">
				<div class = "container">
					<div class = "row">
						<div class = "col-12">
							<div class = "footer-contacts">
<!--								<p><b>Пресс-секретарь: </b></p>-->
<!--								<ul>-->
<!--									<li>-->
<!--										--><?//$APPLICATION->IncludeComponent(
//											"bitrix:main.include",
//											"",
//											Array(
//												"AREA_FILE_SHOW" => "file",
//												"AREA_FILE_SUFFIX" => "inc",
//												"EDIT_TEMPLATE" => "",
//												"PATH" => INC."/footer-fio.php"
//											)
//										);?>
<!--									</li>-->
<!--									<li>-->
<!--										--><?//$APPLICATION->IncludeComponent(
//											"bitrix:main.include",
//											"",
//											Array(
//												"AREA_FILE_SHOW" => "file",
//												"AREA_FILE_SUFFIX" => "inc",
//												"EDIT_TEMPLATE" => "",
//												"PATH" => INC."/footer-phone.php"
//											)
//										);?>
<!--									</li>-->
<!--									<li>-->
<!--										--><?//$APPLICATION->IncludeComponent(
//											"bitrix:main.include",
//											"",
//											Array(
//												"AREA_FILE_SHOW" => "file",
//												"AREA_FILE_SUFFIX" => "inc",
//												"EDIT_TEMPLATE" => "",
//												"PATH" => INC."/footer-email.php"
//											)
//										);?>
<!--									</li>-->
<!--								</ul>-->
							</div>
						</div>
					</div>
					<div class = "row">
						<div class = "col-12">
							<div class = "footer-menu">
								<?$APPLICATION->IncludeComponent(
										"bitrix:menu",
										"bottom",
										Array(
											"ALLOW_MULTI_SELECT" => "N",
											"CHILD_MENU_TYPE" => "",
											"DELAY" => "N",
											"MAX_LEVEL" => "1",
											"MENU_CACHE_GET_VARS" => array(""),
											"MENU_CACHE_TIME" => "3600",
											"MENU_CACHE_TYPE" => "N",
											"MENU_CACHE_USE_GROUPS" => "Y",
											"ROOT_MENU_TYPE" => "bottom",
											"USE_EXT" => "N"
										)
									);?>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<?//BEGIN ANALYTICS?>
		<?require_once($_SERVER["DOCUMENT_ROOT"].INC."/analytics.php");?>
		<?//END ANALYTICS?>
	</body>
</html>