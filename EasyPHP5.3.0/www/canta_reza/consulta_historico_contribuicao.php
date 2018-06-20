<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";
include "menu.inc";

?>
<div style="height: 400px; width: 579px;" align="center">
<form method="POST" action="consulta_historico_contribuicao.php">
<table border="0" cellpadding="0" cellspacing="0" width="400">
       <caption>Cadastro de Contribuição</caption>
       <tr>
           <td><label>Contribuinte:</td>
           <td>
               <select name="fk_cod_contribuinte" class="field_listbox">
                       <option>Selecione</option>
                       <?php
                       $consulta = "select cod_contribuinte, nome from canta_reza_contribuinte order by nome asc";
                       $resposta = mysql_query($consulta, $conectar) or die ("Não foi possivel efetuar a consulta do contribuinte!");
                       while($linha = mysql_fetch_array($resposta)){
                                    $cod_contribuinte=$linha["cod_contribuinte"];
                                    $nome=$linha["nome"];
                                    echo "<option value=$cod_contribuinte>$nome</option>";
                       }
                       mysql_free_result($resposta);
                       ?>
               </select>
           </td>
       </tr>
</table>
        <input type="submit" name="consulta" value="Consultar" class="botao_ok">
</form>
<?php
if (isset($_POST["consulta"])){
$cons="select nome from canta_reza_contribuinte where cod_contribuinte='$_POST[fk_cod_contribuinte]'";
$res=mysql_query($cons) or die ("Não foi possível consultar contribuinte");
$linha=mysql_fetch_array($res);
echo "Contribuinte: $linha[nome]<br>";
?>
<div id="scroll">
<table border="0" cellpadding="1" cellspacing="1" bgcolor="#000000">
<tr>
    <th bgcolor="#c0c0c0">Nº Carnê</th>
    <th bgcolor="#c0c0c0">Ano</th>
    <th bgcolor="#c0c0c0">Mês</th>
    <th bgcolor="#c0c0c0">Data</th>
    <th bgcolor="#c0c0c0">Valor</th>
</tr>
<?php
$consulta="select * from canta_reza_contribuicao where fk_cod_contribuinte='$_POST[fk_cod_contribuinte]'";
$resposta=mysql_query($consulta) or die ("Não foi possivel consultar dados de contribuição");
while ($linha=mysql_fetch_array($resposta)){
     $carne_numero=$linha["carne_numero"];
     $ano=$linha["ano"];
     $mes=$linha["mes"];
     $data_pagamento=converte_data($linha["data_pagamento"]);
     $valor=$linha["valor"];
     echo "
     <tr>
         <td bgcolor=\"#ffffff\">$carne_numero</td>
         <td bgcolor=\"#ffffff\">$ano</td>
         <td bgcolor=\"#ffffff\">$mes</td>
         <td bgcolor=\"#ffffff\">$data_pagamento</td>
         <td bgcolor=\"#ffffff\">$valor</td>
     </tr>
     ";
}
?>
</table>
</div>
<?php
}
?>
</div>
<?php
include "rodape.inc";
?>
