<?php
include "abreconexao.php";
include "funcoes.inc";
$data_inicio=$_GET["data_inicio"];
$data_final=$_GET["data_final"];
$consulta = "select distinct(b.nome) as contribuinte from canta_reza_contribuicao a, canta_reza_contribuinte b where (a.fk_cod_contribuinte = b.cod_contribuinte) and (a.data_pagamento='$data_pesquisa')";
$resposta = mysql_query($consulta) or die ("Não foi possível consultar dados");
?>

<html>
<head>
<title>Sistema Canta e Reza</title>
</head>

<body>
<?php
echo "<h2>Sistema Canta e Reza</h2><h3>Lista de Contribuintes</h3>";
while ($linha = mysql_fetch_array($resposta)){
      echo $linha["contribuinte"]."<br>";
}
?>
</body
</html>
