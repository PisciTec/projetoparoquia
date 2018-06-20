<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";
if (isset($_POST["cadastro"]) and $_POST["cadastro"]){
$cod_tipo = $_POST["cod_tipo"];
$nome_tipo =  strtoupper($_POST["nome_tipo"]);
$atualizar = "update missa_tipo set nome_tipo = '$nome_tipo' where cod_tipo = '$cod_tipo'";
mysql_query($atualizar) or die ("Não foi possível atualizar dados");
echo "
       <script language=\"JavaScript\">
            window.alert('Dados atualizados com sucesso!');
            window.location.href='cadastra_tipo.php';
       </script>
";
}

$cod_tipo = $_GET["cod_tipo"];
$consulta = "select * from missa_tipo where cod_tipo = '$cod_tipo'";
$resposta = mysql_query($consulta) or die ("Não foi possivel consultar o tipo de missa");
$linha = mysql_fetch_array($resposta);
$nome_tipo = $linha["nome_tipo"];
?>
<div style="height: 400px; width: 751px; background-color: #e8ebec;" align="center">
<h3>Alterar Dados de Tipo de Missa</h3>
<form method="POST" action="alterar_dados_tipo.php">
<input type="hidden" name="cod_tipo" value="<?php echo $cod_tipo; ?>">
<table border="0" cellpadding="0" cellspacing="0" width="400">
       <tr>
           <td><label>Tipo de missa:</label></td>
           <td><input type="text" name="nome_tipo" value="<?php echo $nome_tipo; ?>" size="30" maxlenght="40" class="campos"></td>
       </tr>
</table>
        <input type="submit" name="cadastro" value="Atualizar" class="botao_ok">
        &nbsp;
        <input type="button" name="retornar" value="Voltar para Principal" class="botao_ok" onclick="window.location.href='cadastra_tipo.php';">
</form>
</div>
<?php
include "rodape.inc";
?>
