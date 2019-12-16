<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>
<div class = "video-slider-list">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
		<div id = "<?=$this->GetEditAreaId($arItem['ID']);?>" class = "video-slider-item">
			<div class = "youtube embed-responsive embed-responsive-16by9" data-embed = "<?=$arItem['DISPLAY_PROPERTIES']['BX_VIDEO_LINK']['VALUE'];?>">
				<div class = "youtube-image"></div>
				<div class = "play-button"></div>
			</div>
			<?if($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
				<span class = "video-slider-item-date"><?=$arItem["DISPLAY_ACTIVE_FROM"];?></span>
			<?endif?>
			<a class = "video-slider-item-link" href = "<?=$arItem['DETAIL_PAGE_URL'];?>"><?=$arItem["NAME"];?></a>
		</div>
	<?endforeach;?>
</div>