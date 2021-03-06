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

<div class = "publications-detail">
	<?$picture = $arResult['DETAIL_PICTURE']['SRC'];?>
	<?if(!$picture):?>
		<?$picture = $templateFolder."/img/default.jpg";?>
	<?endif;?>
	<div class = "publications-detail-picture" data-img = "<?=$picture;?>">
		<h1><?=$arResult["NAME"];?></h1>
		<?if($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
			<span><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif;?>
	</div>
	<?if($arResult["TAGS"]):?>
		<?$tags = explode(",", $arResult["TAGS"]);?>
	<?endif;?>
	<div class = "publications-detail-tags">
		<ul>
			<?foreach ($tags as $key => $value):?>
				<li><span>#<?=trim($value);?></span></li>
			<?endforeach;?>
		</ul>
	</div>
	<?if($arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_BANNERS"]):?>
		<div class = "row">
			<div class = "col-12 col-md-12 col-lg-9">
				<div class = "publications-detail-text">
					<?=$arResult["DETAIL_TEXT"];?>
				</div>
			</div>
			<div class = "col-12 col-lg-3 d-none d-lg-flex">
				<div class = "publications-detail-sidebar">
					<?foreach ($arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_BANNERS"]["VALUE"] as $key => $value):?>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_BANNERS"]["DESCRIPTION"][$key]):?>
							<div class = "publications-detail-banner">
								<a href = "<?=$arResult['DISPLAY_PROPERTIES']['BX_PUBLICATIONS_BANNERS']['DESCRIPTION'][$key];?>" target = "_blank">
									<img class = "img-fluid" src = "<?=CFile::GetPath($value);?>" alt = "<?=$arResult['NAME'];?>">
								</a>
							</div>
						<?else:?>
							<div class = "publications-detail-banner">
								<img class = "img-fluid" src = "<?=CFile::GetPath($value);?>" alt = "<?=$arResult['NAME'];?>">
							</div>
						<?endif;?>
					<?endforeach;?>
				</div>
			</div>
		</div>
	<?else:?>
		<div class = "publications-detail-text">
			<?=$arResult["DETAIL_TEXT"];?>
		</div>
	<?endif;?>
	<?if($arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_DOCS"]):?>
		<div class = "publications-detail-docs">
		<h4>Документы публикации</h4>
		<div class = "row">
			<?foreach($arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_DOCS"]["VALUE"] as $key => $value):?>
				<div class = "col-6 col-sm-4 col-md-3">
					<div class = "publications-detail-docs-item">
						<?if(is_array($arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_DOCS"]["FILE_VALUE"][0])):?>
							<?$file_name = $arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_DOCS"]["FILE_VALUE"][$key]["ORIGINAL_NAME"];?>
						<?else:?>
							<?$file_name = $arResult["DISPLAY_PROPERTIES"]["BX_PUBLICATIONS_DOCS"]["FILE_VALUE"]["ORIGINAL_NAME"];?>
						<?endif;?>
						<a href = "<?=CFile::GetPath($value);?>" target = "_blank"><?=$file_name;?></a>
					</div>
				</div>
			<?endforeach;?>
		</div>
	<?endif;?>
	<div class = "publications-detail-social">
		<h4>поделиться в социальных сетях:</h4>
		<div class = "row">
		<div class = "col-3 col-sm-3 col-md-2 col-lg-2">
			<div class = "publications-detail-social-item">
				<a href = "http://vk.com/share.php?url=https://rykov.pro<?=$arResult['DETAIL_PAGE_URL'];?>&title=<?=$arResult['NAME'];?>&image=https://rykov.pro<?=$arResult['PREVIEW_PICTURE']['SRC'];?>&noparse=true" target = "_blank"><i class = "icon-vkontakte"></i></a>
			</div>
		</div>
		<div class = "col-3 col-sm-3 col-md-2 col-lg-2">
			<div class = "publications-detail-social-item">
				<a href = "https://www.facebook.com/sharer/sharer.php?u=https://rykov.pro<?=$arResult['DETAIL_PAGE_URL'];?>&p=https://rykov.pro<?=$arResult['PREVIEW_PICTURE']['SRC'];?>" target = "_blank"><i class = "icon-facebook"></i></a>
			</div>
		</div>
		<div class = "col-3 col-sm-3 col-md-2 col-lg-2">
		</div>
		<div class = "col-3 col-sm-3 col-md-2 col-lg-2">
		</div>
		<div class = "col-12 col-sm-12 col-md-4 col-lg-4">
			<div class = "publications-detail-social-subscribe">
				<a href = "https://vk.com/rykovivan" target = "_blank">Подписаться на VK</a>
				<a href = "https://www.facebook.com/rykovpro" target = "_blank">Подписаться на FB</a>
			</div>
		</div>
		</div>
	</div>
</div>