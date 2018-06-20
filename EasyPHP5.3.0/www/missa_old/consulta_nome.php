<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";

if (isset($_GET["acao"]) and $_GET["acao"] == "excluir") {
   $cod_missa = $_GET["cod_missa"];
   $deleta = "delete from missa where cod_missa = '$cod_missa'";
   mysql_query($deleta) or die ("Não foi possível deletar dados da missa");

   echo "
       <script language=\"JavaScript\">
            alert('Missa excluída com sucesso!');
       </script>
";
}

?>
<div style="height: 450px; width: 751px; background-color: #e8ebec;" align="center">
<h3>Pesquisa por Nome</h3>
<form action="consulta_nome.php" method="post">
    <label>Nome:</label>
    <input type="text" name="nome" size="50" maxlenght="70" class="campos">
    <br>
    <input type="submit" name="pesquisa" value="Pesquisar" class="botao_ok">
    &nbsp;
    <input type="button" name="retornar" value="Voltar para Principal" class="botao_ok" onclick="window.location.href='principal.php';">
</form>

<h3>Lista de Missas por Nome</h3>
<br>
<div id="scroll_menor">
<?php
     if (isset($_POST["pesquisa"])) {
        $nome = $_POST["nome"];
        $consulta = "select * from missa, missa_tipo where missa.cod_tipo = missa_tipo.cod_tipo and missa.nome like '$nome%'";
        $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados");
        
?>
<table border="0" cellpadding="1" cellspacing="1" width="90%" bgcolor="#000000">
       <tr>
           <th bgcolor="#c0c0c0">Cód.</th>
           <th bgcolor="#c0c0c0">Data</th>
           <th bgcolor="#c0c0c0">Hora</th>
           <th bgcolor="#c0c0c0">Nome</th>
           <th bgcolor="#c0c0c0">Tipo</th>
           <th bgcolor="#c0c0c0">Secretária</th>
           <th bgcolor="#c0c0c0">Ação</th>
       </tr>
       <?php
       while($linha=mysql_fetch_array($resposta)){
       $data=converte_data($linha["data"]);
       echo "
       <tr>
           <td bgcolor=\"#ffffff\">$linha[cod_missa]</td>
           <td bgcolor=\"#ffffff\">$data</td>
           <td bgcolor=\"#ffffff\">$linha[hora]</td>
           <td bgcolor=\"#ffffff\">$linha[nome]</td>
           <td bgcolor=\"#ffffff\">$linha[nome_tipo]</td>
           <td bgcolor=\"#ffffff\">$linha[secretaria]</td>
           <td bgcolor=\"#ffffcc\" style=\"font-size: 11px; \">
               <input type=\"button\" name=\"alterar_dados_missa\" value=\"Alterar\" class=\"botao_ok\" onclick=\"window.location.href='alterar_dados_missa.php?cod_missa=$linha[cod_missa]';\">
               &nbsp;
               <input type=\"button\" name=\"excluir_dados_missa\" value=\"Excluir\" class=\"botao_ok\" onclick=\"if (confirm('Deseja realmente excluir a missa?')) { window.location.href='consulta_nome.php?cod_missa=$linha[cod_missa]&acao=excluir'; }\">
           </td>
       </tr>
       ";
       }
       ?>
       <tr>
</table>

<?php
     }
?>

</div>
</div>
<?php
include "rodape.inc";
?>
