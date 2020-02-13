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


/**
 * Возвращает html-код блока "Рекомендую"
 * @param $publicationId
 * @return false|string
 */
function getRecommended($publicationId, $imageAlt = '')
{
    global $templateFolder;
    if (CModule::IncludeModule("iblock") && CModule::IncludeModule("main")) {
        $recommendedResult = CIBlockElement::GetByID($publicationId)->getNext();
        if (!$recommendedResult) {
            return '';
        }
        $recommendedPicture = CFile::GetPath($recommendedResult['DETAIL_PICTURE']);
        if (!$recommendedPicture) {
            $recommendedPicture = $templateFolder . "/img/default.jpg";
        }
        ob_start();
        ?>
        <div class="publications-detail-picture">
            <img src="<?= $recommendedPicture; ?>" alt="<?= $imageAlt ?>" title="<?= $imageAlt ?>">
            <div class="publications-detail-picture-body">
                <p>Также рекомендую прочитать эту статью</p>
                <p class="h1"><?= $recommendedResult["NAME"]; ?></p>
                <p>
                    <?= $recommendedResult["PREVIEW_TEXT"]; ?>
                </p>
                <a onclick="ym(21107527, 'reachGoal', 'morearticle'); return true;" class="btn btn-primary btn-radius"
                   href="<?= $recommendedResult["DETAIL_PAGE_URL"]; ?>">Продолжить чтение</a>
            </div>
        </div>
        <?
        return ob_get_clean();
    }
    return '';
}

function getSubscribeForm()
{
    ob_start();
    ?>
    <div class="publications-detail-advice">
        <div class="row">
            <div class="col-md-4 col-xl-3 col-12 text-md-left text-center">
                <img class="advice-img"
                     src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/rykov.jpg"
                     alt="rykov">
            </div>
            <div class="col">
                <div class="publications-detail-advice-body">
                    <p class="h3">Как не попасть под субсидиарку?</p>
                    <p>Авторские советы от Ивана Рыкова раз в месяц в нашей рассылке для
                        предпринимателей.</p>
                    <form method="POST"
                          onsubmit="ym(21107527, 'reachGoal', 'subscribe2'); return true;"
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
                            <input type="hidden" name="default_list_id" value="19751373">
                            <input type="hidden" name="overwrite" value="2">
                            <input type="hidden" name="is_v5" value="1">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?
    return ob_get_clean();
}

// БЛОК ОБРАБОТКИ ШОРТКОДОВ
// шорткод [recommend id={publicationId}]
$codes = [];
$codesCount = preg_match_all('~\[recommend id=([0-9]{1,9})\]~U', $arResult["DETAIL_TEXT"], $codes);
if ($codesCount > 0) {
    foreach ($codes[1] as $key => $value) {
        $html = getRecommended($value, $arResult['NAME']);
        $arResult["DETAIL_TEXT"] = preg_replace('~\[recommend id=' . $value . '\]~iU', $html, $arResult["DETAIL_TEXT"]);
    }
}

// шорткод [test id={testId}]
$codes = [];
$codesCount = preg_match_all('~\[test id=([0-9a-zA-Z]{1,9})\]~U', $arResult["DETAIL_TEXT"], $codes);
if ($codesCount > 0) {
    $tests = require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/templates/.default/components/bitrix/tests/tests.php';
    foreach ($codes[1] as $key => $value) {
        if (key_exists($value, $tests)) {
            $html = $tests[$value];
            $arResult["DETAIL_TEXT"] = preg_replace('~\[test id=' . $value . '\]~iU', $html, $arResult["DETAIL_TEXT"]);
        }
    }
}

// шорткод [subscribe]
$codes = [];
$codesCount = preg_match_all('~\[subscribe\]~U', $arResult["DETAIL_TEXT"], $codes);
if ($codesCount > 0) {
    foreach ($codes[0] as $key => $value) {
        $html = getSubscribeForm();
        $arResult["DETAIL_TEXT"] = preg_replace('~\[subscribe\]~iU', $html, $arResult["DETAIL_TEXT"]);
    }
}
// КОНЕЦ БЛОКА ОБРАБОТКИ ШОРТКОДОВ

// БЛОК ГЕНЕРАЦИИ ОГЛАВЛЕНИЯ - html-код оглавления в переменной $listOfContentHtml
$listOfContentHtml = '';
// В массив hTitles помещаем массив с содержимым тегов h2 и h3 и массив со значениями 2 и 3, содержащихся в тексте статьи
$hTitles = [];
$matchesCount = preg_match_all('~<h([2-3]{1}).{0,}>(.+)</h~iU', $arResult["DETAIL_TEXT"], $hTitles);
// Создаем оглавение, если найден хоть один тег h2 или h3
if ($matchesCount > 0) {
    $ids = [];
    $i = 1; // Добавляем к каждому тегу h2 и h3 id="content{i}" а в массив ids записываем эти id
    $arResult["DETAIL_TEXT"] = preg_replace_callback('~<h([2-3]{1})~i', function ($hValue) use (&$i, &$ids) {
        $titleId = 'content' . $i++;
        $ids[] = $titleId;
        return '<h' . $hValue[1] . ' id="' . $titleId . '"';
    }, $arResult["DETAIL_TEXT"]);

    // Создаем html-код оглавления
    $listOfContentHtml .= '<ul>';
    $listOfContentHtml .= '<p>Оглавление</p>';
    $isInside = false;
    foreach ($ids as $key => $id) {
        if ($hTitles[1][$key] == 3 && !$isInside) { // Если первый вложенный заголовок
            $isInside = true;
            $listOfContentHtml .= '<ul>';
        } elseif ($hTitles[1][$key] == 2 && $isInside) { // Если предыдущий заголовок вложенный, а текущий - нет
            $isInside = false;
            $listOfContentHtml .= '</ul>';
        }
        $listOfContentHtml .= '<li><a href="#' . $id . '">' . $hTitles[2][$key] . '</a></li>';
        if(count($hTitles[1]) === $key + 1 ){
            $listOfContentHtml .= '</ul>';
        }
    }
    $listOfContentHtml .= '</ul>';
}

