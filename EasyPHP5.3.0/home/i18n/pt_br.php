<?php
/**
* EasyPHP i18n - Translations for EasyPHP
* PT_BR
* Naming based on languages (ISO 639) not on countries
* @version	2.0
* @license	GPL
* @author	
*/

//== Navegação ==
$administration = "administração";
$help = "ajuda";
$back = "retornar";

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
$docroot_warning_1 = "O campo está vazio.";
$docroot_warning_2 = "A pasta indicada não existe.";

//== Alias ==
$alias_title = "+ALIAS+"; // Caracteres + substituem aspas duplas
$alias_add = "adicionar";
$alias_delete = "excluir";
$alias_intro = "Os alias permitem acesso a arquivos gravados em uma ou mais pastas à escolha do desenvolvedor, independentemente da pasta raiz do Apache (www).";
$alias_1 = "Crie sua pasta aqui (ex.: C:\weblocal\sites\site1)";
$alias_2 = "Criar um nome para o alias (ex.: site1)";
$alias_3 = "Informar o caminho da pasta onde está o projeto (ex.: C:\weblocal\sites\site1)";
$alias_4 = "Parâmetros predefinidos da pasta";
$alias_5 = "Validar ('OK')";
$alias_warning_1 = "O campo 2 está vazio.";
$alias_warning_2 = "O campo 3 está vazio.";
$alias_warning_3 = "A pasta indicada não existe.";
$alias_warning_4 = "This name, or a part of this name, is already used by the system.";

//== Extensions ==
$extensions_title = "EXTENSOES";
$extensions_nb = "Existem atualmente %s extensões carregadas ";
$extensions_show = "publicar";
$extensions_functions = "funções";

//== Database ==
$mysql_manager = "mysql_administrar"; // Caracteres _ substituem os espaços
$sqlite_manager = "sqlite_administrar";

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

$licence = "LICENCA";
$licence_rem = "As informações aqui disponíveis são divulgadas a título informativo. Consulte o site oficial %s para acessar as informações legais completas.";
$phpinfo = "PHPINFO";
?>