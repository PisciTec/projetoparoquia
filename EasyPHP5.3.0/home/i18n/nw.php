<?php
/**
* EasyPHP i18n - Translations for EasyPHP
* NO
* Naming based on languages (ISO 639) not on countries
* @version	2.0
* @license	GPL
* @author	
*/

//== Navigation ==
$administration = "administrasjon";
$help = "hjelp";
$back = "tilbake";

//== Info ==
$info_title = "PHP 5.3 migration guide";
$info_text = "Most improvements in PHP 5.3.x have no impact on existing code. However, there are a <a href='http://www.php.net/manual/en/migration53.incompatible.php'>few incompatibilities</a> and <a href='http://www.php.net/manual/en/migration53.new-features.php'>new features</a> that should be considered.";
$info_usb = "If you want to use EasyPHP on an USB key, copy the entire EasyPHP folder on the key. Be sure that all data (databases, scripts, ...) are on the key.";

//== Local web ==
$localweb = "lokal_web";

//== Docroot ==
$docroot_select = "Select a new path";
$docroot_change = "change";		
$docroot_default = "set to default";
$docroot_warning_1 = "Felt er tomt.";
$docroot_warning_2 = "Mappen tilsvarende stien du har skrevet finnes ikke.";

//== Alias ==
$alias_title = "+ALIAS+"; //Tegnet + erstatter anførselstegn
$alias_add = "legg til";
$alias_delete = "slett";
$alias_intro = "Aliasene gir deg muligheten til å plassere dine filer i en eller flere mapper uavhengig av Apache-rotmappen (www).";
$alias_1 = "Opprett din mappe i Windows Utforsker e.l. (f.eks. 'C:\lokalweb\sites\min_mappe_1').";
$alias_2 = "Skriv et aliasnavn (f.eks. 'Mitt alias 1'):";
$alias_3 = "Skriv stien til mappen du har opprettet (f.eks. 'C:\lokalweb\sites\min_mappe_1'):";
$alias_4 = "Forhåndsinnstilte parametere for mappen:";
$alias_5 = "Klikk på [OK] nedenfor for å lagre.";
$alias_warning_1 = "Felt 2 er tomt.";
$alias_warning_2 = "Felt 3 er tomt.";
$alias_warning_3 = "Mappen tilsvarende stien du har skrevet finnes ikke.";
$alias_warning_4 = "This name, or a part of this name, is already used by the system.";

//== Extensions ==
$extensions_title = "UTVIDELSER";
$extensions_nb = "Du har %s lastede utvidelser";
$extensions_show = "vis";
$extensions_functions = "funksjoner";

//== Database ==
$mysql_manager = "mysql_administrasjon";
$sqlite_manager = "sqlite_administrasjon";

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

$licence = "LISENS";
$licence_rem = "Opplysningene nedenfor er angitt med forbehold. Besøk det offisielle nettstedet %s for å se gjeldende vilkår.";
$phpinfo = "PHPINFO";
?>