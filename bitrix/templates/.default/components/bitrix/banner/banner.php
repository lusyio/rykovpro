<?php
$banners = [];
ob_start();
?>
<?
$banners['default'] = ob_get_clean();
ob_start();
?>
    <div class="sidebar-advice">
        <div class="sidebar-advice__body">
            <div class="rykov-sidebar"></div>
            <p class="h3">Юридические советы по работе с контрагентами</p>
            <p>
                Как работать с дебиторкой, вести переговоры, образцы документов, кейсы из практки и многое другое в
                еженедельной авторской рассылке от Ивана Рыкова
            </p>
            <form
                    onsubmit="ym(67390351, 'reachGoal', 'emailSidebarDebt'); return true;"
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
    </div>
<?
$banners['service-ad'] = ob_get_clean();
ob_start()
?>
    <div class="subscribe-form">
        <div class="subscribe-form-body">
            <p class="h3"> Как не попасть под субсидиарку</p>
            <p>Как правильно вести бизнес, чтобы не попасть под субсидиарную ответственность. Еженедельная авторская
                рассылка от Ивана Рыкова</p>
            <form
                    onsubmit="ym(67390351, 'reachGoal', 'emailSidebarSubsid'); return true;"
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
    </div>
<?
$banners['advice'] = ob_get_clean();

return $banners;