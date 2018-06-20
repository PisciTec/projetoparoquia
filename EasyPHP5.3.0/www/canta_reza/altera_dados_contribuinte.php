<?php
include "abreconexao.php";
include "funcoes.inc";

if (isset($_POST["alterar"])){
$atualiza="update canta_reza_contribuinte set nome='$_POST[nome]', endereco='$_POST[endereco]', bairro='$_POST[bairro]',cidade='$_POST[cidade]', uf='$_POST[uf]', pais='$_POST[pais]', cep='$_POST[cep]', data_ativacao='$data', fone='$_POST[fone]' where cod_contribuinte='$_POST[cod_contribuinte]'";
mysql_query($atualiza) or die ("Não foi possível atualizar os dados do contribuinte");
echo "
       <script language=\"JavaScript\">
            alert('Dados alterados com sucesso!');
       </script>
";

}
include "cabecalho.inc";
include "menu.inc";

$consulta="select * from canta_reza_contribuinte where cod_contribuinte='$_GET[cod_contribuinte]'";
$resposta=mysql_query($consulta) or die ("Não foi possivel realizar a consulta");
$linha=mysql_fetch_array($resposta);
?>
<div style="height: 400px; width: 579px;" align="center">

<form method="POST" action="altera_dados_contribuinte.php">
<input type="hidden" name="cod_contribuinte" value="<?php echo $_GET["cod_contribuinte"];?>">
<table border="0" cellpadding="0" cellspacing="0" width="400">
       <caption>Alteração de Dados do Contribuinte</caption>
       <tr>
           <td><label>Nome:</label></td>
           <td><input type="text" name="nome" value="<?php echo $linha["nome"];?>" size="50" maxlenght="70" class="campos"></td>
       </tr>
       <tr>
           <td><label>Endereço:</label></td>
           <td><input type="text" name="endereco" value="<?php echo $linha["endereco"];?>" size="40" maxlenght="50" class="campos"></td>
       </tr>
       <tr>
           <td><label>Bairro:</label></td>
           <td><input type="text" name="bairro" value="<?php echo $linha["bairro"];?>" size="30" maxlenght="50" class="campos"></td>
       </tr>
       <tr>
           <td><label>Cidade:</label></td>
           <td><input type="text" name="cidade" value="<?php echo $linha["cidade"];?>" size="20" maxlenght="30" class="campos"></td>
       </tr>
       <tr>
           <td><label>Uf:</label></td>
           <td><input type="text" name="uf" value="<?php echo $linha["uf"];?>" size="2" maxlenght="2" class="campos"></td>
       </tr>
       <tr>
           <td><label>País</label></td>
           <td><input type="text" name="pais" value="<?php echo $linha["pais"];?>" size="20" maxlenght="30" class="campos"></td>
       </tr>
       <tr>
           <td><label>CEP:</label></td>
           <td><input type="text" name="cep" value="<?php echo $linha["cep"];?>" size="9" maxlenght="9" class="campos"></td>
       </tr>
       <tr>
           <td><label>Telefone:</label></td>
           <td><input type="text" name="fone" value="<?php echo $linha["fone"];?>" size="13" maxlenght="13" class="campos"></td>
       </tr>
</table>
        <input type="submit" name="alterar" value="Alterar" class="botao_ok">
</form>

</div>
<?php
include "rodape.inc";
?>
