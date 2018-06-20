<?php
if (isset($HTTP_GET_VARS))
{
	while(list($name, $value) = each($HTTP_GET_VARS)) { $$name = $value; }
}
	
if (!isset($_GET['to'])) $_GET['to'] = '';
if (!isset($_POST['to'])) $_POST['to'] = '';
if (!isset($_GET['exts'])) $_GET['exts'] = '';
if (!isset($_GET['exts'])) $directory = '';

$www = opendir($_SERVER["DOCUMENT_ROOT"]);
$www_files = array();

while ($file = readdir($www)){
	if(($file != '..') && ($file != '.') && ($file != '') && (is_dir($_SERVER["DOCUMENT_ROOT"]."/".$file))){ 
		$www_files[] = $file;
	}
	sort($www_files);
}
closedir($www);
clearstatcache();

include("i18n.inc.php");
include("alias.inc.php");
include("docroot.inc.php");
include("timezone.inc.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link rel="shortcut icon" href="images_easyphp/easyphp_favicon.ico" />
<title>[EasyPHP] - <?php echo $administration ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>

<body>

<?php
include("functions.inc.php");
include("versions.inc.php");
include("header.inc.php");
?>

<div id="body">

	<div class="i18n">
		<?php echo $lang_links; ?>
	</div>
	
	<div class="container">
		
		<div class="info">
		<img src="images_easyphp/bar_info.gif" style="display:block;clear:both;" width="760" height="1" alt="---" border="0" />
			<div class="info_left">
				<p>
				<span><a href="http://www.php.net/migration53"><?php echo $info_title ?></a></span><br />
				<?php echo $info_text ?>
				</p>
			</div>
				
			<div class="info_right">	
				<p><?php echo $info_usb ?></p>
			</div>	
		<img src="images_easyphp/bar_info.gif" style="display:block;clear:both;" width="760" height="1" alt="---" border="0" />		
		</div>	
			
			
		<div class="content_left">
			<img src="images_easyphp/apache.gif" width="74" height="18" alt="Apache" border="0" />
			<?php 
			version($version_apache);
			echo "<br />";
			button_small($licence, "licence_apache.php", "", "#AFAFAF");
			?>
		</div>
		
		<div class="content_right">		
			<?php
			button($localweb, "index.php", "", "#505F70", 1);
			//===================================================================================================
			if ($_GET['to'] == "change_docroot")
			{
				?>
				<div class="localweb_form">
					<img src="images_easyphp/bar_550.gif" style="display:block;clear:both;" width="550" height="1" alt="---" border="0" />
					<div>
						<form method="post" action="index.php">
							<?php echo $docroot_select ?> : <input type="text" name="docroot" size="60" /><input type="hidden" name="to" value="write_docroot" />
							<input class="submit" type="image" src="images_easyphp/submit_input.gif" width="15" height="18" alt="submit" title="submit" />
						</form>
					</div>
					<img src="images_easyphp/bar_550.gif" style="display:block;clear:both;" width="550" height="1" alt="---" border="0" />
				</div>
				<br />
				<?php
				echo "</div></div></div></body></html>"; // close tags
				exit;
			}
			elseif ($_POST['to'] == "write_docroot")
			{
				if ($_POST['docroot'] == "")
				{
					echo "<br /><br /><img src='images_easyphp/exclam.gif' width='8' height='14' alt='warning' />&nbsp;$docroot_warning_1<br /><br />";
					echo "[&nbsp;<a href=\"javascript:history.back()\">$back</a>&nbsp;]";
					echo "</div></div></div></body></html>"; // close tags
					exit;					
				}
				if (($_POST['docroot'] != "") && (!is_dir($_POST['docroot'])))
				{
					echo "<br /><br /><img src='images_easyphp/exclam.gif' width='8' height='14' alt='warning' />&nbsp;$docroot_warning_2<br /><br />";
					echo "[&nbsp;<a href=\"javascript:history.back()\">$back</a>&nbsp;]";
					echo "</div></div></div></body></html>"; // close tags
					exit;					
				}			
			}else{
				echo "<div class='localweb'>";
				echo "<span class='localweb_name'><img src='images_easyphp/localweb.gif' width='16' height='11' alt='localweb' /><a href='../' class='text1' target='_blank'>Root</a></span>";
				echo "<span class='localweb_path'><img src='images_easyphp/alias_path.gif' width='16' height='11' alt='local web path' border='0' />Document root : " . str_replace("/","\\", $_SERVER["DOCUMENT_ROOT"]) . "\</span>";
				echo "<span class='localweb_change'>&nbsp;&nbsp;&nbsp;&nbsp;[<a href='index.php?to=change_docroot'>$docroot_change</a>]&nbsp;&nbsp;[<a href='index.php?to=default_docroot'>$docroot_default</a>]</span>";
				foreach ($www_files as $file) {
					echo "<div class='localweb_name'><img src='images_easyphp/localweb_doc.gif' width='30' height='11' alt='localweb' /><a href='../$file' class='text1' target='_blank'>$file</a></div>";
				}
				echo "</div>";			
			}
			
			button($alias_title, "index.php", "", "#505F70", 1);
			//===================================================================================================
			if ($_GET['to'] == "add_alias_1")
			{
				?>
				<div class="alias_intro">
					<?php echo $alias_intro ?>
				</div>
				<div class="alias_form">
					<form method="post" action="index.php">
					<img src="images_easyphp/bar_550.gif" style="display:block;clear:both;" width="550" height="1" alt="---" border="0" />
					<div>
					<div>
						<img src="images_easyphp/num_1.gif" width="14" height="18" alt="1." /><?php echo $alias_1 ?>
					</div>
					<div>
						<img src="images_easyphp/num_2.gif" width="14" height="18" alt="2." /><?php echo $alias_2 ?>
						<br />
						<input type="text" name="alias_name" size="50" />
					</div>
					<div>
						<img src="images_easyphp/num_3.gif" width="14" height="18" alt="3." /><?php echo $alias_3 ?>
						<br />
						<input type="text" name="alias_link" size="50" />
					</div>
					<div>
						<img src="images_easyphp/num_4.gif" width="14" height="18" alt="4." /><?php echo $alias_4 ?>
						<br />
						<?php
						$textarea = "Options FollowSymLinks Indexes\r\nAllowOverride None\r\nOrder deny,allow\r\nAllow from 127.0.0.1\r\ndeny from all\r\n";        
						?>
						<textarea name="dir" cols="40" rows="5"><?php echo $textarea ?></textarea>
					</div>
					<input type="hidden" name="to" value="add_alias_2" />
					<input type="image" class="submit" src="images_easyphp/ok.gif" width="38" height="18" alt="submit" title="submit" />
					</div>
					<img src="images_easyphp/bar_550.gif" style="display:block;clear:both;" width="550" height="1" alt="---" border="0" />
					</form>
				</div>		         
				<?php
				echo "</div></div></div></body></html>"; // close tags
				exit;				
			}
			elseif ($_POST['to'] == "add_alias_2")
			{
				if ($_POST['alias_name'] == "")
				{
					echo "<br /><br /><img src='images_easyphp/exclam.gif' width='8' height='14' alt='warning' />&nbsp;$alias_warning_1<br /><br />";
					echo "[&nbsp;<a href=\"javascript:history.back()\">$back</a>&nbsp;]";
					echo "</div></div></div></body></html>"; // close tags
					exit;					
				}
				elseif ($_POST['alias_link'] == "")
				{
					echo "<br /><br /><img src='images_easyphp/exclam.gif' width='8' height='14' alt='warning' />&nbsp;$alias_warning_2<br /><br />";
					echo "[&nbsp;<a href=\"javascript:history.back()\">$back</a>&nbsp;]";
					echo "</div></div></div></body></html>"; // close tags
					exit;						
				}
				elseif (($_POST['alias_link'] != "") && (!is_dir($_POST['alias_link'])))
				{
					echo "<br /><br /><img src='images_easyphp/exclam.gif' width='8' height='14' alt='warning' />&nbsp;$alias_warning_3<br /><br />";
					echo "[&nbsp;<a href=\"javascript:history.back()\">$back</a>&nbsp;]";
					echo "</div></div></div></body></html>"; // close tags
					exit;						
				}
				elseif ($name_test == FALSE)
				{
					echo "<br /><br /><img src='images_easyphp/exclam.gif' width='8' height='14' alt='warning' />&nbsp;$alias_warning_4<br /><br />";
					echo "[&nbsp;<a href=\"javascript:history.back()\">$back</a>&nbsp;]";
					echo "</div></div></div></body></html>"; // close tags
					exit;						
				}				
				else
				{
					read_alias();
					list_alias();
				}
			}
			elseif ($_GET['to'] == "del_alias")
			{
				read_alias();
				$conf_del_alias = $httpd_1."#alias\n";
				$x = 1;
				while($x<=$nb_alias)
				{
					if ($x != $_GET['num_alias'])
					{
						$conf_del_alias = $conf_del_alias.$alias[$x].$directory[$x];
					}
					$x++;
				}
				$conf_del_alias = $conf_del_alias."#alias".$httpd_3;
				$fp3 = fopen($source, "w");
				fputs($fp3,$conf_del_alias);
				fclose($fp3);
				read_alias();
				list_alias();
			}
			else
			{
				read_alias();
				list_alias();
			}
			//===========================================================================================
			?>			
		</div>


		<div class="content_left">
			<img src="images_easyphp/mysql.gif" width="68" height="18" alt="MySQL" border="0" />
			<?php
			version($version_mysql);
			echo "<br />";
			button_small($licence, "licence_mysql.php", "", "#AFAFAF");
			?>
		</div>
		
		<div class="content_right">
			<?php
			button("phpmyadmin", "mysql", "target='_blank'", "#505F70", 0);
			$myini_array = file("../mysql/my.ini");
			$key_datadir =  key(preg_grep("/^datadir/", $myini_array));
			$mysql_datadir_array = explode("\"",$myini_array[$key_datadir]);
			$mysql_datadir = str_replace("/","\\", $mysql_datadir_array[1]);
			?>
			<div class="mysql">
				<img src="images_easyphp/bar_550.gif" style="display:block;clear:both;" width="550" height="1" alt="---" border="0" />
				<div>
				<span><?php echo $mysqlinfo_parameters_title ?></span><br />
				<ul>
				<li><?php echo $mysqlinfo_parameters_1 ?></li>
				<li><?php echo $mysqlinfo_parameters_2 ?></li>
				<li><?php echo $mysqlinfo_parameters_3 ?></li>
				<li><?php echo $mysqlinfo_parameters_4 ?> : <?php echo $mysql_datadir; ?></li>
				</ul>
				<br />
				<span><?php echo $mysqlinfo_changeparameters_title ?></span>
				<ul>
				<li><?php echo $mysqlinfo_changeparameters_1 ?></li>
				<li><?php echo $mysqlinfo_changeparameters_2 ?></li>
				<li><?php echo $mysqlinfo_changeparameters_3 ?> [<img src="images_easyphp/phpmyadmin_usredit.png" style="vertical-align:text-top;" width="16" height="14" alt="modify" border="0" />]</li>
				<li><?php echo $mysqlinfo_changeparameters_4 ?></li>
				</ul>
				<br />
				<span><?php echo $mysqlinfo_warning_title ?></span>
				<br />
				<?php echo $mysqlinfo_warning_1 ?> :
				<ul>
				<li><?php echo $mysqlinfo_warning_2 ?> "<?php echo $easyphp_path ?>phpmyadmin\config.inc.php"</li>
				<li><?php echo $mysqlinfo_warning_3 ?> ($cfgServers[$i]['password'] = 'newpassword')</li>
				</ul>
				</div>
				<img src="images_easyphp/bar_550.gif" style="display:block;clear:both;" width="550" height="1" alt="---" border="0" />
			</div>
		</div>


		<div class="content_left">
			<img src="images_easyphp/php.gif" width="38" height="18" alt="PHP" border="0" />
			<?php
			version($version_php);
			echo "<br />";
			button_small($licence, "licence_php.php", "", "#AFAFAF");
			?>
		</div>
		
		<div class="content_right">
			<?php
			button($phpinfo, "phpinfo.php", "", "#505F70", 0);
			?>
			<div class="timezone">
				<img src="images_easyphp/bar_550.gif" style="display:block;clear:both;" width="550" height="1" alt="---" border="0" />
				<div>
				<?php timezones_select($timezone); ?>
				</div>
				<img src="images_easyphp/bar_550.gif" style="display:block;clear:both;" width="550" height="1" alt="---" border="0" />
			</div>
			<?php
			button($extensions_title, "index.php", "", "#505F70", 1);
			//===========================================================================================
			echo "<div class='extensions'>";
			$extensions = @get_loaded_extensions();
			printf($extensions_nb . "&nbsp;", count($extensions));
			printf("[<a href='index.php?to=ext'>%s</a>]<br />", $extensions_show);
			if ($_GET['to']=="ext")
			{
				@sort($extensions);
				foreach($extensions as $extension)
				{
					echo "<div><img src='/images_easyphp/extension.gif' width='16' height='11' alt='extension' border='0' /><span class='extension_name'>$extension</span>&nbsp;&nbsp;[<a href='index.php?to=ext&amp;exts=$extension'>$extensions_functions</a>]</div>";
					if ($_GET['exts']==$extension)
					{
						$functions = @get_extension_funcs($_GET['exts']);
						@sort($functions);
						foreach($functions as $function)
						{
							echo "<div class='function_name'><img src='images_easyphp/function.gif' width='16' height='11' alt='function' border='0' />" . $function . "</div>";
						}
						echo "<br />";
					}
				}
			}
			echo "</div>";
			//===========================================================================================
			echo "<br />";
			?>
		</div>	
	</div>	
</div>

</body>
</html>