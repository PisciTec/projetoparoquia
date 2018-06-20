<?php
/**
* EasyPHP i18n - Translations for EasyPHP
* EN
* Naming based on languages (ISO 639) not on countries
* @version	2.0
* @license	GPL
* @author	
*/

//== Navigation ==
$administration = "administration";
$help = "help";
$back = "back";

//== Info ==
$info_title = "PHP 5.3 migration guide";
$info_text = "Most improvements in PHP 5.3.x have no impact on existing code. However, there are a <a href='http://www.php.net/manual/en/migration53.incompatible.php'>few incompatibilities</a> and <a href='http://www.php.net/manual/en/migration53.new-features.php'>new features</a> that should be considered.";
$info_usb = "If you want to use EasyPHP on an USB key, copy the entire EasyPHP folder on the key. Be sure that all data (databases, scripts, ...) are on the key.";

//== Local web ==
$localweb = "local_web";

//== Docroot ==
$docroot_select = "Select a new path";
$docroot_change = "change";		
$docroot_default = "set to default";
$docroot_warning_1 = "Field is empty.";
$docroot_warning_2 = "The directory corresponding to the path you have chosen does not exist.";

//== Alias ==
$alias_title = "+ALIAS+"; //the character replace the quotation marks
$alias_add = "add";
$alias_delete = "delete";
$alias_intro = "Aliases allow you to place your sites in directories other than Apache's root directory (www)";
$alias_1 = "Create a directory (eg: C:\localweb\websites\site1)";
$alias_2 = "Create a name for the Alias (eg: site1)";
$alias_3 = "Select the path to the directory you have created (eg: C:\weblocal\websites\site1)";
$alias_4 = "Default settings for the directory";
$alias_5 = "Confirm ('OK')";
$alias_warning_1 = "Field 2 is empty.";
$alias_warning_2 = "Field 3 is empty.";
$alias_warning_3 = "The directory corresponding to the path you have chosen does not exist.";
$alias_warning_4 = "This name, or a part of this name, is already used by the system.";

//== Extensions ==
$extensions_title = "EXTENSIONS";
$extensions_nb = "You have %s extensions loaded";
$extensions_show = "show";
$extensions_functions = "functions";

//== Database ==
$mysql_manager = "mysql_manager"; //the underscore character replaces the space character
$sqlite_manager = "sqlite_manager";

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
$licence_rem = "The following information is a brief summary. Consult the official website %s for all legal information.";
$phpinfo = "PHPINFO";
?>