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


<div class = "news-detail">
	<?$picture = $arResult['DETAIL_PICTURE']['SRC'];?>
	<?if(!$picture):?>
		<?$picture = $templateFolder."/img/default.jpg";?>
	<?endif;?>
	<div class = "news-detail-picture" data-img = "<?=$picture;?>">
		<h1><?=$arResult["NAME"];?></h1>
		<?if($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
			<span><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif;?>
	</div>
	<?if($arResult["TAGS"]):?>
		<?$tags = explode(",", $arResult["TAGS"]);?>
	<?endif;?>
	<div class = "news-detail-tags">
		<ul>
			<?foreach ($tags as $key => $value):?>
				<li><span>#<?=trim($value);?></span></li>
			<?endforeach;?>
		</ul>
	</div>
	<?if($arResult["DISPLAY_PROPERTIES"]["BX_NEWS_BANNERS"]):?>
		<div class = "row">
			<div class = "col-12 col-md-12 col-lg-9">
				<div class = "news-detail-text">
					<?=$arResult["DETAIL_TEXT"];?>
				</div>
			</div>
			<div class = "col-12 col-lg-3 d-none d-lg-flex">
				<div class = "news-detail-sidebar">
					<?foreach ($arResult["DISPLAY_PROPERTIES"]["BX_NEWS_BANNERS"]["VALUE"] as $key => $value):?>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_NEWS_BANNERS"]["DESCRIPTION"][$key]):?>
							<div class = "news-detail-banner">
								<a href = "<?=$arResult['DISPLAY_PROPERTIES']['BX_NEWS_BANNERS']['DESCRIPTION'][$key];?>" target = "_blank">
									<img class = "img-fluid" src = "<?=CFile::GetPath($value);?>" alt = "<?=$arResult['NAME'];?>">
								</a>
							</div>
						<?else:?>
							<div class = "news-detail-banner">
								<img class = "img-fluid" src = "<?=CFile::GetPath($value);?>" alt = "<?=$arResult['NAME'];?>">
							</div>
						<?endif;?>
					<?endforeach;?>
				</div>
			</div>
		</div>
	<?else:?>
		<div class = "news-detail-text">
			<?=$arResult["DETAIL_TEXT"];?>
		</div>
	<?endif;?>
</div>