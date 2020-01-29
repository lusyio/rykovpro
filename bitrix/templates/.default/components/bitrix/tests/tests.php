<?php
$tests = [];
ob_start();
?>
    <div class="publications-detail-quiz test1">
        <p class="publications-detail-quiz__title">
            Определите вероятность взыскания дебиторской задолженности с вашего должника
        </p>
        <hr class="publications-detail-quiz__hr">
        <p class="publications-detail-quiz__desc">
            Ответив на <strong>11 вопросов</strong>, вы получите <strong>экспертную оценку права требования и
                вероятности его взыскания</strong>, а также
            рекомендации по дальнейшим действиям от экспертов по взысканию. После этого, сможете определить, насколько
            оперативно необходимо решать проблему, ведь промедление - это потеря ваших денег.
        </p>
        <hr class="publications-detail-quiz__hr">
        <div class="publications-detail-quiz__container">
            <div class="publications-detail-quiz__question-container">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№1</span> Как давно у контрагента возникла
                    задолженность перед Вами?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers44">
                        <input type="radio" id="answers44" name="answers" value="6">
                        <span>От 1-го до 3-х месяцев</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers45">
                        <input type="radio" id="answers45" name="answers" value="3">
                        <span>От 3-х до 6-ти месяцев</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers46">
                        <input type="radio" id="answers46" name="answers" value="2">
                        <span>От 6-ти месяцев до 1-го года</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers47">
                        <input type="radio" id="answers47" name="answers" value="1">
                        <span>От 1-го года до 3-х лет</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers48">
                        <input type="radio" id="answers48" name="answers" value="0">
                        <span>Задолженность старше 3-х лет</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№2</span> Подтверждается ли имеющаяся
                    задолженность документально (договора, акты и т.п.)?

                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers40">
                        <input type="radio" id="answers40" name="answers" value="6">
                        <span>Да, подтверждается, все документы в соответствующем виде
                                        имеются</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers41">
                        <input type="radio" id="answers41" name="answers" value="2">
                        <span>Нет, подтверждающих документов нет, задолженность возникла на
                                        основании неформальных договоренностей. Должник признает задолженность и готов её
                                        формализовать</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers42">
                        <input type="radio" id="answers42" name="answers" value="0">
                        <span>Нет, подтверждающих документов нет, задолженность возникла на
                                        основании неформальных договоренностей. Должник не признает задолженность</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers43">
                        <input type="radio" id="answers43" name="answers" value="3">
                        <span>Да, имеется только договор между сторонами, формально
                                        задолженность
                                        контрагентом не признана</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№3</span> Обращались ли вы к Должнику с
                    требованием о погашении задолженности?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers37">
                        <input type="radio" id="answers37" name="answers" value="4">
                        <span>Да, контрагент обещает оплатить, но так и не платит</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers38">
                        <input type="radio" id="answers38" name="answers" value="2">
                        <span>Да, но контрагент отрицает наличие задолженности или не реагирует
                                        на обращения</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers39">
                        <input type="radio" id="answers39" name="answers" value="0">
                        <span>Нет</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№4</span> Направляли ли Вы официальную
                    письменную претензию в адрес Должника?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers1">
                        <input type="radio" id="answers1" name="answers" value="8">
                        <span>Да, официальная претензия направлена заказным письмом,
                                        подтверждающие документы в наличии</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers2">
                        <input type="radio" id="answers2" name="answers" value="4">
                        <span>Да, но подтверждение отправления утрачено</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers3">
                        <input type="radio" id="answers3" name="answers" value="1">
                        <span>Нет, не отправляли</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№5</span> Предоставлялось ли Должником
                    обеспечение исполнения обязательств?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers4">
                        <input type="radio" id="answers4" name="answers" value="2">
                        <span>Нет, не предоставлялось</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers5">
                        <input type="radio" id="answers5" name="answers" value="4">
                        <span>Предоставлялось поручительство</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers6">
                        <input type="radio" id="answers6" name="answers" value="9">
                        <span>Залог имущества</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers7">
                        <input type="radio" id="answers7" name="answers" value="8">
                        <span>Независимая гарантия</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers8">
                        <input type="radio" id="answers8" name="answers" value="6">
                        <span>Иная форма обеспечения</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№6</span> Обращались ли Вы в суд с исковым
                    заявлением к Должнику?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers9">
                        <input type="radio" id="answers9" name="answers" value="7">
                        <span>Да, обращались, вынесено решение суда в нашу пользу</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers10">
                        <input type="radio" id="answers10" name="answers" value="6">
                        <span>Да, исковое заявление на рассмотрении</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers11">
                        <input type="radio" id="answers11" name="answers" value="4">
                        <span>Нет, но исковое заявление будет подано в ближайшее время</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers12">
                        <input type="radio" id="answers12" name="answers" value="2">
                        <span>Нет, исковое заявление не готово, планируем проконсультироваться
                                        со специалистами</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№7</span> Процедуру взыскания задолженности
                    с контрагента с Вашей стороны ведут:
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers13">
                        <input type="radio" id="answers13" name="answers" value="4">
                        <span>Юристы компании</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers14">
                        <input type="radio" id="answers14" name="answers" value="5">
                        <span>Привлеченные юристы</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers15">
                        <input type="radio" id="answers15" name="answers" value="7">
                        <span>Привлеченные юристы во взаимодействии с юристами компании</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers16">
                        <input type="radio" id="answers16" name="answers" value="3">
                        <span>Мы проводим процедуру своими силами без привлечения сторонних
                                        специалистов</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№8</span> Возбуждалось ли исполнительное
                    производство в отношении контрагента по Вашему требованию?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers17">
                        <input type="radio" id="answers17" name="answers" value="3">
                        <span>Да, но выявить имущество не удалось</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers18">
                        <input type="radio" id="answers18" name="answers" value="5">
                        <span>Да, но процедура идёт медленно</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers19">
                        <input type="radio" id="answers19" name="answers" value="7">
                        <span>Да, но Должник активно противодействует процедуре, в связи с чем
                                        производство не результативно</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers20">
                        <input type="radio" id="answers20" name="answers" value="6">
                        <span>Да, но ввиду отсутствия опыта взаимодействия с судебными
                                        приставами, исполнительное производство не привело к результатам</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers21">
                        <input type="radio" id="answers21" name="answers" value="1">
                        <span>Нет, не возбуждалось</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№9</span> Возбуждено ли в отношении Вашего
                    Должника дело о банкротстве?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers22">
                        <input type="radio" id="answers22" name="answers" value="3">
                        <span>Да, наши требования включены в реестр требований кредиторов, но
                                        арбитражный управляющий и Должник противодействуют -взысканию</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers23">
                        <input type="radio" id="answers23" name="answers" value="2">
                        <span>Да, но у Должника отсутствуют активы, за счет которых может быть
                                        погашена задолженность</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers24">
                        <input type="radio" id="answers24" name="answers" value="1">
                        <span>Да, но процедура ещё не введена</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers25">
                        <input type="radio" id="answers25" name="answers" value="4">
                        <span>Нет, но мы планируем обратиться с соответствующим
                                        заявлением</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers26">
                        <input type="radio" id="answers26" name="answers" value="5">
                        <span>Нет, не возбуждено</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers27">
                        <input type="radio" id="answers27" name="answers" value="7">
                        <span>Да, производство возбуждено по нашему заявлению</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№10</span> Ведет ли Должник деятельность на
                    текущий момент, в том числе через аффилированные компании?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers29">
                        <input type="radio" id="answers29" name="answers" value="8">
                        <span>Да, деятельность ведется в обычном режиме</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers30">
                        <input type="radio" id="answers30" name="answers" value="6">
                        <span>Да, но деятельность прекращается</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers31">
                        <input type="radio" id="answers31" name="answers" value="4">
                        <span>Нет, деятельность прекращена</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers32">
                        <input type="radio" id="answers32" name="answers" value="2">
                        <span>Мы не обладаем данной информацией</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№11</span> Вам известны контролирующие лица
                    Должника, конечные собственники бизнеса, а также имущественное состояние этих лиц?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers33">
                        <input type="radio" id="answers33" name="answers" value="7">
                        <span>Да, известны. Они обладают значительным имуществом</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers34">
                        <input type="radio" id="answers34" name="answers" value="3">
                        <span>Да, известны, но они не обладают каким-либо имуществом</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers35">
                        <input type="radio" id="answers35" name="answers" value="4">
                        <span>Да, известны, но они напрямую не владеют своим имуществом</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers36">
                        <input type="radio" id="answers36" name="answers" value="0">
                        <span>Нет, неизвестны</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none end">
                <p class="publications-detail-quiz__question end">

                </p>
                <p class="publications-detail-quiz__question">
                    Оставьте свой email, чтобы <strong>получить видео "32 стратегии взыскания задолженности"</strong> и подробный план,
                    как вести себя с должником, чтобы вернуть свои деньги.
                </p>
                <img class="publications-detail-quiz__youtube" src="/bitrix/templates/.default/components/bitrix/news/publications/bitrix/news.detail/.default/img/youtube-img.webp" alt="">
                <form method="POST"
                      onsubmit="ym(65833081, 'reachGoal', 'subscribe1'); return true;"
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
<?
$tests['test1'] = ob_get_clean();
ob_start();
?>
    <div class="publications-detail-quiz test2">
        <p class="publications-detail-quiz__title">
            Грозит ли вам субсидиарная ответственность?
        </p>
        <hr class="publications-detail-quiz__hr">
        <p class="publications-detail-quiz__desc">
            Пройдите тест из <strong>10 вопросов</strong>, чтобы узнать о своей ситуации. По итогам теста вы узнаете в
            какой <strong>группе риска</strong>
            вы находитесь (критическая, высокая, невысокая), и в соответствии с ней получите рекомендации по мерам
            защиты от субсидиарной ответственности.
        </p>
        <hr class="publications-detail-quiz__hr">
        <div class="publications-detail-quiz__container">
            <div class="publications-detail-quiz__question-container">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№1</span> Были ли случаи, когда Вы как
                    руководитель или учредитель от имени компании продавали ее имущество себе или своим родственникам?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers44">
                        <input type="radio" id="answers44" name="answers" value="10">
                        <span>Да, были</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers45">
                        <input type="radio" id="answers45" name="answers" value="5">
                        <span>Не помню, возможно да</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers46">
                        <input type="radio" id="answers46" name="answers" value="0">
                        <span>Нет, в пределах последних трех лет не было</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№2</span> Ваша компания за последние три года
                    продавала свое имущество: недвижимость, транспортные средства, оборудование? Как вы определяли цену
                    продажи? Почему решили продать имущество?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers40">
                        <input type="radio" id="answers40" name="answers" value="10">
                        <span>Продавали имущество, так как не хватало денег, чтобы рассчитаться по долгам. Продавали по заниженной цене, чтобы быстрее продать</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers41">
                        <input type="radio" id="answers41" name="answers" value="5">
                        <span>Продавали старое имущество, чтобы купить новое. Цену продажи определяли как рыночную, ориентировались по ценам на схожее имущество у других продавцов</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers42">
                        <input type="radio" id="answers42" name="answers" value="0">
                        <span>Не продавала</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№3</span> В вашей организации практикуется
                    проверка контрагентов на добросовестность: вы запрашиваете их учредительные документы, проверяете
                    информацию на сайте ФНС России, Службы судебных приставов, в картотеке дел арбитражных судов?
                    Встречаетесь ли Вы (или Ваши сотрудники) лично с руководителями (сотрудниками) контрагентов при
                    заключении договоров или обмен документами происходит по почте?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers37">
                        <input type="radio" id="answers37" name="answers" value="0">
                        <span>Да, всегда</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers38">
                        <input type="radio" id="answers38" name="answers" value="3">
                        <span>Не всех контрагентов проверяем, но большинство - да</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers39">
                        <input type="radio" id="answers39" name="answers" value="7">
                        <span>Проверяем редко</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers390">
                        <input type="radio" id="answers390" name="answers" value="10">
                        <span>Никогда не проверяем</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№4</span> Известно введено ли в отношении Вашей
                    компании конкурсное производство или наблюдение?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers1">
                        <input type="radio" id="answers1" name="answers" value="10">
                        <span>Да</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers2">
                        <input type="radio" id="answers2" name="answers" value="0">
                        <span>Нет</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№5</span> На данный момент у вашей фирмы есть
                    просроченная задолженность? Какой период просрочки?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers4">
                        <input type="radio" id="answers4" name="answers" value="0">
                        <span>У нас нет просроченной задолженности</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers5">
                        <input type="radio" id="answers5" name="answers" value="3">
                        <span>Есть задолженность. Срок не больше 1 месяца</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers6">
                        <input type="radio" id="answers6" name="answers" value="5">
                        <span>Есть задолженность сроком до 90 дней</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers7">
                        <input type="radio" id="answers7" name="answers" value="7">
                        <span>Есть задолженность сроком от 90 дней до года</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers8">
                        <input type="radio" id="answers8" name="answers" value="10">
                        <span>Есть задолженность сроком больше 1 года</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№6</span> Подавали ли за последние три года
                    контрагенты против Вашей компании иски о взыскании задолженности?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers9">
                        <input type="radio" id="answers9" name="answers" value="0">
                        <span>Нет, не подавали</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers10">
                        <input type="radio" id="answers10" name="answers" value="5">
                        <span>Подавали несколько раз</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers11">
                        <input type="radio" id="answers11" name="answers" value="10">
                        <span>Постоянно подают</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№7</span> Бывают ли в Вашей бухгалтерской и
                    налоговой отчетности ошибки? Получали ли Вы от налоговых органов сообщения об ошибках?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers13">
                        <input type="radio" id="answers13" name="answers" value="5">
                        <span>Нет, за последние три года ошибок серьезных ошибок не было. Сообщений из налоговой не получали</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers14">
                        <input type="radio" id="answers14" name="answers" value="5">
                        <span>Иногда бывают ошибки, но мы сразу их исправляем</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers15">
                        <input type="radio" id="answers15" name="answers" value="10">
                        <span>В этот вопрос я не вникаю, этим занимается бухгалтер</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№8</span> Были ли случаи утраты документы
                    бухгалтерского учета
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers17">
                        <input type="radio" id="answers17" name="answers" value="10">
                        <span>Да, документы не восстановили до сих пор</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers18">
                        <input type="radio" id="answers18" name="answers" value="5">
                        <span>Были, но восстановили</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers19">
                        <input type="radio" id="answers19" name="answers" value="0">
                        <span>Нет</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№9</span> Имеются ли у организации или у Вас
                    как директора штрафы, задолженность, которые были начислены налоговой службой и другими госорганами,
                    а также судом за нарушение налогового, административного или уголовного законодательства?
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers22">
                        <input type="radio" id="answers22" name="answers" value="0">
                        <span>Нет</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers23">
                        <input type="radio" id="answers23" name="answers" value="5">
                        <span>Да, есть небольшие штрафы и начисления, до 1 млн. руб.</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers24">
                        <input type="radio" id="answers24" name="answers" value="10">
                        <span>Да, есть значительные начисления и штрафы, больше 1 млн. руб.</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none">
                <p id="quizQuestion" class="publications-detail-quiz__question"><span
                            class="publications-detail-quiz__number">№10</span> Вносили ли Вы в Единый федеральный
                    реестр сведений о фактах деятельности юрлиц (ЕФРСФДЮЛ) сведения о том, что: - в отношении Вашей
                    компании введена процедура наблюдения? <br>
                    - была смена адреса <br>
                    - имущество в залоге <br>
                    - смена учредителя директора <br>
                    И т.д.
                </p>
                <div class="publications-detail-quiz__answer-container">
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers29">
                        <input type="radio" id="answers29" name="answers" value="0">
                        <span>Сведения вносим всегда, либо оснований не было</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers30">
                        <input type="radio" id="answers30" name="answers" value="5">
                        <span>Не помню / не знаю, кто то должен вносить, но не знаю вносил или нет</span>
                    </label>
                    <label class="publications-detail-quiz__answer pure-material-radio" for="answers31">
                        <input type="radio" id="answers31" name="answers" value="10">
                        <span>Не вносили</span>
                    </label>
                </div>
            </div>

            <div class="publications-detail-quiz__question-container d-none end">
                <p class="publications-detail-quiz__question end">

                </p>
                <form method="POST"
                      onsubmit="ym(65833099, 'reachGoal', 'subscribe2'); return true;"
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
                        <input type="hidden" name="default_list_id" value="19751373">
                        <input type="hidden" name="overwrite" value="2">
                        <input type="hidden" name="is_v5" value="1">
                    </div>
                </form>
            </div>
        </div>
        <button disabled id="nextQuestion" class="publications-detail-quiz__btn">Следующий вопрос</button>
    </div>
<?
$tests['test2'] = ob_get_clean();
ob_start();
?>
    <button type="button" class="btn btn-primary show-modal-btn" data-toggle="modal" data-target=".adviceModal">ПОКАЗАТЬ
        МОДАЛКУ)
    </button>
<?
$tests['test3'] = ob_get_clean();

return $tests;