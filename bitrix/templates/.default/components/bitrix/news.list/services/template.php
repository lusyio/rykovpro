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
<div class = "row">
	<div class = "col-12 col-md-5 col-lg-4">
		<div class = "services-nav">
			<ul>
				<?$count_item = 0;?>
				<?foreach($arResult["ITEMS"] as $arItem):?>
					<li class = "services-nav-item <?if(!$count_item):?>active<?endif;?>" data-id = "<?=$arItem['ID'];?>"><span><?=$arItem["NAME"];?></span></li>
					<?$count_item++;?>
				<?endforeach;?>
			</ul>
		</div>
	</div>
	<div class = "col-12 col-md-7 col-lg-8">
		<?$count_item = 0;?>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div id = "<?=$this->GetEditAreaId($arItem['ID']);?>" class = "services-text <?if(!$count_item):?>_show<?endif;?>" data-id = "<?=$arItem['ID'];?>">
				<?=$arItem["~PREVIEW_TEXT"];?>
				<a class = "services-text-detail btn btn-radius btn-primary " href = "<?=$arItem['DETAIL_PAGE_URL'];?>">Подробнее</a>
			</div>
			<?$count_item++;?>
		<?endforeach;?>
	</div>
</div>