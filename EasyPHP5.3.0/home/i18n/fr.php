<?php
/**
* EasyPHP i18n - Translations for EasyPHP
* FR
* Naming based on languages (ISO 639) not on countries
* @version	2.0
* @license	GPL
* @author	
*/

//== Navigation ==
$administration = "administration";
$help = "aide";
$back = "retour";

//== Info ==
$info_title = "PHP 5.3 migration guide";
$info_text = "Most improvements in PHP 5.3.x have no impact on existing code. However, there are a <a href='http://www.php.net/manual/en/migration53.incompatible.php'>few incompatibilities</a> and <a href='http://www.php.net/manual/en/migration53.new-features.php'>new features</a> that should be considered.";
$info_usb = "If you want to use EasyPHP on an USB key, copy the entire EasyPHP folder on the key. Be sure that all data (databases, scripts, ...) are on the key.";

//== Local web ==
$localweb = "web_local";

//== Docroot ==
$docroot_select = "Select a new path";
$docroot_change = "change";		
$docroot_default = "set to default";
$docroot_warning_1 = "Le champ est vide.";
$docroot_warning_2 = "Le r&eacute;pertoire correspondant au chemin que vous avez saisi n'existe pas.";

//== Alias ==
$alias_title = "+ALIAS+"; //le caractere + remplace le guillemet
$alias_add = "ajouter";
$alias_delete = "supprimer";
$alias_intro = "Les alias permettent de placer vos d&eacute;veloppements dans un ou plusieurs r&eacute;pertoires ind&eacute;pendamment du r&eacute;pertoire racine d'apache (www).";
$alias_1 = "Cr&eacute;er votre r&eacute;pertoire (ex.: C:\weblocal\sites\site1)";
$alias_2 = "Saisir un nom pour l'alias (ex.: site1)";
$alias_3 = "Saisir le chemin du r&eacute;pertoire cr&eacute;&eacute; (ex.: C:\weblocal\sites\site1)";
$alias_4 = "Param&egrave;tres par d&eacute;faut du r&eacute;pertoire";
$alias_5 = "Valider ('OK')";
$alias_warning_1 = "Le champ 2 est vide.";
$alias_warning_2 = "Le champ 3 est vide.";
$alias_warning_3 = "Le r&eacute;pertoire correspondant au chemin que vous avez saisi n'existe pas.";
$alias_warning_4 = "Ce nom, ou une partie de ce nom, est d&eacute;j&agrave; utilis&eacute; par le syst&egrave;me.";

//== Extensions ==
$extensions_title = "EXTENSIONS";
$extensions_nb = "Vous avez %s extensions charg&eacute;es";
$extensions_show = "afficher";
$extensions_functions = "fonctions";

//== Database ==
$mysql_manager = "mysql_administration"; //le caractere _ remplace l'espace
$sqlite_manager = "sqlite_administration";

//== MySQl Info ==
$mysqlinfo_parameters_title = "MySQL parameters (default MySQL account)";
$mysqlinfo_parameters_1 = "Host : 'localhost'";
$mysqlinfo_parameters_2 = "Username : 'root'";
$mysqlinfo_parameters_3 = "Password : '' (no password)";
$mysqlinfo_parameters_4 = "Path to the database root (datadir)";
$mysqlinfo_changeparameters_title = "How to change these parameters ?";
$mysqlinfo_changeparameters_1 = "Open the MySQL Manager (PhpMyAdmin)";
$mysqlinfo_changeparameters_2 = "Select the tab 'Privileges'";
$mysqlinfo_changeparameters_3 = "Click on the 'modify' link of the user you want to change the password";
$mysqlinfo_changeparameters_4 = "Follow the instructions";
$mysqlinfo_warning_title = "WARNING";
$mysqlinfo_warning_1 = "If you set a new password for the 'root' user, you will not be able to access PhpMyAdmin anymore. You will need to re-configure PhpMyAdmin";
$mysqlinfo_warning_2 = "Edit";
$mysqlinfo_warning_3 = "Set your new password";

$licence = "LICENCE";
$licence_rem = "Les informations ci-dessous sont données à titre indicatif. Consultez le site officiel %s pour toute information légale.";
$phpinfo = "PHPINFO";
?>