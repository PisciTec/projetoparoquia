<?php
function change_docroot($path)
{
	$docroot_path = str_replace("\\","/", $path);
	if (substr($docroot_path, -1) == "/"){$docroot_path = substr($docroot_path,0,strlen($docroot_path)-1);}
	$conf_array = file("../conf_files/httpd.conf");
	$key_docroot =  key(preg_grep("/^DocumentRoot/", $conf_array));
	$conf_array[$key_docroot] = 'DocumentRoot "' . $docroot_path . '"' . "\r\n";
	$key_docrootdir =  key(preg_grep("/^# DocumentRootDirectory/", $conf_array)) + 1;
	$conf_array[$key_docrootdir] = '<Directory "' . $docroot_path . '">' . "\r\n";
	$conf_string = implode($conf_array);
	$fp = fopen("../conf_files/httpd.conf", "w");
	fputs($fp,$conf_string);
	fclose($fp);
	sleep(5);
	Header("Location: " . $_SERVER['PHP_SELF']); 
	exit;
}

if ($_GET['to'] == "default_docroot") {
	change_docroot("\${path}/www");
}	
	
if (!is_dir($_SERVER["DOCUMENT_ROOT"])) {
	change_docroot("\${path}/www");
}

if (($_POST['to'] == "write_docroot") && ($_POST['docroot'] != "") && (is_dir($_POST['docroot'])))  {
	change_docroot($_POST['docroot']);
}
?>