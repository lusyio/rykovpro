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
<div class = "ideas-list">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
		<?if($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?$picture = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array("width" => 525, "height" => 325), BX_RESIZE_IMAGE_EXACT);?>
			<?$picture = $picture['src'];?>
			<?$alt = $arItem['PREVIEW_PICTURE']['ALT'];?>
		<?else:?>
			<?=$picture = $templateFolder."/img/default.jpg";?>
			<?$alt = $arItem["NAME"];?>
		<?endif;?>
		<div id = "<?=$this->GetEditAreaId($arItem['ID']);?>" class = "ideas-list-item">
			<div class = "row">
				<div class = "col-md-4 col-lg-4">
					<div class = "ideas-list-item-picture">
						<img class = "img-fluid" src = "<?=$picture;?>" alt = "<?=$alt;?>">
					</div>
				</div>
				<div class = "col-md-8 col-lg-8">
					<a class = "ideas-list-item-link" href = "<?=$arItem['DETAIL_PAGE_URL'];?>"><?=$arItem["NAME"];?></a>
					<?if($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
						<span class = "ideas-list-item-date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
					<?endif?>
					<div class = "row">
						<div class = "col-12 col-sm-6">
							<div class = "ideas-list-item-idea">
								<b>Идея:</b>
								<p><?=$arItem["DISPLAY_PROPERTIES"]["BX_IDEAS_IDEA"]["VALUE"]["TEXT"];?></p>
							</div>
						</div>
						<div class = "col-12 col-sm-6">
							<div class = "ideas-list-item-opinion">
								<b>Мнение: </b>
								<p><i><?=$arItem["DISPLAY_PROPERTIES"]["BX_IDEAS_MIND"]["VALUE"]["TEXT"];?></i></p>
							</div>
						</div>
					</div>
				</div>
				<div class = "col-12">
					<div class = "ideas-list-item-detail">
						<a class = "btn btn-radius btn-primary" href = "<?=$arItem['DETAIL_PAGE_URL'];?>">Подробнее</a>
					</div>
				</div>
			</div>
		</div>
	<?endforeach;?>
</div>
<div class = "pagination">
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>