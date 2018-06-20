<?php

$conectar=mysql_connect("localhost","root","123") or die ("A conexão com o servidor não foi executada com sucesso");
mysql_select_db("paroquia", $conectar) or die ("Não foi possível selecionar o banco de dados");

?>
