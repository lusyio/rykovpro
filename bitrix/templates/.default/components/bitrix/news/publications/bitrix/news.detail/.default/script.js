/*---------------------------
	PUBLICATIONS DETAIL
---------------------------*/

$(function () {
    "use strict";
    $(".publications-detail-picture").each(function () {
        var img = $(this).attr("data-img");
        if (typeof img !== typeof undefined && img !== false) {
            $(this).css("background-image", "url(" + img + ")");
        }
    });

    $(window).scroll(function () {
        let headers = $("h1, h2, h3, h4, h5, h6");
        headers.each(function (i, el) {
            let top = $(el).offset().top - 25;
            let next = $(el).nextAll(el.tagName);
            if (next.length !== 0) {
                next = next.offset().top
            } else {
                next = document.documentElement.scrollHeight
            }
            let scroll = $(window).scrollTop();
            let id = $(el).attr('id');
            if (scroll > top && scroll < next) {
                $('.publications-detail-sidebar a.active').removeClass('active');
                $('a[href="#' + id + '"]').addClass('active');
            }
        });

        if (document.documentElement.clientWidth >= 991) {
            let stopEl = $('.publications-detail-text').height() - $('.page-header-wrap').height() - $('.publications-detail-picture').height() - $('.publications-detail-tags').height();
            let scroll = $(window).scrollTop();
            if (scroll >= stopEl) {
                $('.sticky-menu').addClass('stop').css('top', (stopEl - document.documentElement.clientHeight - 25))
            } else {
                $('.sticky-menu').removeClass('stop').css('top', 0)
            }
        }
    });

    var $page = $('html, body');
    $('.publications-detail-sidebar a[href*="#"]').click(function () {
        $page.animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 400);
        return false;
    });

    $(document).ready(function () {

        $('#test1').on('click', () => {
            $('.publications-detail-quiz__body').removeClass('d-none');
            $('.publications-detail-quiz__start').addClass('d-none')
        })

        var totalScore = 0;
        $('.publications-detail-quiz__answer input').on('change', function () {
            $('#nextQuestion').removeAttr('disabled')
        });
        $('#nextQuestion').on('click', function (e) {
            $('.publications-detail-quiz__answer input').each(function () {
                if ($(this).is(':checked')) {
                    let tempScore = Number($(this).attr('value'));
                    totalScore = totalScore + tempScore;
                    console.log(totalScore)
                }
            });
            var next = $('.publications-detail-quiz__question-container:visible').next('.d-none');
            $('.publications-detail-quiz__question-container:visible').addClass('d-none');
            next.removeClass('d-none')
            if ($('.publications-detail-quiz__question-container.end').is(':visible')) {
                $('.publications-detail-quiz__hr').removeClass('d-none')
                let text;
                let title;
                let defId;
                if ($('.test1').is(':visible')) {
                    if (totalScore >= 55) {
                        defId = '19654737';
                        title = 'Предварительно установлена высокая вероятность взыскания задолженности';
                        text = 'Задолженность можно вернуть, но нужно действовать правильно. Для этого необходимо выстроить стратегию ведения переговоров, постепенно наращивая давление на должника. Я подготовил серию писем, в которой рассматриваются методы ведения переговоров, даются советы, а также образцы необходимых документов, чтобы ваши действия были максимально эффективными, а, главное, законными. Если же у вас есть какие-либо вопросы, или же вы не хотите терять время, то напишите мне в Facebook, чтобы я подсказал вам, что необходимо делать'
                    }
                    if (totalScore <= 54 && totalScore >= 35) {
                        defId = '19655949';
                        title = 'Установлена невысокая вероятность взыскания задолженности';
                        text = 'На самом деле, все еще в ваших руках. Невысокая вероятность означает лишь то, что должник вряд ли уже захочет самостоятельно вернуть долг без вашего прямого участия в этом процессе. Настал этап жестких переговоров, которые помогут вам вернуть деньги. Я подготовил серию писем, в которых рассматриваются методы ведения такого рода переговоров, а также советы, как провести все в законном русле. Если у вас есть вопросы, или вы не хотите терять время, то рекомендую написать о своей ситуации мне в facebook, чтобы я подсказал вам, что необходимо делать'
                    }
                    if (totalScore < 35) {
                        defId = '19737037';
                        title = 'Установлена критически низкая вероятность взыскания задолженности';
                        text = 'Шансов взыскать задолженность очень мало. К сожалению, возможность решить все мирным путем уже упущена и остается предпрининять решительные меры. Я подготовил для вас серию писем, в которой подробно расписаны все шаги по взысканию задолженности. Оставьте свой email я пришлю вам план, с чего начать. Однако, в данной ситуации я настоятельно рекомендую обратиться за помощью к специалистам. Вы можете написать мне в facebook, чтобы я смог дать вам подробную консультацию.\n'
                    }
                }
                if ($('.test2').is(':visible')) {
                    if (totalScore >= 71) {
                        defId = '19751373';
                        title = 'Критический риск привлечения к субсидиарной ответственности';
                        text = 'Для высокого и критического - Хм.. Согласно вашим ответам, у вас существует серьезный риск быть привлеченным к субсидиарной ответственности. Незамедлительно начните применять меры по построению стратегии защиты. Если вам необходима консультация, то можете описать свою проблему в нашей группе по субсидиарной ответственности или же мне в личные сообщения на Facebook. Так же я подготовил серию писем, в которой рассказываю о том, что необходимо предпринять, для того, чтобы выстроить правильную стратегию защиты и выйти из сложившийся ситуации с минимальными потерями.'
                    }
                    if (totalScore <= 70 && totalScore >= 50) {
                        defId = '19751373';
                        title = 'Высокий риск привлечения к субсидиарной ответственности';
                        text = 'Для высокого и критического - Хм.. Согласно вашим ответам, у вас существует серьезный риск быть привлеченным к субсидиарной ответственности. Незамедлительно начните применять меры по построению стратегии защиты. Если вам необходима консультация, то можете описать свою проблему в нашей группе по субсидиарной ответственности или же мне в личные сообщения на Facebook. Так же я подготовил серию писем, в которой рассказываю о том, что необходимо предпринять, для того, чтобы выстроить правильную стратегию защиты и выйти из сложившийся ситуации с минимальными потерями.'
                    }
                    if (totalScore <= 49 && totalScore >= 21) {
                        defId = '19751373';
                        title = 'Средний риск привлечения к субсидиарной ответственности';
                        text = 'Для среднего - У вас все не так и уж и плохо! Согласно вашим ответам, риск быть привлеченным к субсидиарной ответственности имеется, однако, ситуация далеко не катастрофическая . Лучше будет позаботиться заранее и принять меры по построению стратегии защиты, если ситуация ухудшится. Если вам необходима консультация, то можете описать свою проблему в нашей группе по субсидиарной ответственности или же мне в личные сообщения на Facebook. Так же я подготовил серию писем, в которой рассказываю о том, что необходимо предпринять, для того, чтобы выстроить правильную стратегию защиты и выйти из сложившийся ситуации с минимальными потерями.'
                    }
                    if (totalScore < 20) {
                        defId = '19751373';
                        title = 'Небольшой риск привлечения к субсидиарной ответственности';
                        text = 'Для низкого - Отлично! У вас минимальные риски. Согласно вашим ответам, субсидиарная ответственность вам практически не грозит. Почему практически? Всегда существуют вероятность, допустить ошибку, которая выльется в серьезные проблемы. Несмотря на то, что вы честно ведете свой бизнес, лучше знать о способах защиты от субсидиарной ответственности. Если вам необходима консультация, то можете описать свою проблему в нашей группе по субсидиарной ответственности или же мне в личные сообщения на Facebook. Так же я подготовил серию писем, в которой рассказываю о том, что необходимо предпринять, для того, чтобы не допустить угрозы привлечения к субсидиарной ответственности.'
                    }
                }
                $('.publications-detail-quiz__question.end').html(text);
                $('#nextQuestion').addClass('d-none');
                $('.publications-detail-quiz__title').html(title);
                $('input[name="default_list_id"]').val(defId);
                $('.publications-detail-quiz__desc').addClass('d-none');
                $('.publications-detail-quiz__desc').next('hr').addClass('d-none')
            }
            $('.publications-detail-quiz__answer input:checked').prop('checked', false);
            $('#nextQuestion').prop('disabled', true)
        })
    })
});