<?php
include "abreconexao.php";
include "funcoes.inc";
$data_pesquisa=$_GET["data_pesquisa"];
$consulta = "select sum(valor) as soma from canta_reza_contribuicao where data_pagamento='$data_pesquisa'";
   $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados");
?>

<html>
<head>
<title>Sistema Canta e Reza</title>
</head>

<body>
<?php
echo "<h2>Sistema Canta e Reza</h2><h3>Valores de Contribuição</h3>";
$linha = mysql_fetch_array($resposta);
echo "Valor R$: ".$linha["soma"];
?>
</body
</html>
