<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";
include "menu.inc";
?>
<div style="height: 400px; width: 579px;" align="center">
<?php
if (isset($_POST["consulta"]) and $_POST["consulta"]){
   $data_inicio=$_POST["ano"]."-01-01";
   $data_final=$_POST["ano"]."-12-30";
   $consulta = "select sum(valor) as soma from canta_reza_contribuicao where data_pagamento between '$data_inicio' and '$data_final'";
   $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados");
   $linha = mysql_fetch_array($resposta);
   echo "Valor R$: ".$linha["soma"];
   echo "Clique para imprimir <a href=\"relatorio_valor_periodo.php?data_inicio=$data_inicio&data_final=$data_final\" target=\"_blank\"><img src=\"img/impressora.gif\" width=\"40\" height=\"25\" border=\"0\"></a>";
}
else {
?>
<form method="POST" action="consulta_valor_anual.php">
<table border="0" cellpadding="0" cellspacing="0" width="400">
       <caption>Pesquisa Anual</caption>
       <tr>
           <td><label>Ano(aaaa):</label></td>
           <td><input type="text" name="ano" size="10" class="campos"></td>
       </tr>
</table>
        <input type="submit" name="consulta" value="Consultar" class="botao_ok">
</form>
<?php
}
echo "</div>";
include "rodape.inc";
?>
