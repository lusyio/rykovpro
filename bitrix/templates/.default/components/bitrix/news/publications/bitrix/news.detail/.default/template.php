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
        <div class="publications-detail-picture">
            <img src="<?= $recommendedPicture; ?>" alt="">
            <div class="publications-detail-picture-body">
                <p>Также рекомендую прочитать эту статью</p>
                <h1><?= $recommendedResult["NAME"]; ?></h1>
                <p>
                    <?= $recommendedResult["PREVIEW_TEXT"]; ?>
                </p>
                <a class="btn btn-primary btn-radius"
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
            <div class="col-3">
                <img class="advice-img"
                     src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/rykov.jpg"
                     alt="rykov">
            </div>
            <div class="col">
                <div class="publications-detail-advice-body">
                    <h3>Как не попасть на субсидиарку?</h3>
                    <p>Авторские советы от Ивана Рыкова раз в месяц в нашей рассылке для
                        предпринимателей.</p>
                    <form method="POST"
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
                            <input type="hidden" name="default_list_id" value="19581681">
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
        $html = getRecommended($value);
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
        <div class="col-12 col-lg-4 order-3 d-lg-flex">
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
            </div>
        </div>
        <div class="col-12 col-md-12 pr-unset pr-lg-0 order-1 col-lg-7">
            <div class="publications-detail-text">
                <?= $arResult["DETAIL_TEXT"]; ?>
            </div>

            <div class="publications-detail-quiz">
                <p class="publications-detail-quiz__title">
                    Грозит ли вам субсидиарная ответственность?
                </p>
                <hr class="publications-detail-quiz__hr">
                <p class="publications-detail-quiz__desc">
                    Пройдите тест из 11 вопросов, чтобы узнать о своей ситуации. По итогам теста вы <strong>узнаете в
                        какой
                        группе риска вы находитесь</strong> (критическая, высокая, невысокая), и в соответствии с ней
                    <strong>получите
                        рекомендации по мерам защиты</strong> от субсидиарной ответственности
                </p>
                <hr class="publications-detail-quiz__hr">
                <div class="publications-detail-quiz__container">
                    <div class="publications-detail-quiz__question-container">
                        <p id="quizQuestion" class="publications-detail-quiz__question"><span
                                    class="publications-detail-quiz__number">№1</span> Как давно у контрагента возникла
                            задолженность перед Вами?
                        </p>
                        <div class="publications-detail-quiz__answer-container">
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers44" name="answers" value="6">
                                <label for="answers44">От 1-го до 3-х месяцев</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers45" name="answers" value="3">
                                <label for="answers45">От 3-х до 6-ти месяцев</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers46" name="answers" value="2">
                                <label for="answers46">От 6-ти месяцев до 1-го года</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers47" name="answers" value="1">
                                <label for="answers47">От 1-го года до 3-х лет</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers48" name="answers" value="0">
                                <label for="answers48">Задолженность старше 3-х лет</label>
                            </div>
                        </div>
                    </div>

                    <div class="publications-detail-quiz__question-container d-none">
                        <p id="quizQuestion" class="publications-detail-quiz__question"><span
                                    class="publications-detail-quiz__number">№2</span> Подтверждается ли имеющаяся
                            задолженность документально (договора, акты и т.п.)?

                        </p>
                        <div class="publications-detail-quiz__answer-container">
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers40" name="answers" value="6">
                                <label for="answers40">Да, подтверждается, все документы в соответствующем виде
                                    имеются</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers41" name="answers" value="2">
                                <label for="answers41">Нет, подтверждающих документов нет, задолженность возникла на
                                    основании неформальных договоренностей. Должник признает задолженность и готов её
                                    формализовать</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers42" name="answers" value="0">
                                <label for="answers42">Нет, подтверждающих документов нет, задолженность возникла на
                                    основании неформальных договоренностей. Должник не признает задолженность</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers43" name="answers" value="3">
                                <label for="answers43">Да, имеется только договор между сторонами, формально задолженность
                                    контрагентом не признана</label>
                            </div>
                        </div>
                    </div>

                    <div class="publications-detail-quiz__question-container d-none">
                        <p id="quizQuestion" class="publications-detail-quiz__question"><span
                                class="publications-detail-quiz__number">№3</span> Обращались ли вы к Должнику с требованием о погашении задолженности?
                        </p>
                        <div class="publications-detail-quiz__answer-container">
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers37" name="answers" value="4">
                                <label for="answers37">Да, контрагент обещает оплатить, но так и не платит</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers38" name="answers" value="2">
                                <label for="answers38">Да, но контрагент отрицает наличие задолженности или не реагирует на обращения</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers39" name="answers" value="0">
                                <label for="answers39">Нет</label>
                            </div>
                        </div>
                    </div>

                    <div class="publications-detail-quiz__question-container d-none">
                        <p id="quizQuestion" class="publications-detail-quiz__question"><span
                                class="publications-detail-quiz__number">№4</span> Направляли ли Вы официальную письменную претензию в адрес Должника?
                        </p>
                        <div class="publications-detail-quiz__answer-container">
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers1" name="answers" value="8">
                                <label for="answers1">Да, официальная претензия направлена заказным письмом, подтверждающие документы в наличии</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers2" name="answers" value="4">
                                <label for="answers2">Да, но подтверждение отправления утрачено</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers3" name="answers" value="1">
                                <label for="answers3">Нет, не отправляли</label>
                            </div>
                        </div>
                    </div>

                    <div class="publications-detail-quiz__question-container d-none">
                        <p id="quizQuestion" class="publications-detail-quiz__question"><span
                                class="publications-detail-quiz__number">№5</span> Предоставлялось ли Должником обеспечение исполнения обязательств?
                        </p>
                        <div class="publications-detail-quiz__answer-container">
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers4" name="answers" value="2">
                                <label for="answers4">Нет, не предоставлялось</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers5" name="answers" value="4">
                                <label for="answers5">Предоставлялось поручительство</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers6" name="answers" value="9">
                                <label for="answers6">Залог имущества</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers7" name="answers" value="8">
                                <label for="answers7">Независимая гарантия</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers8" name="answers" value="6">
                                <label for="answers8">Иная форма обеспечения</label>
                            </div>
                        </div>
                    </div>

                    <div class="publications-detail-quiz__question-container d-none">
                        <p id="quizQuestion" class="publications-detail-quiz__question"><span
                                class="publications-detail-quiz__number">№6</span> Обращались ли Вы в суд с исковым заявлением к Должнику?
                        </p>
                        <div class="publications-detail-quiz__answer-container">
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers9" name="answers" value="7">
                                <label for="answers9">Да, обращались, вынесено решение суда в нашу пользу</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers10" name="answers" value="6">
                                <label for="answers10">Да, исковое заявление на рассмотрении</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers11" name="answers" value="4">
                                <label for="answers11">Нет, но исковое заявление будет подано в ближайшее время</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers12" name="answers" value="2">
                                <label for="answers12">Нет, исковое заявление не готово, планируем проконсультироваться со специалистами</label>
                            </div>
                        </div>
                    </div>

                    <div class="publications-detail-quiz__question-container d-none">
                        <p id="quizQuestion" class="publications-detail-quiz__question"><span
                                class="publications-detail-quiz__number">№7</span> Процедуру взыскания задолженности с контрагента с Вашей стороны ведут:
                        </p>
                        <div class="publications-detail-quiz__answer-container">
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers13" name="answers" value="4">
                                <label for="answers13">Юристы компании</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers14" name="answers" value="5">
                                <label for="answers14">Привлеченные юристы</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers15" name="answers" value="7">
                                <label for="answers15">Привлеченные юристы во взаимодействии с юристами компании</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers16" name="answers" value="3">
                                <label for="answers16">Мы проводим процедуру своими силами без привлечения сторонних специалистов</label>
                            </div>
                        </div>
                    </div>

                    <div class="publications-detail-quiz__question-container d-none">
                        <p id="quizQuestion" class="publications-detail-quiz__question"><span
                                class="publications-detail-quiz__number">№8</span> Возбуждалось ли исполнительное производство в отношении контрагента по Вашему требованию?
                        </p>
                        <div class="publications-detail-quiz__answer-container">
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers17" name="answers" value="3">
                                <label for="answers17">Да, но выявить имущество не удалось</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers18" name="answers" value="5">
                                <label for="answers18">Да, но процедура идёт медленно</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers19" name="answers" value="7">
                                <label for="answers19">Да, но Должник активно противодействует процедуре, в связи с чем производство не результативно</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers20" name="answers" value="6">
                                <label for="answers20">Да, но ввиду отсутствия опыта взаимодействия с судебными приставами, исполнительное производство не привело к результатам</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers21" name="answers" value="1">
                                <label for="answers21">Нет, не возбуждалось</label>
                            </div>
                        </div>
                    </div>

                    <div class="publications-detail-quiz__question-container d-none">
                        <p id="quizQuestion" class="publications-detail-quiz__question"><span
                                class="publications-detail-quiz__number">№9</span> Возбуждено ли в отношении Вашего Должника дело о банкротстве?
                        </p>
                        <div class="publications-detail-quiz__answer-container">
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers22" name="answers" value="3">
                                <label for="answers22">Да, наши требования включены в реестр требований кредиторов, но арбитражный управляющий и Должник противодействуют -взысканию</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers23" name="answers" value="2">
                                <label for="answers23">Да, но у Должника отсутствуют активы, за счет которых может быть погашена задолженность</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers24" name="answers" value="1">
                                <label for="answers24">Да, но процедура ещё не введена</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers25" name="answers" value="4">
                                <label for="answers25">Нет, но мы планируем обратиться с соответствующим заявлением</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers26" name="answers" value="5">
                                <label for="answers26">Нет, не возбуждено</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers27" name="answers" value="7">
                                <label for="answers27">Да, производство возбуждено по нашему заявлению</label>
                            </div>
                        </div>
                    </div>

                    <div class="publications-detail-quiz__question-container d-none">
                        <p id="quizQuestion" class="publications-detail-quiz__question"><span
                                class="publications-detail-quiz__number">№10</span> Ведет ли Должник деятельность на текущий момент, в том числе через аффилированные компании?
                        </p>
                        <div class="publications-detail-quiz__answer-container">
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers28" name="answers" value="8">
                                <label for="answers29">Да, деятельность ведется в обычном режиме</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers30" name="answers" value="6">
                                <label for="answers30">Да, но деятельность прекращается</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers31" name="answers" value="4">
                                <label for="answers31">Нет, деятельность прекращена</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers32" name="answers" value="2">
                                <label for="answers32">Мы не обладаем данной информацией</label>
                            </div>
                        </div>
                    </div>

                    <div class="publications-detail-quiz__question-container d-none">
                        <p id="quizQuestion" class="publications-detail-quiz__question"><span
                                class="publications-detail-quiz__number">№11</span> Вам известны контролирующие лица Должника, конечные собственники бизнеса, а также имущественное состояние этих лиц?
                        </p>
                        <div class="publications-detail-quiz__answer-container">
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers33" name="answers" value="7">
                                <label for="answers33">Да, известны. Они обладают значительным имуществом</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers34" name="answers" value="3">
                                <label for="answers34">Да, известны, но они не обладают каким-либо имуществом</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers35" name="answers" value="4">
                                <label for="answers35">Да, известны, но они напрямую не владеют своим имуществом</label>
                            </div>
                            <div class="publications-detail-quiz__answer">
                                <input type="radio" id="answers36" name="answers" value="0">
                                <label for="answers36">Нет, неизвестны</label>
                            </div>
                        </div>
                    </div>

                    <div class="publications-detail-quiz__question-container d-none end">
                        <p class="publications-detail-quiz__question end">

                        </p>
                        <button class="publications-detail-quiz__btn publications-detail-quiz__FB">Задать мне вопрос на
                            Facebook
                        </button>
                        <p class="publications-detail-quiz__or">или</p>
                        <form method="POST"
                              action="https://cp.unisender.com/ru/subscribe?hash=6jjxbafghy6pa5yqnzi9qcdi6yd4oaidhducaapy38enjnmfr9z3o"
                              name="subscribtion_form">
                            <div class="input-group ">
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
                                <input type="hidden" name="default_list_id" value="19581681">
                                <input type="hidden" name="overwrite" value="2">
                                <input type="hidden" name="is_v5" value="1">
                            </div>
                        </form>
                    </div>
                </div>
                <button disabled id="nextQuestion" class="publications-detail-quiz__btn">Следующий вопрос</button>
            </div>
        </div>
    </div>
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