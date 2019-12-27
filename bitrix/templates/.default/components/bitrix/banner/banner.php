<?php
$banners = [];
ob_start();
?>
    <div class="text-center mt-3 mb-3">По умолчанию</div>
<?
$banners['default'] = ob_get_clean();
ob_start();
?>
    <div class="text-center mt-3 mb-3"><a class="btn btn-outline-primary">БАННЕР РЕКЛАМА</a></div>
<?
$banners['service-ad'] = ob_get_clean();
ob_start()
?>
    <div class="text-center mt-3 mb-3"><a class="btn btn-outline-secondary">Баннер Перейти к тесту</a></div>
<?
$banners['go-to-test'] = ob_get_clean();

return $banners;