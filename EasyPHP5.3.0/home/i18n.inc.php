<?php
$ini_array = array();
$lang_array = array("de", "en", "es", "fr", "it", "nw", "pt", "pt_br");
$filename = "../EasyPHP.ini";
$ini_array = parse_ini_file($filename);
$lang = $ini_array["LangAdmin"];
$easyphp_path = $ini_array["OldRunningPath"];


$lang = (in_array($lang, $lang_array)) ? $lang : "en";

if (isset($_GET['lang']) AND $_GET['lang'] != $lang)
{
	$fp = fopen($filename, "r");
	$ini_contents = fread($fp, filesize($filename));
	fclose($fp);
	$ini_contents = str_replace("LangAdmin=".$lang, "LangAdmin=".$_GET['lang'], $ini_contents);
	$fp = fopen($filename, "w");
	fputs($fp,$ini_contents);
	fclose($fp);
	Header("Location: " . $_SERVER['PHP_SELF']); 
	exit;
}

include("i18n/" . $lang . ".php");

$lang_class_en = ($lang == "en") ? "i18n_on" : "i18n_off";
$lang_class_es = ($lang == "es") ? "i18n_on" : "i18n_off";
$lang_class_fr = ($lang == "fr") ? "i18n_on" : "i18n_off";
$lang_class_it = ($lang == "it") ? "i18n_on" : "i18n_off";
$lang_class_nw = ($lang == "nw") ? "i18n_on" : "i18n_off";
$lang_class_pt = ($lang == "pt") ? "i18n_on" : "i18n_off";
$lang_class_pt_br = ($lang == "pt_br") ? "i18n_on" : "i18n_off";

$lang_links = "
<a href='$_SERVER[PHP_SELF]?lang=en'><img src='../images_easyphp/i18n_en.gif' width='32' height='9' border='0' alt='i18n:en' class='$lang_class_en' /></a>
<a href='$_SERVER[PHP_SELF]?lang=es'><img src='../images_easyphp/i18n_es.gif' width='32' height='9' border='0' alt='i18n:es' class='$lang_class_es' /></a>
<a href='$_SERVER[PHP_SELF]?lang=fr'><img src='../images_easyphp/i18n_fr.gif' width='32' height='9' border='0' alt='i18n:fr' class='$lang_class_fr' /></a>
<a href='$_SERVER[PHP_SELF]?lang=it'><img src='../images_easyphp/i18n_it.gif' width='32' height='9' border='0' alt='i18n:it' class='$lang_class_it' /></a>
<a href='$_SERVER[PHP_SELF]?lang=nw'><img src='../images_easyphp/i18n_nw.gif' width='32' height='9' border='0' alt='i18n:nw' class='$lang_class_nw' /></a>
<a href='$_SERVER[PHP_SELF]?lang=pt'><img src='../images_easyphp/i18n_pt.gif' width='32' height='9' border='0' alt='i18n:pt' class='$lang_class_pt' /></a>
<a href='$_SERVER[PHP_SELF]?lang=pt_br'><img src='../images_easyphp/i18n_pt_br.gif' width='32' height='9' border='0' alt='i18n:pt' class='$lang_class_pt_br' /></a>
";

$lang_links = str_replace("\r\n", "", $lang_links);
?>