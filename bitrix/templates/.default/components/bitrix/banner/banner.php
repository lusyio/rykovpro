<?php
$banners = [];
ob_start();
?>
    <div class="text-center mt-3 mb-3">...</div>
<?
$banners['default'] = ob_get_clean();
ob_start();
?>
<style>
    .subscribe-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 30px;
    }
      .subscribe-form img {
        margin-bottom: 20px;
      }
      .subscribe-form span {
        margin-bottom: 20px;
        font-size: 14px;
        font-weight: 500;
        display: block;
        text-align: center;
        max-width: 300px;
      }

      .subscribe-form-item--input-email {
        display: inline-block;
        width: auto!important;
      }

      .subscribe-form-item__control--input-email {
        color: #000000;
        border-radius: 35px;
        padding: 8px 26px;
        font-size: 13px;
        line-height: 19px;
        outline: none;
        border: none;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
      }

      .subscribe-form-item--btn-submit {
        display: inline-block;
      }

      .subscribe-form-item--btn-submit input {
        font-size: 14px;
        line-height: 19px;
        color: #ffffff;
        background: #d2232a;
        border-radius: 30px;
        border: none;
        padding: 8px 18px;
        position: relative;
        left: -20px;
        cursor: pointer;
        outline: none;
        transition: all 1s ease-out;
      }

      .subscribe-form-item--btn-submit:hover input {
        background: #e83f46;
      }
    </style>
    <div class="subscribe-form">
      <img src="/images/lm_default.png" alt="" />
      <span
        >Еженедельный онлайн-журнал, подпишись, чтобы не пропустить полезные
        материалы</span
      >
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
            value="Подписаться"
          />
        </div>
        <input type="hidden" name="charset" value="UTF-8" />
        <input type="hidden" name="default_list_id" value="19597957" />
        <input type="hidden" name="overwrite" value="2" />
        <input type="hidden" name="is_v5" value="1" />
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