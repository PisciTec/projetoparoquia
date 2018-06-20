<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";

if (isset($_POST["alterar"])){
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
   $atualizar="update tab_caixa set data='$data', dizimo='$dizimo', canta_reza='$canta_reza', batisterio='$batisterio', 
		sepultamento='$sepultamento', batismo='$batismo', casamento='$casamento', terreno_cemiterio='$terreno_cemiterio',
		missas='$missas' where cod_caixa='$_POST[cod_caixa]'";
   mysql_query($atualizar) or die ("Não foi possível atualizar valores do caixa");
   echo "
      <script language=\"JavaScript\">
                 alert('Dados do caixa atualizados com sucesso!');
		 window.location.href='principal.php';
      </script>
   ";
}

?>
<div style="height: 450px; width: 579px;" align="center">

<?php
if (!isset($_POST["consulta"])) {
echo "
<h3>Consulta Caixa</h3>
<form action=\"alterar_dados_caixa.php\" method=\"post\">
<label>Data:</label></td><td><input type=\"text\" name=\"data\" value=\"\" class=\"campos\" size=\"10\" tipo=\"numerico\" mascara=\"##/##/####\">
<br>
<input type=\"submit\" name=\"consulta\" value=\"Consultar\" class=\"botao\">
</form>
<br>
";
}
else {
$data=converte_data($_POST["data"]);
$consulta="select * from tab_caixa where data='$data'";
$resposta=mysql_query($consulta) or die ("Não foi possível realizar consulta de caixa");
$linha = mysql_fetch_array($resposta);
$num = mysql_num_rows($resposta);
if ($num == 0){
echo "
      <script language=\"JavaScript\">
                 alert('Não existe caixa para esta data!');
		 window.location.href='principal.php';
      </script>
          ";
}
else {
echo "
<h3>Alteração Dados Caixa</h3>
<fieldset>
<legend>Caixa</legend>
<form action=\"alterar_dados_caixa.php\" method=\"post\">
<input type=\"hidden\" name=\"cod_caixa\" value=\"$linha[cod_caixa]\">
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
<tr><td><label>Dízimo:           </label></td><td><input type=\"text\" name=\"dizimo\" class=\"campos\" size=\"20\" value=\"$linha[dizimo]\"></td></tr>
<tr><td><label>Canta e Reza:     </label></td><td><input type=\"text\" name=\"canta_reza\" class=\"campos\" size=\"20\" value=\"$linha[canta_reza]\"></td></tr>
<tr><td><label>Batistério:       </label></td><td><input type=\"text\" name=\"batisterio\" class=\"campos\" size=\"20\" value=\"$linha[batisterio]\"></td></tr>
<tr><td><label>Sepultamento:     </label></td><td><input type=\"text\" name=\"sepultamento\" class=\"campos\" size=\"20\" value=\"$linha[sepultamento]\"></td></tr>
<tr><td><label>Batismo:          </label></td><td><input type=\"text\" name=\"batismo\" class=\"campos\" size=\"20\" value=\"$linha[batismo]\"></td></tr>
<tr><td><label>Casamento:        </label></td><td><input type=\"text\" name=\"casamento\" class=\"campos\" size=\"20\" value=\"$linha[casamento]\"></td></tr>
<tr><td><label>Terreno Cemitério:</label></td><td><input type=\"text\" name=\"terreno_cemiterio\" class=\"campos\" size=\"20\" value=\"$linha[terreno_cemiterio]\"></td></tr>
<tr><td><label>Missas:           </label></td><td><input type=\"text\" name=\"missas\" class=\"campos\" size=\"20\" value=\"$linha[missas]\"></td></tr>
<tr><td><label>Data:             </label></td><td><input type=\"text\" name=\"data\" class=\"campos\" size=\"20\" value=\"$_POST[data]\" tipo=\"numerico\" mascara=\"##/##/####\"></td></tr>
</table>
<input type=\"submit\" name=\"alterar\" value=\"Alterar\" class=\"botao\">
</form>
</fieldset>
";
}
}
?>
</div>

<?php
include "rodape.inc";
?>
