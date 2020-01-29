<?php
$banners = [];
ob_start();
?>
<?
$banners['default'] = ob_get_clean();
ob_start();
?>
    <div class="subscribe-form">
        <img src="/images/lm_default.png" alt=""/>
        <span>Еженедельный онлайн-журнал, подпишись, чтобы не пропустить полезные
        материалы</span>
        <form
                onsubmit="ym(65833081, 'reachGoal', 'subscribe1'); return true;"
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
<?
$banners['service-ad'] = ob_get_clean();
ob_start()
?>
    <div class="text-center mt-3 mb-3"><a class="btn btn-outline-secondary">Баннер Перейти к тесту</a></div>
<?
$banners['go-to-test'] = ob_get_clean();

return $banners;