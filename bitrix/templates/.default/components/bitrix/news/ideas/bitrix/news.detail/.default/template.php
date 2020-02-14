<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

// Оборачиваем таблицы div'ом
$arResult["DETAIL_TEXT"] = preg_replace('~<table~iU', '<div class="tables-responsive"><table', $arResult["DETAIL_TEXT"]);
$arResult["DETAIL_TEXT"] = preg_replace('~</table>~iU', '</table></div>', $arResult["DETAIL_TEXT"]);


$widgetAdvice = '    <div class="sidebar-advice">
        <div class="sidebar-advice__body">
            <div class="rykov-sidebar"></div>
            <p class="h3">Юридические советы по работе с контрагентами</p>
            <p>
                Как работать с дебиторкой, вести переговоры, образцы документов, кейсы из практки и многое другое в
                еженедельной авторской рассылке от Ивана Рыкова
            </p>
            <form
                    onsubmit="ym(67390351, \'reachGoal\', \'emailSidebarDebt\'); return true;"
                    method="POST"
                    action="https://cp.unisender.com/ru/subscribe?hash=6jjxbafghy6pa5yqnzi9qcdi6yd4oaidhducaapy38enjnmfr9z3o"
                    name="subscribtion_form"
            >
                <div class="subscribe-form-item subscribe-form-item--input-email">
                    <input
                            class="subscribe-form-item__control subscribe-form-item__control--input-email"
                            type="text"
                            name="email"
                            value=""
                            placeholder="Введите ваш email"
                    />
                </div>
                <div class="subscribe-form-item subscribe-form-item--btn-submit">
                    <input
                            class="subscribe-form-item__btn subscribe-form-item__btn--btn-submit"
                            type="submit"
                            value="Подписаться"
                    />
                </div>
                <input type="hidden" name="charset" value="UTF-8"/>
                <input type="hidden" name="default_list_id" value="19597957"/>
                <input type="hidden" name="overwrite" value="2"/>
                <input type="hidden" name="is_v5" value="1"/>
            </form>
        </div>
    </div>';

$widgetSubcide = ' <div class="subscribe-form">
                            <div class="subscribe-form-body">
                                <p class="h3"> Как не попасть под субсидиарку</p>
                                <p>Как правильно вести бизнес, чтобы не попасть под субсидиарную ответственность.
                                    Еженедельная авторская
                                    рассылка от Ивана Рыкова</p>
                                <form
                                        onsubmit="ym(67390351, \'reachGoal\', \'emailSidebarSubsid\'); return true;"
                                        method="POST"
                                        action="https://cp.unisender.com/ru/subscribe?hash=6jjxbafghy6pa5yqnzi9qcdi6yd4oaidhducaapy38enjnmfr9z3o"
                                        name="subscribtion_form"
                                >
                                    <div class="subscribe-form-item subscribe-form-item--input-email">
                                        <input
                                                class="subscribe-form-item__control subscribe-form-item__control--input-email"
                                                type="text"
                                                name="email"
                                                value=""
                                                placeholder="Введите ваш email"
                                        />
                                    </div>
                                    <div class="subscribe-form-item subscribe-form-item--btn-submit">
                                        <input
                                                class="subscribe-form-item__btn subscribe-form-item__btn--btn-submit"
                                                type="submit"
                                                value="Подписаться"
                                        />
                                    </div>
                                    <input type="hidden" name="charset" value="UTF-8"/>
                                    <input type="hidden" name="default_list_id" value="19597957"/>
                                    <input type="hidden" name="overwrite" value="2"/>
                                    <input type="hidden" name="is_v5" value="1"/>
                                </form>
                            </div>
                        </div>'
?>


