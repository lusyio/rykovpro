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
function getRecommended($publicationId)
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
        <div class="publications-detail-picture" data-img="<?= $recommendedPicture; ?>">
            <span>
                <p>Также рекомендую прочитать эту статью</p>
            </span>
            <h1><?= $recommendedResult["NAME"]; ?></h1>
            <span>
                <p>
                <?= $recommendedResult["PREVIEW_TEXT"]; ?>
                </p>
                <p>
                <a class="btn btn-primary btn-radius"
                   href="<?= $recommendedResult["DETAIL_PAGE_URL"]; ?>">Продолжить чтение</a>
                </p>
            </span>
        </div>
        <?
        return ob_get_clean();
    }
    return '';
}

// БЛОК ОБРАБОТКИ ШОРТКОДОВ
$codes = [];
$codesCount = preg_match_all('~\[recommend id=([0-9]{1,9})\]~iU', $arResult["DETAIL_TEXT"], $codes);
if ($codesCount > 0) {
    foreach ($codes[1] as $key => $value){
        $html = getRecommended($value);
        $arResult["DETAIL_TEXT"] = preg_replace('~\[recommend id='. $value .'\]~iU', $html, $arResult["DETAIL_TEXT"]);
    }
}
// КОНЕЦ БЛОКА ОБРАБОТКИ ШОРТКОДОВ



// БЛОК ГЕНЕРАЦИИ ОГЛАВЛЕНИЯ - html-код оглавления в переменной $listOfContentHtml
$listOfContentHtml = '';
// В массив hTitles помещаем массив с содержимым тегов h2 и h3 и массив со значениями 2 и 3, содержащихся в тексте статьи
$hTitles = [];
$matchesCount = preg_match_all('~<h([2-3]{1})>(.+)</h~iU', $arResult["DETAIL_TEXT"], $hTitles);
// Создаем оглавение, если найден хоть один тег h2 или h3
if ($matchesCount > 0) {
    $ids = [];
    $i = 1; // Добавляем к каждому тегу h2 и h3 id="content{i}" а в массив ids записываем эти id
    $arResult["DETAIL_TEXT"] = preg_replace_callback('~<h([2-3]{1})~i', function ($hValue) use(&$i, &$ids) {
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
    }
    $listOfContentHtml .= '</ul>';
}

// КОНЕЦ БЛОКА ГЕНЕРАЦИИ ОГЛАВЛЕНИЯ

//БЛОК ПОЛУЧЕНИЯ БАННЕРА ДЛЯ ВСТАВКИ - html-код баннера в переменной $banner
$banner = '';
if (isset($arResult['PROPERTIES']['PUBLICATIONS_BANNER'])) {
    $banners = require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/templates/.default/components/bitrix/banner/banner.php';
    if (isset($banners[$arResult['PROPERTIES']['PUBLICATIONS_BANNER']['VALUE_XML_ID']])) {
        $banner = $banners[$arResult['PROPERTIES']['PUBLICATIONS_BANNER']['VALUE_XML_ID']]['html'];
    }
}
//КОНЕЦ БЛОКа ПОЛУЧЕНИЯ БАННЕРА ДЛЯ ВСТАВКИ

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
        <div class="col-12 col-lg-4 order-3 d-none d-lg-flex">
            <div class="publications-detail-sidebar">
                <?= $listOfContentHtml ?>
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
            </div>
        </div>
        <div class="col-12 col-md-12 pr-0 order-1 col-lg-7">
            <div class="publications-detail-text">
                <?= $arResult["DETAIL_TEXT"]; ?>
<!--                <div class="publications-detail-advice">-->
<!--                    <div class="row">-->
<!--                        <div class="col-3">-->
<!--                            <img class="advice-img"-->
<!--                                 src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/rykov.jpg"-->
<!--                                 alt="rykov">-->
<!--                        </div>-->
<!--                        <div class="col">-->
<!--                            <div class="publications-detail-advice-body">-->
<!--                                <h3>Как не попасть на субсидиарку?</h3>-->
<!--                                <p>Авторские советы от Ивана Рыкова раз в месяц в нашей рассылке для-->
<!--                                    предпринимателей.</p>-->
<!--                                <div class="input-group">-->
<!--                                    <input type="text" class="form-control advice-input" placeholder="Введите ваш email"-->
<!--                                           aria-label="Введите ваш email" aria-describedby="adviceBtn">-->
<!--                                    <div class="input-group-append">-->
<!--                                        <button class="btn btn-outline" type="button" id="adviceBtn">Подписаться-->
<!--                                        </button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
    <?= $banner ?>
    <? if ($arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_DOCS"]): ?>
    <div class="publications-detail-docs">
        <h4>Документы публикации</h4>
        <div class="row">
            <? foreach ($arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_DOCS"]["VALUE"] as $key => $value): ?>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="publications-detail-docs-item">
                        <? if (is_array($arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_DOCS"]["FILE_VALUE"][0])): ?>
                            <? $file_name = $arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_DOCS"]["FILE_VALUE"][$key]["ORIGINAL_NAME"]; ?>
                        <? else: ?>
                            <? $file_name = $arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_DOCS"]["FILE_VALUE"]["ORIGINAL_NAME"]; ?>
                        <? endif; ?>
                        <a href="<?= CFile::GetPath($value); ?>" target="_blank"><?= $file_name; ?></a>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
        <? endif; ?>
        <div class="publications-detail-social">
            <h4>поделиться в социальных сетях:</h4>
            <div class="row">
                <div class="col-3 col-sm-3 col-md-2 col-lg-2">
                    <div class="publications-detail-social-item">
                        <a href="http://vk.com/share.php?url=https://rykov.pro<?= $arResult['DETAIL_PAGE_URL']; ?>&title=<?= $arResult['NAME']; ?>&image=https://rykov.pro<?= $arResult['PREVIEW_PICTURE']['SRC']; ?>&noparse=true"
                           target="_blank"><i class="icon-vkontakte"></i></a>
                    </div>
                </div>
                <div class="col-3 col-sm-3 col-md-2 col-lg-2">
                    <div class="publications-detail-social-item">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://rykov.pro<?= $arResult['DETAIL_PAGE_URL']; ?>&p=https://rykov.pro<?= $arResult['PREVIEW_PICTURE']['SRC']; ?>"
                           target="_blank"><i class="icon-facebook"></i></a>
                    </div>
                </div>
                <div class="col-3 col-sm-3 col-md-2 col-lg-2">
                </div>
                <div class="col-3 col-sm-3 col-md-2 col-lg-2">
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="publications-detail-social-subscribe">
                        <a href="https://vk.com/rykovivan" target="_blank">Подписаться на VK</a>
                        <a href="https://www.facebook.com/rykovpro" target="_blank">Подписаться на FB</a>
                    </div>
                </div>
            </div>
        </div>
    </div>