<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";
include "menu.inc";
?>

<div style="height: 400px; width: 579px;" align="left">
<?php
if (isset($_POST["consulta"]) and $_POST["consulta"]){
   $data_inicio=converte_data($_POST["data_inicio"]);
   $data_final=converte_data($_POST["data_final"]);
   $consulta = "select distinct(b.nome) as contribuinte from canta_reza_contribuicao a, canta_reza_contribuinte b where (a.fk_cod_contribuinte = b.cod_contribuinte) and (a.data_pagamento between '$data_inicio' and '$data_final')";
   $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados");
   echo "<h3>Lista de Contribuintes</h3>";
   while ($linha = mysql_fetch_array($resposta)){
      echo $linha["contribuinte"]."<br>";
   }
   echo "Clique para imprimir <a href=\"relatorio_contribuinte_periodo.php?data_inicio=$data_inicio&data_final=$data_final\" target=\"_blank\"><img src=\"img/impressora.gif\" width=\"40\" height=\"25\" border=\"0\"></a>";
}
else {
?>
<form method="POST" action="consulta_contribuinte_periodo.php">
<table border="0" cellpadding="0" cellspacing="0" width="400">
       <caption>Período da Pesquisa</caption>
       <tr>
           <td><label>Data Início(dd/mm/aaaa):</label></td>
           <td><input type="text" name="data_inicio" size="10" class="campos"></td>
       </tr>
       <tr>
           <td><label>Data Final(dd/mm/aaaa):</label></td>
           <td><input type="text" name="data_final" size="10" class="campos"></td>
       </tr>
</table>
        <input type="submit" name="consulta" value="Consultar" class="botao_ok">
</form>
<?php
}
echo "</div>";
include "rodape.inc";
?>
