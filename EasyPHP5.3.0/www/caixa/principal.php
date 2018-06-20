<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";

if (isset($_POST["salvar"])){
   $data=converte_data($_POST["data"]);
   $dizimo=str_replace(",",".",$_POST["dizimo"]);
   $batisterio=str_replace(",",".",$_POST["batisterio"]);
   $canta_reza=str_replace(",",".",$_POST["canta_reza"]);
   $batisterio=str_replace(",",".",$_POST["batisterio"]);
   $sepultamento=str_replace(",",".",$_POST["sepultamento"]);
   $batismo=str_replace(",",".",$_POST["batismo"]);
   $casamento=str_replace(",",".",$_POST["casamento"]);
   $missas=str_replace(",",".",$_POST["missas"]);
   $terreno_cemiterio=str_replace(",",".",$_POST["terreno_cemiterio"]);
   $inserir="insert into tab_caixa (data, dizimo, canta_reza, batisterio, sepultamento, batismo, casamento, terreno_cemiterio, missas)
   values ('$data', '$dizimo', '$canta_reza', '$batisterio', '$sepultamento', '$batismo', '$casamento', '$terreno_cemiterio', '$missas')";
   mysql_query($inserir) or die ("Não foi possível inserir valores do caixa");
   $mensagem="Caixa inserido com sucesso!";
}
$consulta="select * from tab_caixa order by data desc limit 0,10";
$resposta=mysql_query($consulta) or die ("Não foi possível realizar a consulta");
?>
<div style="height: 500px; width: 579px;" align="center">
<h3>Cadastro do Caixa</h3>
<fieldset>
<legend>Caixa</legend>
<form action="principal.php" method="post">
<table border="0" cellpadding="0" cellspacing="0">
<tr><td><label>Dízimo:           </label></td><td><input type="text" name="dizimo" class="campos" size="20"></td></tr>
<tr><td><label>Canta e Reza:     </label></td><td><input type="text" name="canta_reza" class="campos" size="20"></td></tr>
<tr><td><label>Batistério:       </label></td><td><input type="text" name="batisterio" class="campos" size="20"></td></tr>
<tr><td><label>Sepultamento:     </label></td><td><input type="text" name="sepultamento" class="campos" size="20"></td></tr>
<tr><td><label>Batismo:          </label></td><td><input type="text" name="batismo" class="campos" size="20"></td></tr>
<tr><td><label>Casamento:        </label></td><td><input type="text" name="casamento" class="campos" size="20"></td></tr>
<tr><td><label>Terreno Cemitério:</label></td><td><input type="text" name="terreno_cemiterio" class="campos" size="20"></td></tr>
<tr><td><label>Missas:           </label></td><td><input type="text" name="missas" class="campos" size="20"></td></tr>
<tr><td><label>Data:</label></td><td><input type="text" name="data" value="<?php echo date("d/m/Y");?>" class="campos" size="10" tipo="numerico" mascara="##/##/####"></td></tr>
</table>
<input type="submit" name="salvar" value="Salvar" class="botao"><input type="reset" value="Limpar Campos" class="botao">
</form>
</fieldset>
<br>
<br>
<input type="button" name="alterar" value="Alterar Dados do Caixa" class="botao" onclick="window.location.href='alterar_dados_caixa.php';">
<br>
<br>
<h4>Pesquisa Período Caixa</h4>
<form method="post" action="principal.php">
<label>Data Inicial:</label><input type="text" name="data_inicial" class="campos" size="10" maxlength="10" tipo="numerico" mascara="##/##/####">
<label>Data Final:</label><input type="text" name="data_final" class="campos" size="10" maxlength="10" tipo="numerico" mascara="##/##/####">	  
<br>
<input type="submit" name="pesquisa" value="Pesquisar" class="botao">
</form>

<?php
if (isset($_POST["pesquisa"])) {
	$data_inicial = converte_data($_POST["data_inicial"]);
	$data_final = converte_data($_POST["data_final"]);
	
	echo "<a href=\"relatorio_periodo_caixa.php?data_inicial=$data_inicial&data_final=$data_final\" target=\"_blank\" class=\"a1\">Gerar Relatório</a>";		

}

?>

<h4>Últimos Lançamentos</h4>
     <table border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">
            <tr>
                <th bgcolor="#c0c0c0">Data</th>
                <th bgcolor="#c0c0c0">Dizimo</th>
                <th bgcolor="#c0c0c0">Canta e Reza</th>
                <th bgcolor="#c0c0c0">Batisterio</th>
                <th bgcolor="#c0c0c0">Sepultamento</th>
                <th bgcolor="#c0c0c0">Batismo</th>
                <th bgcolor="#c0c0c0">Casamento</th>
                <th bgcolor="#c0c0c0">Terreno Cemitério</th>
		        <th bgcolor="#c0c0c0">Missas</th>
                <th bgcolor="#c0c0c0">Total</th>
            </tr>
            <?php
            while ($linha=mysql_fetch_array($resposta)){
                  $data=converte_data($linha["data"]);
                  $dizimo=str_replace(".",",",$linha["dizimo"]);
                  $canta_reza=str_replace(".",",",$linha["canta_reza"]);
                  $batisterio=str_replace(".",",",$linha["batisterio"]);
                  $sepultamento=str_replace(".",",",$linha["sepultamento"]);
                  $batismo=str_replace(".",",",$linha["batismo"]);
                  $casamento=str_replace(".",",",$linha["casamento"]);
		          $missas=str_replace(".",",",$linha["missas"]);
                  $terreno_cemiterio=str_replace(".",",",$linha["terreno_cemiterio"]);
                  $total= number_format(str_replace(".",",",$linha["dizimo"]+$linha["canta_reza"]+$linha["batisterio"]+$linha["sepultamento"]+$linha["batismo"]+$linha["casamento"]+$linha["terreno_cemiterio"]+$linha["missas"]),2,',','.');
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\" align=\"right\">$data</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$dizimo</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$canta_reza</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$batisterio</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$sepultamento</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$batismo</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$casamento</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$terreno_cemiterio</td>
		      <td bgcolor=\"#ffffff\" align=\"right\">$missas</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$total</td>
                  </tr>
                  ";
            }
            ?>
     </table>
</div>
<?php
include "rodape.inc";
?>
