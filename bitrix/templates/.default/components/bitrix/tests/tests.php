<?php
$tests = [];
ob_start();
?>
<div>Тест 1</div>
<?
$tests['test1'] = ob_get_clean();
ob_start();
?>
<div>Тест 2</div>
<?
$tests['test2'] = ob_get_clean();

return $tests;