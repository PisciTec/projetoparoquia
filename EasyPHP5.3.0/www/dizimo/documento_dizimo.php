<?php
include "abreconexao.php";
include "funcoes.inc";

$mes_valor[1] = "Janeiro";
$mes_valor[2] = "Fevereiro";
$mes_valor[3] = "Março";
$mes_valor[4] = "Abril";
$mes_valor[5] = "Maio";
$mes_valor[6] = "Junho";
$mes_valor[7] = "Julho";
$mes_valor[8] = "Agosto";
$mes_valor[9] = "Setembro";
$mes_valor[10] = "Outubro";
$mes_valor[11] = "Novembro";
$mes_valor[12] = "Dezembro";
?>
<html>
<head>
<title>CONTROLE DE DÍZIMO</title>
<link rel="stylesheet" href="estilo.css" type="text/css">
</head>

<body>
<?php
if (!isset($_POST["consulta"])){
   $data = date("d/m/Y");
   echo "
     <h3>Dados adicionais</h3>
     <form method=\"post\" action=\"documento_dizimo.php\">
     <input type=\"hidden\" name=\"codigo\" value=\"$_GET[codigo]\">
     <input type=\"hidden\" name=\"nome\" value=\"$_GET[nome]\">
     <label>Mês:</label>
     <select name=\"mes\">
             <option>Selecione</option>
             <option value=\"1\">JANEIRO</option>
             <option value=\"2\">FEVEREIRO</option>
             <option value=\"3\">MARÇO</option>
             <option value=\"4\">ABRIL</option>
             <option value=\"5\">MAIO</option>
             <option value=\"6\">JUNHO</option>
             <option value=\"7\">JULHO</option>
             <option value=\"8\">AGOSTO</option>
             <option value=\"9\">SETEMBRO</option>
             <option value=\"10\">OUTUBRO</option>
             <option value=\"11\">NOVEMBRO</option>
             <option value=\"12\">DEZEMBRO</option>
     </select>
     <br>
     <label>Ano:</label><input type=\"text\" name=\"ano\" size=\"4\" maxlength=\"4\"><br>
     <label>Data(dd/mm/aaaa):</label><input type=\"text\" name=\"data\" value=\"$data\" size=\"10\" maxlength=\"10\"><br>
     <label>Valor:</label><input type=\"text\" name=\"valor\" size=\"5\"><br>
     <input type=\"submit\" name=\"consulta\" value=\"Continuar\">
     </form>
   ";
}
else {
          $codigo = $_POST["codigo"];
          $ano = $_POST["ano"];
          $mes = $_POST["mes"];
          $valor = $_POST["valor"];
          $data = converte_data($_POST["data"]);

          $select = "select * from contrib where CODIGO = '$codigo' and ANO = '$ano' and MES = '$mes'";
          $retorno = mysql_query($select, $conectar) or die ("Não foi possível consultar dados de contribuição");
          $num = mysql_num_rows($retorno);

          if ($num == 0){
             $valor1=str_replace(",",".",$valor);
             $insert = "insert into contrib (CODIGO, ANO, MES, VALOR, DATA) values ('$codigo','$ano','$mes','$valor1','$data')";
             mysql_query($insert, $conectar) or die ("Não foi possivel inserir dados pagamento de dizimo!");
             echo "
             <script language=\"JavaScript\">
                 alert('Dados inseridos com sucesso!');
             </script>
          ";
          }
          else {
             echo "
             <script language=\"JavaScript\">
                 alert('Pagamento já realizado!');
                 close();
             </script>
             ";
          }
?>
<div style="width:750px; height:480px; font-size:17px; text-align:left;">
<img src="img/logotipo_dizimo.jpg" width="750" height="100" border="0">
<label>DIZIMISTA Nº:</label>&nbsp;<b><?php echo $_POST["codigo"];?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>MÊS:</label>&nbsp;<b><?php echo $mes_valor[$_POST["mes"]];?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>ANO:</label>&nbsp;<b><?php echo $_POST["ano"];?></b><br><br>
<label>NOME:</label>&nbsp;<b><?php echo $_POST["nome"];?></b><br><br>
<label>VALOR R$:</label>&nbsp;<b><?php echo $_POST["valor"];?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>DATA:</label>&nbsp;<b>CANINDE,&nbsp;<?php echo $_POST["data"];?></b><br>
<br>
SÃO FRANCISCO DAS CHAGAS ROGAI POR NÓS!<br><br>
<b>Últimas contribuições</b><br>
<table border="0" cellpadding="0" cellspacing="1" bgcolor="#000000" width="740">
<?php
$consulta_pagamento = "select A.ANO, A.MES, A.VALOR, A.DATA from contrib A inner join dizimo B where A.CODIGO = B.CODIGO and B.CODIGO = $codigo order by A.ANO DESC, A.MES DESC limit 0, 12";
$codigo = $_POST["codigo"];
$i=0;
$resposta_pagamento = mysql_query($consulta_pagamento, $conectar) or die ("Não foi possivel consultar dados de pagamento!");
while ($linha = mysql_fetch_array($resposta_pagamento)) {
  $data = converte_data($linha["DATA"]);
  $mes1 = $linha["MES"];
  $ano = $linha["ANO"];
  $valor = number_format($linha["VALOR"], 2, ',', '.');
  if ($i == 0){
     echo "<tr>";
  }
  echo "
       <td bgcolor=\"#ffffff\">$mes_valor[$mes1] de $ano R$ <b>$valor</b></td>
  ";
  $i++;
  if ($i == 3){
     echo "</tr>";
     $i=0;
  }
}
?>
</table>
<br>
<br>
<center>ASSINATURA PELA PARÓQUIA</center>
<h3>DÍZIMO, UM COMPROMISSO DE FIDELIDADE</h3>
</div>
-------------------------------------------------------------------------------------------------------------------------------------------
<br>
<br>
<br>
<br>
<br>
<div style="width:750px; height:480px; font-size:17px; text-align:left;">
<img src="img/logotipo_dizimo.jpg" width="750" height="100" border="0">
<label>DIZIMISTA Nº:</label>&nbsp;<b><?php echo $_POST["codigo"];?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>MÊS:</label>&nbsp;<b><?php echo $mes_valor[$_POST["mes"]];?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>ANO:</label>&nbsp;<b><?php echo $_POST["ano"];?></b><br><br>
<label>NOME:</label>&nbsp;<b><?php echo $_POST["nome"];?></b><br><br>
<label>VALOR R$:</label>&nbsp;<b><?php echo $_POST["valor"];?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>DATA:</label>&nbsp;<b>CANINDE,&nbsp;<?php echo $_POST["data"];?></b><br>
<br>
SÃO FRANCISCO DAS CHAGAS ROGAI POR NÓS!<br><br>
<b>Últimas contribuições</b><br>
<table border="0" cellpadding="0" cellspacing="1" bgcolor="#000000" width="740">
<?php
$codigo = $_POST["codigo"];
$i=0;
$resposta_pagamento = mysql_query($consulta_pagamento, $conectar) or die ("Não foi possivel consultar dados de pagamento!");
while ($linha = mysql_fetch_array($resposta_pagamento)) {
  $data = converte_data($linha["DATA"]);
  $mes1 = $linha["MES"];
  $ano = $linha["ANO"];
  $valor = number_format($linha["VALOR"], 2, ',', '.');
  if ($i == 0){
     echo "<tr>";
  }
  echo "
       <td bgcolor=\"#ffffff\">$mes_valor[$mes1] de $ano R$ <b>$valor</b></td>
  ";
  $i++;
  if ($i == 3){
     echo "</tr>";
     $i=0;
  }
}
?>
</table>
<br>
<br>
<center>ASSINATURA PELA PARÓQUIA</center>
<h3>DÍZIMO, UM COMPROMISSO DE FIDELIDADE</h3>
</div>
<?php
}
?>
</body>
</html>
