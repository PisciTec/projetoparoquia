<?php
include "abreconexao.php";
include "funcoes.inc";

?>

<html>
<head>
<title>Comunidades</title>
<link rel="stylesheet" type="text/css" href="estilo_novo.css">
<head>

<body>
<h3>Lista de Comunidades</h3>
<table border="0" cellpadding="1" cellspacing="1" bgcolor="#000000" width="95%">
   <tr>
      <th>Comunidade</th>
      <th width="10%">Saldo</th>
   </tr>
   <?php
        $total_saldo = 0;
        $consulta = "select * from comunidade order by nome_comunidade asc";
        $resposta = mysql_query($consulta) or die ("Não foi possível consultar as comunidades");
        while ($linha = mysql_fetch_array($resposta)){
              $saldo = number_format($linha["saldo"], 2, ",", ".");
              $total_saldo = $total_saldo + $linha["saldo"];
              echo "
                   <tr>
                       <td bgcolor=\"#ffffff\">$linha[nome_comunidade]</td>
                       <td bgcolor=\"#ffffff\" align=\"right\">$saldo</td>

              ";
        }
   ?>
   <tr>
       <td bgcolor="#c0c0c0">Saldo Total</td>
       <td bgcolor="#ffffff" align="right"><?php echo number_format($total_saldo, 2, ",", "."); ?></td>
   </tr>
</table>
</body>

</html>

