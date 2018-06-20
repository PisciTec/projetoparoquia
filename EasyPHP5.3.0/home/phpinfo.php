<?php
ob_start();
phpinfo();
$info = ob_get_contents();
ob_end_clean();
preg_match_all("=<body[^>]*>(.*)</body>=siU", $info, $tab);
$val_phpinfo = $tab[1][0];
$val_phpinfo = str_replace(";", "; ", $val_phpinfo);

include("i18n.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link rel="shortcut icon" href="images_easyphp/easyphp_favicon.ico" />

<style type="text/css"><!--
body, td, th, h1, h2 {font-family: sans-serif;}
pre {margin: 0px; font-family: monospace;}
a:link {color: #000099; text-decoration: none;}
a:hover {text-decoration: underline;}
table {border-collapse: collapse;}
.center, .center h1 {text-align: center;}
.center table { margin-left: auto; margin-right: auto; text-align: left; border:solid 1px Black;}
.center th { text-align: center; !important }
td, th { border: 0px solid #525A73; font-size: 95%; vertical-align: baseline;}
h1 {font-size: 180%;}
h2 {font-size: 155%;}
.p {text-align: left;}
.e {background-color: #ccccff; font-weight: bold;}
.h {background-color: #9999cc; font-weight: bold;}
.v {background-color: #cccccc;}
i {color: #666666;}
hr {width: 600px; align: center; background-color: #cccccc; border: 0px; height: 1px;}
//--></style>

<title>[EasyPHP] - phpinfo()</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>

<body>


<?php
include("functions.inc.php");
include("header.inc.php");
?>

<div id="body">
	<div class="container">
		<br />
		<?php
		button("phpinfo", "phpinfo.php", "", "#7F7F7F", 0);
		?>
		<br /><br />
		
		<div class="box_top"><img src="images_easyphp/box_top.gif" width="760" height="2" alt="--- top box ---" /></div>
		<div class="box_body">
			<div style="width:720px;margin:0px auto 0px auto;padding:10px 0px 10px 0px;">

			<?php echo $val_phpinfo ?>

			</div>
		</div>
		<div class="box_bottom"><img src="images_easyphp/box_bottom.gif" width="760" height="2" alt="--- bottom box ---" /></div>							
	</div>	
</div>

</body>
</html> 