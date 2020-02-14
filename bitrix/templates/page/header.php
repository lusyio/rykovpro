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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
	<body>
    <div class="modal advice-modal fade bd-example-modal-lg" id="adviceModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button class="advice-modal__close" data-dismiss="modal"><img src="/bitrix/templates/main/images/close.svg" alt=""></button>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-4 d-lg-flex d-none">
                                <img class="advice-modal__img-rykov" src="/bitrix/templates/main/images/rykov-photo.png" alt="Рыков">
                            </div>
                            <div class="col-12 col-lg-8">
                                <p class="advice-modal__title">Юридические советы по работе с контрагентами</p>
                                <p class="advice-modal__list"><img src="/bitrix/templates/main/images/tick.svg" alt="">Как предотвратить появление дебиторки</p>
                                <p class="advice-modal__list"><img src="/bitrix/templates/main/images/tick.svg" alt="">Как правильно требовать возврат денежных средств</p>
                                <p class="advice-modal__list"><img src="/bitrix/templates/main/images/tick.svg" alt="">Способы ведения жестких переговоров</p>
                                <p class="advice-modal__list"><img src="/bitrix/templates/main/images/tick.svg" alt="">Образцы документов для взыскания</p>
                                <p class="advice-modal__list"><img src="/bitrix/templates/main/images/tick.svg" alt="">Кейсы и примеры из практики</p>
                                <p class="advice-modal__more">это и многое другое в еженедельной авторской рассылке от Ивана Рыкова</p>
                                <form method="POST"
                                      onsubmit="ym(67390081, 'reachGoal', 'emailModal'); return true;"
                                      action="https://cp.unisender.com/ru/subscribe?hash=6jjxbafghy6pa5yqnzi9qcdi6yd4oaidhducaapy38enjnmfr9z3o"
                                      name="subscribtion_form">
                                    <div class="input-group">
                                        <div class="subscribe-form-item subscribe-form-item--input-email">
                                            <input
                                                    class="subscribe-form-item__control subscribe-form-item__control--input-email form-control advice-input"
                                                    placeholder="Введите ваш email" type="text" name="email" value="">
                                        </div>
                                        <div class="subscribe-form-item subscribe-form-item--btn-submit input-group-append">
                                            <input
                                                    class="subscribe-form-item__btn subscribe-form-item__btn--btn-submit btn btn-outline adviceBtn"
                                                    type="submit" value="Подписаться">
                                        </div>
                                        <input type="hidden" name="charset" value="UTF-8">
                                        <input type="hidden" name="default_list_id" value="19597957">
                                        <input type="hidden" name="overwrite" value="2">
                                        <input type="hidden" name="is_v5" value="1">
                                    </div>
                                    <a class="d-block d-lg-none advice-modal__close-link" data-dismiss="modal">Нет, спасибо, у меня все под контролем!</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
									<h1><?$APPLICATION->ShowTitle(false);?></h1>
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
                            <script>
                                function setCookie(name,value,days) {
                                    let expires = "";
                                    if (days) {
                                        let date = new Date();
                                        date.setTime(date.getTime() + (days*24*60*60*1000));
                                        expires = "; expires=" + date.toUTCString();
                                    }
                                    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
                                }
                                function getCookie(name) {
                                    let nameEQ = name + "=";
                                    let ca = document.cookie.split(';');
                                    for(let i=0;i < ca.length;i++) {
                                        let c = ca[i];
                                        while (c.charAt(0)==' ') c = c.substring(1,c.length);
                                        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                                    }
                                    return null;
                                }
                                $(document).ready(function () {
                                    let cookie = getCookie('modal');
                                    if (cookie === 'hide'){
                                        $('#adviceModal').removeAttr("id");
                                    } else {
                                        setTimeout(function () {
                                            $('#adviceModal').modal({
                                                backdrop: true,
                                                keyboard: true,
                                                show: true
                                            })
                                        }, 15000)
                                        $('#adviceModal').on('hide.bs.modal', function () {
                                            $(this).removeAttr("id");
                                            setCookie('modal', 'hide', 10)
                                        })
                                    }

                                })
                            </script>