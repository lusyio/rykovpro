<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)die();
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
<div class = "ideas-slider-list">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
		<div id = "<?=$this->GetEditAreaId($arItem['ID']);?>" class = "ideas-slider-item">
			<div class = "ideas-slider-item-picture">
				<?if($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])):?>
					<?$picture = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array("width" => 525, "height" => 325), BX_RESIZE_IMAGE_EXACT);?>
					<?$alt = $arItem['PREVIEW_PICTURE']['ALT'];?>
				<?else:?>
					<?=$picture = $templateFolder."/img/default.jpg";?>
					<?$alt = $arItem["NAME"];?>
				<?endif;?>
				<img class = "img-fluid" src = "<?=$picture['src'];?>" alt = "<?=$alt;?>">
			</div>
			<?if($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
				<span class = "ideas-slider-item-date"><?=$arItem["DISPLAY_ACTIVE_FROM"];?></span>
			<?endif?>
			<a class = "ideas-slider-item-link" href = "<?=$arItem['DETAIL_PAGE_URL'];?>"><?=$arItem["NAME"];?></a>
		</div>
	<?endforeach;?>
</div>