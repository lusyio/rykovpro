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

<div class = "books-list">
	<div class = "row">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
			<div class = "col-sm-12 col-lg-6">
				<div id = "<?=$this->GetEditAreaId($arItem['ID']);?>" class = "books-list-item" style = "background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC'];?>);">
					<div class = "books-list-item-desc">
						<h3><?=$arItem["NAME"];?></h3>
						<p><?=$arItem["PREVIEW_TEXT"];?></p>
						<a class = "btn btn-radius btn-primary" href = "<?=$arItem['DETAIL_PAGE_URL'];?>">Купить</a>
					</div>
				</div>
			</div>
		<?endforeach;?>
	</div>
</div>
<div class = "pagination">
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>