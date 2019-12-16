<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

<div class = "books-detail">
	<div class = "row">
		<div class = "col-12 col-md-4">
			<div class = "books-detail-picture">
				<img class = "img-fluid" src = "<?=$arResult['DETAIL_PICTURE']['SRC'];?>" alt = "<?=$arResult['DETAIL_PICTURE']['ALT'];?>">
			</div>
		</div>
		<div class = "col-12 col-md-8">
			<div class = "books-detail-title">
				<h1><?=$arResult["NAME"];?></h1>
			</div>
			<div class = "row">
				<div class = "col-md-7">
					<div class = "books-detail-desc">
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_1"]):?>
						<div class = "row">
							<div class = "col-6">
								<p>Тип:</p>
							</div>
							<div class = "col-6">
								<p><b><?=$arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_1"]["VALUE"];?></b></p>
							</div>
						</div>
						<?endif;?>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_2"]):?>
						<div class = "row">
							<div class = "col-6">
								<p>Формат издания:</p>
							</div>
							<div class = "col-6">
								<p><b><?=$arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_2"]["VALUE"];?></b></p>
							</div>
						</div>
						<?endif;?>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_3"]):?>
						<div class = "row">
							<div class = "col-6">
								<p>Издательство:</p>
							</div>
							<div class = "col-6">
								<p><b><?=$arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_3"]["VALUE"];?></b></p>
							</div>
						</div>
						<?endif;?>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_4"]):?>
						<div class = "row">
							<div class = "col-6">
								<p>Год выпуска:</p>
							</div>
							<div class = "col-6">
								<p><b><?=$arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_4"]["VALUE"];?></b></p>
							</div>
						</div>
						<?endif;?>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_5"]):?>
						<div class = "row">
							<div class = "col-6">
								<p>Количество страниц:</p>
							</div>
							<div class = "col-6">
								<p><b><?=$arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_5"]["VALUE"];?></b></p>
							</div>
						</div>
						<?endif;?>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_6"]):?>
						<div class = "row">
							<div class = "col-6">
								<p>Комментарий:</p>
							</div>
							<div class = "col-6">
								<p><b><?=$arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_6"]["VALUE"];?></b></p>
							</div>
						</div>
						<?endif;?>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_7"]):?>
						<div class = "row">
							<div class = "col-6">
								<p>Язык издания:</p>
							</div>
							<div class = "col-6">
								<p><b><?=$arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_7"]["VALUE"];?></b></p>
							</div>
						</div>
						<?endif;?>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_8"]):?>
						<div class = "row">
							<div class = "col-6">
								<p>Тип обложки:</p>
							</div>
							<div class = "col-6">
								<p><b><?=$arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_8"]["VALUE"];?></b></p>
							</div>
						</div>
						<?endif;?>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_9"]):?>
						<div class = "row">
							<div class = "col-6">
								<p>ISBN:</p>
							</div>
							<div class = "col-6">
								<p><b><?=$arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_9"]["VALUE"];?></b></p>
							</div>
						</div>
						<?endif;?>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_10"]):?>
						<div class = "row">
							<div class = "col-6">
								<p>Вес в упаковке, г:</p>
							</div>
							<div class = "col-6">
								<p><b><?=$arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PARAM_10"]["VALUE"];?></b></p>
							</div>
						</div>
						<?endif;?>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PDF"]):?>
							<div class = "row">
								<div class = "col-12">
									<a class = "books-detail-read btn btn-radius btn-default" href = "<?=$arResult['DISPLAY_PROPERTIES']['BX_BOOK_PDF']['FILE_VALUE']['SRC'];?>" target = "_blank">Читать отрывок</a>
								</div>
							</div>
						<?endif;?>
					</div>
				</div>
				<div class = "col-md-5">
					<div class = "books-detail-buy">
						<span class = "books-detail-buy-title"><i class = "icon-book"></i> Стоимость книги</span>
						<div class = "books-detail-buy-cost"><span><?=$arResult["DISPLAY_PROPERTIES"]["BX_BOOK_PRICE"]["VALUE"];?></span></div>
						<?if($arResult["DISPLAY_PROPERTIES"]["BX_BOOK_FORM_BUY"]):?>
							<div class = "books-detail-buy-link">
								<span class = "btn btn-radius btn-primary" data-toggle = "block-modal" data-target = "#modal-book">Купить</span>
							</div>
						<?endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class = "row">
		<div class = "col-12">
			<div class = "books-detail-annotation">
				<?=$arResult["DETAIL_TEXT"];?>
			</div>
		</div>
	</div>
</div>

<?if($arResult["DISPLAY_PROPERTIES"]["BX_BOOK_FORM_BUY"]):?>
	<div class = "block-modal" id = "modal-book">
		<div class = "block-modal-overlay"></div>
		<div class = "block-modal-wrap">
			<div class = "block-modal-header">
				<span class = "block-modal-header-back">Закрыть</span>
				<span class = "block-modal-header-title">Купить книгу</span>
			</div>
			<div class = "block-modal-body">
				<div class = "block-modal-body-wrap">
					<?=$arResult["DISPLAY_PROPERTIES"]["BX_BOOK_FORM_BUY"]["~VALUE"]["TEXT"];?>
				</div>
			</div>
		</div>
	</div>
<?endif;?>