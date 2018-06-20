<?php
/**
* EasyPHP i18n - Translations for EasyPHP
* ES
* Naming based on languages (ISO 639) not on countries
* @version	2.0
* @license	GPL
* @author	
*/

//== Navigation ==
$administration = "administración";
$help = "ayuda";
$back = "vuelta";

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
$docroot_warning_1 = "El campo es vacío.";
$docroot_warning_2 = "El directorio que corresponde al camino que cogieron no existe.";

//== Alias ==
$alias_title = "+ALIAS+"; // el carácter + reemplaza la comilla
$alias_add = "añadir";
$alias_delete = "borrar";
$alias_intro = "Los alias permiten colocar sus evoluciones en uno o más directorios independientemente del directorio de origen de apache (www).";
$alias_1 = "Crear su directorio (ej.: C:\weblocal\pagina\pagina1)";
$alias_2 = "Escribir un nombre para el alias (ej.: pagina1)";
$alias_3 = "Coger el camino del directorio creado (ej.: C:\weblocal\pagina\pagina1)";
$alias_4 = "Parámetros en rebeldía del directorio";
$alias_5 = "Validar ('OK')";
$alias_warning_1 = "El campo 2 es vacío.";
$alias_warning_2 = "El campo 3 es vacío.";
$alias_warning_3 = "El directorio que corresponde al camino que cogieron no existe.";
$alias_warning_4 = "This name, or a part of this name, is already used by the system.";

//== Extensiones==
$extensions_title = "EXTENSIONES";
$extensions_nb = "Tiene %s extensiones cargadas";
$extensions_show = "fijar";
$extensions_functions = "funciones";

//== Database ==
$mysql_manager = "mysql_gestion"; //le caractere _ remplace l'espace
$sqlite_manager = "sqlite_gestion";

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

$licence = "LICENCIA";
$licence_rem = "Las informaciones siguientes se dan a título indicativo. Ir sobre la pagina oficial %s para toda información legal.";
$phpinfo = "PHPINFO";
?>