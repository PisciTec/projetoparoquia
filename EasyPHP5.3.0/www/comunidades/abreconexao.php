<?php

$conectar=mysql_connect("localhost","root","123") or die ("A conex�o com o servidor n�o foi executada com sucesso");
mysql_select_db("paroquia", $conectar) or die ("N�o foi poss�vel selecionar o banco de dados");

?>
