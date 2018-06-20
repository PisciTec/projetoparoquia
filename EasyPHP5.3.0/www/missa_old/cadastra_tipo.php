<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";
if (isset($_POST["cadastro"]) and $_POST["cadastro"]){
$nome_tipo =  strtoupper($_POST["nome_tipo"]);
$inserir = "insert into missa_tipo (nome_tipo) values ('$nome_tipo')";
mysql_query($inserir) or die ("Não foi possível cadastrar dados");
echo "
       <script language=\"JavaScript\">
            alert('Dados inseridos com sucesso!');
       </script>
";
}
?>
<div style="height: 400px; width: 751px; background-color: #e8ebec;" align="center">
<h3>Cadastro de Tipo de Missa</h3>
<form method="POST" action="cadastra_tipo.php">
<table border="0" cellpadding="0" cellspacing="0" width="400">
       <tr>
           <td><label>Tipo de missa:</label></td>
           <td><input type="text" name="nome_tipo" size="30" maxlenght="40" class="campos"></td>
       </tr>
</table>
        <input type="submit" name="cadastro" value="Cadastrar" class="botao_ok">
        &nbsp;
        <input type="reset" value="Limpar campos" class="botao_ok">
        &nbsp;
        <input type="button" name="retornar" value="Voltar para Principal" class="botao_ok" onclick="window.location.href='principal.php';">
</form>
<br>
<div id="scroll_menor">
<h3>Lista de Tipos de Missa</h3>
<table border="0" cellpadding="1" cellspacing="1" width="60%" bgcolor="#000000">
       <tr>
           <th bgcolor="#c0c0c0">Cód.</th>
           <th bgcolor="#c0c0c0">Tipo</th>
           <th bgcolor="#c0c0c0">Ação</th>
       </tr>
       <?php
       $consulta = "select * from missa_tipo order by nome_tipo asc";
       $resposta = mysql_query($consulta) or die ("Não foi possível consultar os tipos");
       while($linha=mysql_fetch_array($resposta)){

       echo "
       <tr>
           <td bgcolor=\"#ffffff\">$linha[cod_tipo]</td>
           <td bgcolor=\"#ffffff\">$linha[nome_tipo]</td>
           <td bgcolor=\"#ffffff\">
               <input type=\"button\" name=\"alterar_dados_tipo\" value=\"Alterar\" class=\"botao_ok\" onclick=\"window.location.href='alterar_dados_tipo.php?cod_tipo=$linha[cod_tipo]';\">
           </td>
       </tr>
       ";
       }
       ?>
       <tr>
</table>
</div>
</div>
<?php
include "rodape.inc";
?>
