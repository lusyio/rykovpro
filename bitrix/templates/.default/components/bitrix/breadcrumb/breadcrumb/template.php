<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;
if(empty($arResult))
	return "";
$strReturn = '';
$strReturn .= '<ul>';
$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++) {
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1) {
		$strReturn .= '
			<li>
				<a href = "'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a>
			</li>';
	}
	else {
		$strReturn .= '
			<li>
				<span>'.$title.'</span>
			</li>';
	}
}
$strReturn .= '</ul>';
return $strReturn;