<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<html>
<head>
    <?echo '<meta http-equiv="Content-Type" content="text/html; charset='.LANG_CHARSET.'"'.($bXhtmlStyle? ' /':'').'>'."\n";
    $APPLICATION->ShowMeta("robots", false, $bXhtmlStyle);
    $APPLICATION->ShowMeta("description", false, $bXhtmlStyle);
    $APPLICATION->ShowLink("canonical", null, $bXhtmlStyle);
    $APPLICATION->ShowCSS(true, $bXhtmlStyle);
    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();?>
<title><?$APPLICATION->ShowTitle()?></title>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF">

<?$APPLICATION->ShowPanel()?>

<?if($USER->IsAdmin()):?>

<div style="border:red solid 1px">
	<form action="/bitrix/admin/site_edit.php" method="GET">
		<input type="hidden" name="LID" value="<?=SITE_ID?>" />
		<p><font style="color:red"><?echo GetMessage("DEF_TEMPLATE_NF")?> </font></p>
		<input type="submit" name="set_template" value="<?echo GetMessage("DEF_TEMPLATE_NF_SET")?>" />
	</form>
</div>

<?endif?>