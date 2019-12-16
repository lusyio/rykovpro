<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
if($_GET["PAGEN_1"]) {
	$APPLICATION->AddHeadString('<link rel = "canonical" href="https://rykov.pro'.$APPLICATION->GetCurPage().'"/>',true);
}
?>