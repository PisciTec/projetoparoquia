<?php
include "abreconexao.php";
include "funcoes.inc";
$cod_comunidade = $_GET["cod_comunidade"];
$data_inicial = $_GET["data_inicial"];
$data_final = $_GET["data_final"];

if ($cod_comunidade == "todas") {
   $consulta1 = "select * from comunidade_entrada a inner join comunidade b where a.cod_comunidade = b.cod_comunidade and
                (data_entrada between '$data_inicial' and '$data_final') order by a.data_entrada desc";
   $consulta2 = "select * from comunidade_saida a inner join comunidade b where a.cod_comunidade = b.cod_comunidade and
                (data_saida between '$data_inicial' and '$data_final') order by a.data_saida desc";

}
else {
     $consulta1 = "select * from comunidade_entrada a inner join comunidade b where a.cod_comunidade = b.cod_comunidade and a.cod_comunidade =
                  '$cod_comunidade' and (data_entrada between '$data_inicial' and '$data_final') order by a.data_entrada desc";
     $consulta2 = "select * from comunidade_saida a inner join comunidade b where a.cod_comunidade = b.cod_comunidade and a.cod_comunidade =
                  '$cod_comunidade' and (data_saida between '$data_inicial' and '$data_final') order by a.data_saida desc";
}

$resposta1 = mysql_query($consulta1) or die ("Não foi possível realizar a consulta de entrada de valores");
$resposta2 = mysql_query($consulta2) or die ("Não foi possível realizar a consulta de saida de valores");
?>

<html>
<head>
<title>Comunidades</title>
<link rel="stylesheet" type="text/css" href="estilo_novo.css">
<head>

<body>
<h3>Lista de Entrada e Saída por Período</h3>
<b>Lista de Entradas</b>
<center>
<table border="0" cellpadding="1" cellspacing="1" bgcolor="#000000" width="70%">
       <tr>
           <th bgcolor="#c0c0c0">Comunidade</th>
           <th bgcolor="#c0c0c0">Data</th>
           <th bgcolor="#c0c0c0">Valor</th>
       </tr>
       <?php
            $total_entrada = 0;
            while ($linha = mysql_fetch_array($resposta1)) {
                  $data_entrada = converte_data($linha["data_entrada"]);
                  $valor = number_format($linha["valor"], 2, ",", ".");
                  $total_entrada = $total_entrada + $linha["valor"];
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\">$linha[nome_comunidade]</td>
                      <td bgcolor=\"#ffffff\">$data_entrada</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$valor</td>
                  </tr>
                  ";
            }
       ?>
       <tr>
           <td bgcolor="#c0c0c0" colspan="2">Total</td>
           <td bgcolor="#ffffff" align="right"><?php $total_entrada_formatado = number_format($total_entrada, 2, ",", "."); echo $total_entrada_formatado; ?></td>
       </tr>
</table>
<br>
<b>Lista de Saídas</b>
<table border="0" cellpadding="1" cellspacing="1" bgcolor="#000000" width="70%">
       <tr>
           <th bgcolor="#c0c0c0">Comunidade</th>
           <th bgcolor="#c0c0c0">Data</th>
           <th bgcolor="#c0c0c0">Valor</th>
       </tr>
       <?php
            $total_saida = 0;
            while ($linha = mysql_fetch_array($resposta2)) {
                  $data_saida = converte_data($linha["data_saida"]);
                  $valor = number_format($linha["valor"], 2, ",", ".");
                  $total_saida = $total_saida + $linha["valor"];
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\">$linha[nome_comunidade]</td>
                      <td bgcolor=\"#ffffff\">$data_saida</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$valor</td>
                  </tr>
                  ";
            }
            
            $data_ini = converte_data($data_inicial);
            $data_fim = converte_data($data_final);
       ?>
       <tr>
           <td bgcolor="#c0c0c0" colspan="2">Total</td>
           <td bgcolor="#ffffff" align="right"><?php $total_saida_formatado = number_format($total_saida, 2, ",", "."); echo $total_saida_formatado; ?></td>
       </tr>
</table>
<br>
<br>
<b>Saldo do Período <?php echo $data_ini." a ".$data_fim; ?>:</b> <?php $saldo = number_format($total_entrada - $total_saida, 2, ",", "."); echo $saldo; ?>
<br>
<?php
$consulta = "select * from comunidade where cod_comunidade = '$cod_comunidade'";
$resposta = mysql_query($consulta) or die ("Não foi possível consultar dados ");
$linha = mysql_fetch_array($resposta);
$saldo_atual = $linha["saldo"];
?>
<b>Saldo Atual com Índice Aplicado ou Não: </b> <?php $saldo = number_format($saldo_atual, 2, ",", "."); echo $saldo; ?>
</body>

</html>

