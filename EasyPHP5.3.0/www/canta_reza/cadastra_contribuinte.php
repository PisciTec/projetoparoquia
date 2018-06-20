<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";
include "menu.inc";
if (isset($_POST["cadastro"]) and $_POST["cadastro"]){
$data_ativacao = date("Y-m-d");
$inserir = "insert into canta_reza_contribuinte (nome, endereco, bairro, cidade, uf, pais, cep, data_ativacao, fone) values ('$_POST[nome]', '$_POST[endereco]', '$_POST[bairro]', '$_POST[cidade]', '$_POST[uf]', '$_POST[pais]', '$_POST[cep]','$data_ativacao', '$_POST[fone]')";
mysql_query($inserir) or die ("Não foi possível cadastrar dados");
echo "
       <script language=\"JavaScript\">
            alert('Dados inseridos com sucesso!');
       </script>
";
}
?>
<div style="height: 400px; width: 579px;" align="center">
<form method="POST" action="cadastra_contribuinte.php">
<table border="0" cellpadding="0" cellspacing="0" width="400">
       <caption>Cadastro de Contribuinte</caption>
       <tr>
           <td><label>Nome:</label></td>
           <td><input type="text" name="nome" size="50" maxlenght="70" class="campos"></td>
       </tr>
       <tr>
           <td><label>Endereço:</label></td>
           <td><input type="text" name="endereco" size="40" maxlenght="50" class="campos"></td>
       </tr>
       <tr>
           <td><label>Bairro:</label></td>
           <td><input type="text" name="bairro" size="30" maxlenght="50" class="campos"></td>
       </tr>
       <tr>
           <td><label>Cidade:</label></td>
           <td><input type="text" name="cidade" size="20" maxlenght="30" class="campos"></td>
       </tr>
       <tr>
           <td><label>Uf:</label></td>
           <td><input type="text" name="uf" size="2" maxlenght="2" class="campos"></td>
       </tr>
       <tr>
           <td><label>País</label></td>
           <td><input type="text" name="pais" size="20" maxlenght="30" class="campos"></td>
       </tr>
       <tr>
           <td><label>CEP:</label></td>
           <td><input type="text" name="cep" size="9" maxlenght="9" class="campos"></td>
       </tr>
       <tr>
           <td><label>Telefone:</label></td>
           <td><input type="text" name="fone" size="13" maxlenght="13" class="campos"></td>
       </tr>
</table>
        <input type="submit" name="cadastro" value="Cadastrar" class="botao_ok">
        <input type="reset" value="Limpar campos" class="botao_ok">
</form>
</div>
<?php
include "rodape.inc";
?>
