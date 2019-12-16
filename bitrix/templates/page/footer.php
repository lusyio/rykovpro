<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
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
			</div>
			<footer class = "footer">
				<div class = "container">
					<div class = "row">
						<div class = "col-12">
							<div class = "footer-contacts">
								<p><b>Пресс-секретарь: </b></p>
								<ul>
									<li>
										<?$APPLICATION->IncludeComponent(
											"bitrix:main.include",
											"",
											Array(
												"AREA_FILE_SHOW" => "file",
												"AREA_FILE_SUFFIX" => "inc",
												"EDIT_TEMPLATE" => "",
												"PATH" => INC."/footer-fio.php"
											)
										);?>
									</li>
									<li>
										<?$APPLICATION->IncludeComponent(
											"bitrix:main.include",
											"",
											Array(
												"AREA_FILE_SHOW" => "file",
												"AREA_FILE_SUFFIX" => "inc",
												"EDIT_TEMPLATE" => "",
												"PATH" => INC."/footer-phone.php"
											)
										);?>
									</li>
									<li>
										<?$APPLICATION->IncludeComponent(
											"bitrix:main.include",
											"",
											Array(
												"AREA_FILE_SHOW" => "file",
												"AREA_FILE_SUFFIX" => "inc",
												"EDIT_TEMPLATE" => "",
												"PATH" => INC."/footer-email.php"
											)
										);?>
									</li>
								</ul>
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