<?php
if ($_POST['to'] == "add_alias_2")
{
	/*  alias name tests  */
	read_alias();
	$name_test = TRUE;
	$inc = 1;
	while($inc <= $nb_alias)
	{
		$exp4 = explode("\"",$alias[$inc]);
		$exp5 = explode("/",$exp4[1]);
		$alias_name = $exp5[1];
		if ($_POST['alias_name'] == $alias_name)
		{
			$name_test = FALSE;
		}
		$inc++;
	}
	

	$banned = array();
	$banned = array_merge($www_files, array("alias", "directory", "home", "error", "icons", "manual"));
	foreach ($banned as $value) {
		if ($_POST['alias_name'] == $value)
		{
			$name_test = FALSE;
		}
	}


	if (($_POST['alias_name'] != "") && ($_POST['alias_link'] != "") && (is_dir($_POST['alias_link'])) && ($name_test == TRUE))
	{
		read_alias();
		$alias_link = str_replace("\\","/", $_POST['alias_link']);
		
		if (substr($alias_link, -1) == "/"){$alias_link = substr($alias_link,0,strlen($alias_link)-1);}
		$new_alias = "Alias \"/";
		$new_alias .= $_POST['alias_name'];
		$new_alias .= "\" \"";
		$new_alias .= $alias_link;
		$new_alias .= "\"\n";
		$new_alias .= "<Directory \"$alias_link\">\n".$_POST['dir']."</Directory>\r\n";
		$conf = $httpd_1."#alias".$httpd_2.$new_alias."#alias".$httpd_3;
		$fp2 = fopen($source, "w");
		fputs($fp2,$conf);
		fclose($fp2);
		sleep(5);
		Header("Location: " . $_SERVER['PHP_SELF']); 
		exit;
	}			
}


function read_alias()
{
	global $alias, $directory, $httpd, $httpd_1, $n, $httpd_2, $httpd_3, $nb_alias, $source;
	$source = "../conf_files/httpd.conf";
	$fp = fopen($source, "r");
	$httpd = "";
	while (!feof($fp))
	{
		$conf = fgets($fp, 4096);
		$httpd = $httpd.$conf;
	}
	fclose($fp);
	$exp1 = explode("#alias",$httpd);
	$httpd_1 = $exp1[0];
	$httpd_2 = $exp1[1];
	$httpd_3 = $exp1[2];
	$exp2 = explode("Alias",$httpd_2);
			
	$n = 1;
	$nb_alias = count($exp2)-1;
	while($n<=$nb_alias)
	{
		$exp3 = explode("<Directory",$exp2[$n]);
		$alias[$n] = "Alias".$exp3[0];
		$directory[$n] = "<Directory".$exp3[1];
		$n++;
	}
}

function list_alias()
{
	global $inc, $alias, $nb_alias, $exp4, $exp5, $alias_link, $nb_alias, $alias_name, $alias_add, $alias_delete;
	$inc = 1;
	echo "<div class='alias_list'>";
	while($inc <= $nb_alias)
	{
		$exp4 = explode("\"",$alias[$inc]);
		$exp5 = explode("/",$exp4[1]);
		$alias_link = $exp4[3];
		$alias_name = $exp5[1];
		$alias_link = str_replace("/","\\", $alias_link);
		echo "<div>";
		echo "<img src='images_easyphp/alias.gif' width='16' height='11' alt='alias' />";
		echo "<span class='alias_name'><a href='../$alias_name/' target='_blank'>$alias_name</a></span>";
		echo "<span class='alias_path'><img src='images_easyphp/alias_path.gif' width='16' height='11' alt='alias path' border='0' />$alias_link\</span>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;[<a href='index.php?to=del_alias&amp;num_alias=$inc'>$alias_delete</a>]";
		echo "</div>";
		$inc++;
	}
	echo "<img src='images_easyphp/alias_add.gif' width='16' height='11' alt='add alias' border='0' />[<a href='index.php?to=add_alias_1'>$alias_add</a>]";
	echo "</div>";
}	
?>