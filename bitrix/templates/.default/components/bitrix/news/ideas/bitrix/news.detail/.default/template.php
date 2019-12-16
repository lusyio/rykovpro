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


<div class = "ideas-detail">
	<?$picture = $arResult['DETAIL_PICTURE']['SRC'];?>
	<?if(!$picture):?>
		<?$picture = $templateFolder."/img/default.jpg";?>
	<?endif;?>
	<div class = "ideas-detail-picture" data-img = "<?=$picture;?>">
		<h1><?=$arResult["NAME"];?></h1>
		<?if($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
			<span><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif;?>
	</div>
	<?if($arResult["TAGS"]):?>
		<?$tags = explode(",", $arResult["TAGS"]);?>
	<?endif;?>
	<div class = "ideas-detail-tags">
		<ul>
			<?foreach ($tags as $key => $value):?>
				<li><a href = "/search/?tags=<?=trim($value);?>">#<?=trim($value);?></a></li>
			<?endforeach;?>
		</ul>
	</div>
	<?if($arResult["DISPLAY_PROPERTIES"]["BX_IDEAS_BANNERS"]):?>
		<div class = "row">
			<div class = "col-12 col-md-12 col-lg-9">
				<div class = "ideas-detail-text">
					<?=$arResult["DETAIL_TEXT"];?>
				</div>
			</div>
			<div class = "col-12 col-lg-3 d-none d-lg-flex">
				<div class = "ideas-detail-sidebar">
					<?foreach ($arResult["DISPLAY_PROPERTIES"]["BX_IDEAS_BANNERS"]["VALUE"] as $key => $value):?>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_IDEAS_BANNERS"]["DESCRIPTION"][$key]):?>
							<div class = "ideas-detail-banner">
								<a href = "<?=$arResult['DISPLAY_PROPERTIES']['BX_ideas_BANNERS']['DESCRIPTION'][$key];?>" target = "_blank">
									<img class = "img-fluid" src = "<?=CFile::GetPath($value);?>" alt = "<?=$arResult['NAME'];?>">
								</a>
							</div>
						<?else:?>
							<div class = "ideas-detail-banner">
								<img class = "img-fluid" src = "<?=CFile::GetPath($value);?>" alt = "<?=$arResult['NAME'];?>">
							</div>
						<?endif;?>
					<?endforeach;?>
				</div>
			</div>
		</div>
	<?else:?>
		<div class = "ideas-detail-text">
			<?=$arResult["DETAIL_TEXT"];?>
		</div>
	<?endif;?>
</div>