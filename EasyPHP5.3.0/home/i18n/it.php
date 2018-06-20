<?php
/**
* EasyPHP i18n - Translations for EasyPHP
* IT
* Naming based on languages (ISO 639) not on countries
* @version	2.0
* @license	GPL
* @author	
*/

//== Navigation ==
$administration = "amministrazione";
$help = "aiuto";
$back = "indietro";

//== Info ==
$info_title = "PHP 5.3 migration guide";
$info_text = "Most improvements in PHP 5.3.x have no impact on existing code. However, there are a <a href='http://www.php.net/manual/en/migration53.incompatible.php'>few incompatibilities</a> and <a href='http://www.php.net/manual/en/migration53.new-features.php'>new features</a> that should be considered.";
$info_usb = "If you want to use EasyPHP on an USB key, copy the entire EasyPHP folder on the key. Be sure that all data (databases, scripts, ...) are on the key.";

//== Local web ==
$localweb = "sito_locale";

//== Docroot ==
$docroot_select = "Select a new path";
$docroot_change = "change";		
$docroot_default = "set to default";
$docroot_warning_1 = "Il campo è vuoto.";
$docroot_warning_2 = "La cartella corrispondente al percorso scelto non esiste.";

//== Alias ==
$alias_title = "+ALIAS+"; //il carattere + sostituisce le virgolette
$alias_add = "aggiungere";
$alias_delete = "eliminare";
$alias_intro = "Gli alias permettono di posizionare i vostri lavori in una o più cartelle indipendenti dalla root di apache (www).";
$alias_1 = "Creare la vostra cartella (es.: C:\weblocal\sites\site1)";
$alias_2 = "Scegliere un nome per l'alias (es.: sito1)";
$alias_3 = "Scegliere il percorso della cartella creata (es.: C:\weblocal\sites\site1)";
$alias_4 = "Parametri di default del progetto";
$alias_5 = "Verifica ('OK')";
$alias_warning_1 = "Il campo 2 è vuoto.";
$alias_warning_2 = "Il campo 3 è vuoto.";
$alias_warning_3 = "La cartella corrispondente al percorso scelto non esiste.";
$alias_warning_4 = "This name, or a part of this name, is already used by the system.";

//== Extensions ==
$extensions_title = "ESTENSIONI";
$extensions_nb = "Avete %s estensioni caricate";
$extensions_show = "visualizzare";
$extensions_functions = "funzioni";

//== Database ==
$mysql_manager = "mysql_gestione"; //lIl carattere _ rimpiazza lo "spazio"
$sqlite_manager = "mysql_gestione";

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

$licence = "LICENZE";
$licence_rem = "Le informazioni fornite sono a titolo indicativo. Si prega di consultare il sito ufficiale %s per tutte le informazioni legali.";
$phpinfo = "PHPINFO";
?>