<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
	global $USER;
?>
<!DOCTYPE html>
<html lang = "ru">
	<head>
		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle();?></title>
		<meta charset = "utf-8">
		<meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name = "google-site-verification" content = "YXZf_pK1j6s1dwV8JjyJHnqgIaVj7_GhJ8tdW3DtxE0"/>
		<meta name="yandex-verification" content="dd334cbc800191d8" />
		<meta property = "og:locale" content = "ru_RU">
		<meta property = "og:type" content = "website">
		<meta property = "og:title" content = "<?$APPLICATION->ShowTitle();?>">
		<meta property = "og:description" content = "<?=$APPLICATION->GetProperty("description");?>">
		<meta property = "og:url" content = "https://rykov.pro<?=$APPLICATION->GetCurDir();?>">
		<meta property = "og:site_name" content = "rykov.pro">
		<meta name = "twitter:card" content = "summary">
		<meta name = "twitter:title" content = "<?$APPLICATION->ShowTitle();?>">
		<meta name = "twitter:description" content = "<?=$APPLICATION->GetProperty("description");?>">
		<?$APPLICATION->SetAdditionalCSS(PLUGINS."/bootstrap-4.3.1/css/bootstrap.css");?>
		<?//$APPLICATION->SetAdditionalCSS(PLUGINS."/bootstrap-4.3.1/css/bootstrap-grid.css");?>
		<?$APPLICATION->SetAdditionalCSS(PLUGINS."/icomoon-1.0.0/css/icomoon.css");?>
		<?$APPLICATION->SetAdditionalCSS(PLUGINS."/slick-1.8.1/css/slick.css");?>
		<?$APPLICATION->SetAdditionalCSS(ASSETS."/css/global.css");?>
		<?$APPLICATION->AddHeadScript(PLUGINS."/jquery-3.4.1/js/jquery.min.js");?>
		<?$APPLICATION->AddHeadScript(PLUGINS."/slick-1.8.1/js/slick.min.js");?>
		<?$APPLICATION->AddHeadScript(ASSETS."/js/global.js");?>
        <link rel = "shortcut icon" type = "image/x-icon" href = "/favicon.ico">
        <link rel = "icon" type = "image/x-icon" href = "/favicon.png">
	</head>
	<body>
		<?if($USER->IsAdmin()):?>
			<div id = "panel">
				<?$APPLICATION->ShowPanel();?>
			</div>
		<?endif;?>
		<div class = "wrapper">
			<header class = "header">
				<div class = "container">
					<div class = "row">
						<div class = "col-6 col-sm-4 col-md-4 col-lg-8">
							<div class = "header-left">
								<div class = "header-menu">
									<span class = "header-menu-open d-flex d-lg-none"><i class = "icon-menu"></i> Меню</span>
									<nav>
										<?$APPLICATION->IncludeComponent(
											"bitrix:menu",
											"top",
											Array(
												"ALLOW_MULTI_SELECT" => "N",
												"CHILD_MENU_TYPE" => "",
												"DELAY" => "N",
												"MAX_LEVEL" => "1",
												"MENU_CACHE_GET_VARS" => array(""),
												"MENU_CACHE_TIME" => "3600",
												"MENU_CACHE_TYPE" => "N",
												"MENU_CACHE_USE_GROUPS" => "Y",
												"ROOT_MENU_TYPE" => "top",
												"USE_EXT" => "N"
											)
										);?>
									</nav>
								</div>
							</div>
						</div>
						<div class = "col-6 col-sm-8 col-md-8 col-lg-4">
							<div class = "header-right">
								<div class = "header-social">
									<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
											"AREA_FILE_SHOW" => "file",
											"AREA_FILE_SUFFIX" => "inc",
											"EDIT_TEMPLATE" => "",
											"PATH" => INC."/header-social.php"
										)
									);?>
								</div>
								<div class = "header-search">
									<?$APPLICATION->IncludeComponent(
										"bitrix:search.form",
										"search",
										Array(
											"PAGE" => "#SITE_DIR#search/index.php",
											"USE_SUGGEST" => "N"
										)
									);?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div class = "page-header-wrap" data-background = "<?=$APPLICATION->GetProperty("background");?>">
				<div class = "page-header">
					<div class = "container">
						<div class = "row">
							<div class = "col-12 col-md-7 col-lg-7 col-xl-7 order-md-first order-last">
								<div class = "page-header-title">
									<span><?$APPLICATION->ShowTitle(false);?></span>
								</div>
							</div>
							<div class = "col-12 col-md-5 col-lg-5 col-xl-5 order-md-last order-first">
								<div class = "page-header-text">
									<?$APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									Array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => INC."/header-links.php"
									)
								);?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class = "breadcrumb">
					<div class = "container">
						<div class = "row">
							<div class = "col-12">
								<?$APPLICATION->IncludeComponent(
									"bitrix:breadcrumb",
									"breadcrumb",
									Array(),
									false
								);?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class = "content content-page">
				<div class = "container">
					<div class = "row">
						<div class = "col-12">