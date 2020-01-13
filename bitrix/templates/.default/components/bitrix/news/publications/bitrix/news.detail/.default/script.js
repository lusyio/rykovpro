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

    var $page = $('html, body');
    $('.publications-detail-sidebar a[href*="#"]').click(function () {
        $page.animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 400);
        return false;
    });

    $(document).ready(function () {
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
                let text;
                let title;
                let defId;
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