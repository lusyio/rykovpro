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
<?
	$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL", "DETAIL_PICTURE", "TAGS", "PROPERTY_*");
	$arFilter = Array("IBLOCK_ID"=> $arParams["IBLOCK_ID"], "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "PROPERTY_BX_NEWS_TOP_VALUE" => "Да");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 1), $arSelect);
?>
<?while($ob = $res->GetNextElement()):?>
	<?$arFields = $ob->GetFields();?>
	<?$tags = "";?>
	<?if($arFields["TAGS"]):?>
		<?$tags = explode(",", $arFields["TAGS"]);?>
	<?endif;?>
	<?if($arFields["DETAIL_PICTURE"]):?>
		<?$picture = CFile::GetPath($arFields["DETAIL_PICTURE"]);?>
	<?else:?>
		<?$picture = $templateFolder."/img/default.jpg";?>
	<?endif;?>
	<div class = "news-top" data-img = "<?=$picture;?>">
		<a href = "<?=$arFields['DETAIL_PAGE_URL'];?>"><?=$arFields["NAME"];?></a>
		<?if($arFields["DATE_ACTIVE_FROM"]):?>
			<?$date = substr($arFields["DATE_ACTIVE_FROM"], 0, 10);?>
			<span class = "news-top-date"><?=$date;?></span>
		<?endif;?>
		<span class = "news-top-bookmark">Топ новость</span>
	</div>
	<?if(is_array($tags)):?>
		<div class = "news-tags">
			<ul>
				<?foreach($tags as $key => $value):?>
					<li><a href = "/search/?tags=<?=trim($value);?>">#<?=trim($value);?></a></li>
				<?endforeach;?>
			</ul>
		</div>
	<?endif;?>
<?endwhile;?>
<div class = "row">
	<div class = "col-12 col-md-12 col-lg-8">
		<div class = "news-list">
			<div class = "row">
				<?foreach($arResult["ITEMS"] as $arItem):?>
				<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
				<?if($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])):?>
					<?$picture = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array("width" => 525, "height" => 325), BX_RESIZE_IMAGE_EXACT);?>
					<?$picture = $picture['src'];?>
					<?$alt = $arItem['PREVIEW_PICTURE']['ALT'];?>
				<?else:?>
					<?$picture = $templateFolder."/img/default.jpg";?>
					<?$alt = $arItem["NAME"];?>
				<?endif;?>
				<div class = "col-12 col-sm-12 col-md-6">
					<div id = "<?=$this->GetEditAreaId($arItem['ID']);?>" class = "news-list-item">
						<div class = "news-list-item-picture">
							<img class = "img-fluid" src = "<?=$picture;?>" alt = "<?=$alt;?>">
						</div>
						<?if($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
							<span class = "news-list-item-date"><?=$arItem["DISPLAY_ACTIVE_FROM"];?></span>
						<?endif;?>
						<?if($arItem["TAGS"]):?>
							<?$tags = explode(",", $arItem["TAGS"]);?>
							<div class = "news-list-item-tags">
								<ul>
									<?foreach($tags as $key => $value):?>
										<li><a href = "/search/?tags=<?=trim($value);?>">#<?=trim($value);?></a></li>
									<?endforeach;?>
								</ul>
							</div>
						<?endif;?>
						<a class = "news-list-item-link" href = "<?=$arItem['DETAIL_PAGE_URL'];?>"><?=$arItem["NAME"];?></a>
					</div>
				</div>
				<?endforeach;?>
			</div>
		</div>
		<div class = "pagination">
			<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
				<?=$arResult["NAV_STRING"]?>
			<?endif;?>
		</div>
	</div>
	<div class = "col-12 col-md-12 col-lg-4">
		<div class = "news-favorites">
			<?
				$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "TAGS", "PROPERTY_*");
				$arFilter = Array("IBLOCK_ID"=> $arParams["IBLOCK_ID"], "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "PROPERTY_BX_NEWS_FAVORITE_VALUE" => "Да");
				$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 3), $arSelect);
			?>
			<?while($ob = $res->GetNextElement()):?>
				<?$arFields = $ob->GetFields();?>
				<?if($arFields["PREVIEW_PICTURE"]):?>
					<?$picture = CFile::GetPath($arFields["PREVIEW_PICTURE"]);?>
				<?else:?>
					<?$picture = $templateFolder."/img/default_3.jpg";?>
				<?endif;?>
				<div class = "news-favorites-item" data-img = "<?=$picture;?>">
					<?if($arFields["DATE_ACTIVE_FROM"]):?>
						<?$date = substr($arFields["DATE_ACTIVE_FROM"], 0, 10);?>
						<span class = "news-favorites-item-date"><?=$date;?></span>
					<?endif;?>
					<a class = "news-favorites-item-link" href = "<?=$arFields['DETAIL_PAGE_URL'];?>"><?=$arFields['NAME'];?></a>
					<span class = "news-favorites-item-bookmark">Избранное</span>
				</div>
			<?endwhile;?>
		</div>
	</div>
</div>