<div class="ideas-detail">
    <? $picture = $arResult['DETAIL_PICTURE']['SRC']; ?>
    <? if (!$picture): ?>
        <? $picture = $templateFolder . "/img/default.jpg"; ?>
    <? endif; ?>
    <div class="ideas-detail-picture" data-img="<?= $picture; ?>">
        <h1><?= $arResult["NAME"]; ?></h1>
        <? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]): ?>
            <span><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></span>
        <? endif; ?>
    </div>
    <? if ($arResult["TAGS"]): ?>
        <? $tags = explode(",", $arResult["TAGS"]); ?>
    <? endif; ?>
    <div class="ideas-detail-tags">
        <ul>
            <? foreach ($tags as $key => $value): ?>
                <li><a href="/search/?tags=<?= trim($value); ?>">#<?= trim($value); ?></a></li>
            <? endforeach; ?>
        </ul>
    </div>
    <? if ($arResult["DISPLAY_PROPERTIES"]["BX_IDEAS_BANNERS"]): ?>
        <div class="row">
            <div class="col-lg-1 d-none order-2 d-lg-flex"></div>
            <div class="col-12 col-lg-4 order-lg-3 order-1 d-lg-flex">
                <div class="ideas-detail-sidebar">
                    <div class="ideas-detail-sidebar">
                        <? foreach ($arResult["DISPLAY_PROPERTIES"]["BX_IDEAS_BANNERS"]["VALUE"] as $key => $value): ?>
                            <? if ($arResult["DISPLAY_PROPERTIES"]["BX_IDEAS_BANNERS"]["DESCRIPTION"][$key]): ?>
                                <div class="ideas-detail-banner">
                                    <a href="<?= $arResult['DISPLAY_PROPERTIES']['BX_ideas_BANNERS']['DESCRIPTION'][$key]; ?>"
                                       target="_blank">
                                        <img class="img-fluid" src="<?= CFile::GetPath($value); ?>"
                                             alt="<?= $arResult['NAME']; ?>">
                                    </a>
                                </div>
                            <? else: ?>
                                <div class="ideas-detail-banner">
                                    <img class="img-fluid" src="<?= CFile::GetPath($value); ?>"
                                         alt="<?= $arResult['NAME']; ?>">
                                </div>
                            <? endif; ?>
                        <? endforeach; ?>
                    </div>
                    <?php
                    $rand = rand(1, 2);
                    if ($rand === 1) {
                        echo $widgetSubcide;
                    } else {
                        echo $widgetAdvice;
                    }
                    ?>
                </div>
            </div>
            <div class="col-12 col-md-12 pr-unset pr-lg-0 order-lg-1 order-3 col-lg-7">
                <div class="ideas-detail-text">
                    <?= $arResult["DETAIL_TEXT"]; ?>
                    <div class="ideas-detail-share">
                        <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                        <script src="https://yastatic.net/share2/share.js"></script>
                        <p>Понравилась статья? Расскажи об этом друзьям</p>
                        <div class="ya-share2 text-center"
                             data-services="vkontakte,facebook,odnoklassniki,moimir,evernote,linkedin,whatsapp,telegram"></div>
                    </div>
                    <div class="ideas-detail-author">
                        <div class="row">
                            <div class="col-md-3 col-12 text-md-left text-center mb-md-0 mb-4">
                                <img class="author-img"
                                     src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/rykov.jpg"
                                     alt="rykov">
                                <div class="ideas-detail__socials">
                                    <a href="https://www.facebook.com/rykovproff/?modal=suggested_action&notif_id=1579101163193967&notif_t=page_user_activity&ref=notif">
                                        <img src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/facebook-social.svg"
                                             alt="facebook-social">
                                    </a>
                                    <a href="mailto:rykovpro@gmail.com">
                                        <img src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/gmail-social.svg"
                                             alt="gmail-social">
                                    </a>
                                    <a href="https://instagram.com/rykov.pro">
                                        <img src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/instagram-social.svg"
                                             alt="instagram-social">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <p class="ideas-detail-author__title text-md-left text-center">
                                    Рыков Иван
                                </p>
                                <p class="ideas-detail-author__description ml-md-0 mr-md-0 ml-auto mr-auto text-md-left text-center">
                                    Основатель антикризисной юридической компании «Рыков групп»
                                </p>
                                <p class="ideas-detail-author__spec">
                                    <strong>Специализации:</strong> антикризисное управление и банкротство крупных
                                    предприятий и организаций;
                                    управление проблемными активами; взыскание дебиторской задолженности, деятельность
                                    коллекторов; субсидиарная ответственность по обязательствам должника.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? else: ?>
        <div class="row">
            <div class="col-lg-1 d-none order-2 d-lg-flex"></div>
            <div class="col-12 col-lg-4 order-lg-3 order-1 d-lg-flex">
                <div class="ideas-detail-sidebar">
                    <?php
                    $rand = rand(1, 2);
                    if ($rand === 1) {
                        echo $widgetSubcide;
                    } else {
                        echo $widgetAdvice;
                    }
                    ?>
                </div>
            </div>
            <div class="col-12 col-md-12 pr-unset pr-lg-0 order-lg-1 order-3 col-lg-7">
                <div class="ideas-detail-text">
                    <?= $arResult["DETAIL_TEXT"]; ?>
                    <div class="ideas-detail-share">
                        <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                        <script src="https://yastatic.net/share2/share.js"></script>
                        <p>Понравилась статья? Расскажи об этом друзьям</p>
                        <div class="ya-share2 text-center"
                             data-services="vkontakte,facebook,odnoklassniki,moimir,evernote,linkedin,whatsapp,telegram"></div>
                    </div>
                    <div class="ideas-detail-author">
                        <div class="row">
                            <div class="col-md-3 col-12 text-md-left text-center mb-md-0 mb-4">
                                <img class="author-img"
                                     src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/rykov.jpg"
                                     alt="rykov">
                                <div class="ideas-detail__socials">
                                    <a href="https://www.facebook.com/rykovproff/?modal=suggested_action&notif_id=1579101163193967&notif_t=page_user_activity&ref=notif">
                                        <img src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/facebook-social.svg"
                                             alt="facebook-social">
                                    </a>
                                    <a href="mailto:rykovpro@gmail.com">
                                        <img src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/gmail-social.svg"
                                             alt="gmail-social">
                                    </a>
                                    <a href="https://instagram.com/rykov.pro">
                                        <img src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/instagram-social.svg"
                                             alt="instagram-social">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <p class="ideas-detail-author__title text-md-left text-center">
                                    Рыков Иван
                                </p>
                                <p class="ideas-detail-author__description ml-md-0 mr-md-0 ml-auto mr-auto text-md-left text-center">
                                    Основатель антикризисной юридической компании «Рыков групп»
                                </p>
                                <p class="ideas-detail-author__spec">
                                    <strong>Специализации:</strong> антикризисное управление и банкротство крупных
                                    предприятий и организаций;
                                    управление проблемными активами; взыскание дебиторской задолженности, деятельность
                                    коллекторов; субсидиарная ответственность по обязательствам должника.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <? endif; ?>
</div>