// КОНЕЦ БЛОКА ГЕНЕРАЦИИ ОГЛАВЛЕНИЯ

//БЛОК ПОЛУЧЕНИЯ БАННЕРА ДЛЯ ВСТАВКИ - html-код баннера в переменной $banner
$banner = '';
$banners = require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/templates/.default/components/bitrix/banner/banner.php';
$hasSpecifiedBanner = isset($arResult['PROPERTIES']['PUBLICATIONS_BANNER']) && isset($banners[$arResult['PROPERTIES']['PUBLICATIONS_BANNER']['VALUE_XML_ID']]);
if ($hasSpecifiedBanner) {
    $banner = $banners[$arResult['PROPERTIES']['PUBLICATIONS_BANNER']['VALUE_XML_ID']];
} else {
    $banner = $banners['default'];
}
//КОНЕЦ БЛОКА ПОЛУЧЕНИЯ БАННЕРА ДЛЯ ВСТАВКИ

// Оборачиваем таблицы div'ом
$arResult["DETAIL_TEXT"] = preg_replace('~<table~iU', '<div class="tables-responsive"><table', $arResult["DETAIL_TEXT"]);
$arResult["DETAIL_TEXT"] = preg_replace('~</table>~iU', '</table></div>', $arResult["DETAIL_TEXT"]);
?>

<div class="publications-detail">
    <? $picture = $arResult['DETAIL_PICTURE']['SRC']; ?>
    <? if (!$picture): ?>
        <? $picture = $templateFolder . "/img/default.jpg"; ?>
    <? endif; ?>
    <div class="publications-detail-picture" data-img="<?= $picture; ?>">
        <h1><?= $arResult["NAME"]; ?></h1>
        <? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]): ?>
            <span><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></span>
        <? endif; ?>
    </div>
    <? if ($arResult["TAGS"]): ?>
        <? $tags = explode(",", $arResult["TAGS"]); ?>
    <? endif; ?>
    <div class="publications-detail-tags">
        <ul>
            <? foreach ($tags as $key => $value): ?>
                <li><span>#<?= trim($value); ?></span></li>
            <? endforeach; ?>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-1 d-none order-2 d-lg-flex"></div>
        <div class="col-12 col-lg-4 order-lg-3 order-1 d-lg-flex">
            <div class="publications-detail-sidebar">
                <?= $listOfContentHtml ?>
                <?= $banner ?>
                <? foreach ($arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_BANNERS"]["VALUE"] as $key => $value): ?>
                    <? if ($arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_BANNERS"]["DESCRIPTION"][$key]): ?>
                        <div class="publications-detail-banner">
                            <a href="<?= $arResult['DISPLAY_PROPERTIES']['BX_PUBLICATIONS_BANNERS']['DESCRIPTION'][$key]; ?>"
                               target="_blank">
                                <img class="img-fluid" src="<?= CFile::GetPath($value); ?>"
                                     alt="<?= $arResult['NAME']; ?>">
                            </a>
                        </div>
                    <? else: ?>
                        <div class="publications-detail-banner">
                            <img class="img-fluid" src="<?= CFile::GetPath($value); ?>" alt="<?= $arResult['NAME']; ?>">
                        </div>
                    <? endif; ?>
                <? endforeach; ?>
                <? if ($arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_DOCS"]): ?>
                    <div class="download-form">
                        <img src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/download-file.png"
                             alt="Скачать файлы">
                        <p>Скачайте образец документа {название документа} в формате .docx </p>
                        <form
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
                                        value="Скачать"
                                />
                            </div>
                            <input type="hidden" name="charset" value="UTF-8"/>
                            <input type="hidden" name="default_list_id" value="19597957"/>
                            <input type="hidden" name="overwrite" value="2"/>
                            <input type="hidden" name="is_v5" value="1"/>
                        </form>
                    </div>
                <? endif; ?>
            </div>
        </div>
        <div class="col-12 col-md-12 pr-unset pr-lg-0 order-lg-1 order-3 col-lg-7">
            <div class="publications-detail-text">
                <?= $arResult["DETAIL_TEXT"]; ?>
                <div class="publications-detail-share">
                    <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                    <script src="https://yastatic.net/share2/share.js"></script>
                    <p>Понравилась статья? Расскажи об этом друзьям</p>
                    <div class="ya-share2 text-center"
                         data-services="vkontakte,facebook,odnoklassniki,moimir,evernote,linkedin,whatsapp,telegram"></div>
                </div>
                <div class="publications-detail-author">
                    <div class="row">
                        <div class="col-md-3 col-12 text-md-left text-center mb-md-0 mb-4">
                            <img class="author-img"
                                 src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/rykov.jpg"
                                 alt="rykov">
                            <div class="publications-detail__socials">
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
                            <p class="publications-detail-author__title text-md-left text-center">
                                Рыков Иван
                            </p>
                            <p class="publications-detail-author__description ml-md-0 mr-md-0 ml-auto mr-auto text-md-left text-center">
                                Основатель антикризисной юридической компании «Рыков групп»
                            </p>
                            <p class="publications-detail-author__spec">
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
</div>