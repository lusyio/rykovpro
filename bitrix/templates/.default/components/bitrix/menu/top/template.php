<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<?$url = $APPLICATION->GetCurDir();?>
	<?$url = explode("/", $url);?>
	<?if($url[1] == ""):?>
		<?$url = "/";?>
	<?else:?>
		<?$url = "/".$url[1]."/";?>
	<?endif;?>
	<ul>
		<?foreach($arResult as $arItem):
			if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
				continue;?>
			<?if($arItem["SELECTED"] && $url == $arItem["LINK"]):?>
				<li class = "active"><a href = "<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href = "<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>
		<?endforeach?>
	</ul>
<?endif?>