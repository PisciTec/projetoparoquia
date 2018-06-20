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

$consulta = "select * from missa, missa_tipo where missa.cod_tipo = missa_tipo.cod_tipo order by cod_missa desc limit 0, 50";
$resposta = mysql_query($consulta) or die ("Não foi possível consultar dados");

?>
<div style="height: 450px; width: 751px; background-color: #ffffcc;" align="center">
<h3>Lista de Missas</h3>
<input type="button" name="cadastra_missa" value="Cadastra Missa" class="botao_ok" onclick="window.location.href='cadastra_missa.php';">
&nbsp;
<input type="button" name="cadastra_missa_hora" value="Cadastra Horário" class="botao_ok" onclick="window.location.href='cadastra_missa_hora.php';">
&nbsp;
<input type="button" name="cadastra_tipo" value="Cadastra Tipo" class="botao_ok" onclick="window.location.href='cadastra_tipo.php';">
&nbsp;
<input type="button" name="missas_data_hora" value="Missas por Data/Hora" class="botao_ok" onclick="window.location.href='missas_data_hora.php';">
&nbsp;
<input type="button" name="missas_periodo" value="Missas por Período" class="botao_ok" onclick="window.location.href='missas_periodo.php';">
&nbsp;
<input type="button" name="consulta_nome" value="Consulta por Nome" class="botao_ok" onclick="window.location.href='consulta_nome.php';">
<br>
<br>
<div id="scroll">
<table border="0" cellpadding="1" cellspacing="1" width="90%" bgcolor="#000000">
       <tr>
           <th bgcolor="#ffffcc" style="font-size: 12px; ">Cód.</th>
           <th bgcolor="#ffffcc" style="font-size: 12px; ">Data</th>
           <th bgcolor="#ffffcc" style="font-size: 12px; ">Hora</th>
           <th bgcolor="#ffffcc" style="font-size: 12px; ">Nome</th>
           <th bgcolor="#ffffcc" style="font-size: 12px; ">Tipo</th>
           <th bgcolor="#ffffcc" style="font-size: 12px; ">Secretária</th>
           <th bgcolor="#ffffcc" style="font-size: 12px; ">Ação</th>
       </tr>
       <?php
       while($linha=mysql_fetch_array($resposta)){
       $data=converte_data($linha["data"]);
       echo "
       <tr>
           <td bgcolor=\"#ffffcc\" style=\"font-size: 11px; \">$linha[cod_missa]</td>
           <td bgcolor=\"#ffffcc\" style=\"font-size: 11px; \">$data</td>
           <td bgcolor=\"#ffffcc\" style=\"font-size: 11px; \">$linha[hora]</td>
           <td bgcolor=\"#ffffcc\" style=\"font-size: 11px; \">$linha[nome]</td>
           <td bgcolor=\"#ffffcc\" style=\"font-size: 11px; \">$linha[nome_tipo]</td>
           <td bgcolor=\"#ffffcc\" style=\"font-size: 11px; \">$linha[secretaria]</td>
           <td bgcolor=\"#ffffcc\" style=\"font-size: 11px; \">
               <input type=\"button\" name=\"alterar_dados_missa\" value=\"Alterar\" class=\"botao_ok\" onclick=\"window.location.href='alterar_dados_missa.php?cod_missa=$linha[cod_missa]';\">
               &nbsp;
               <input type=\"button\" name=\"excluir_dados_missa\" value=\"Excluir\" class=\"botao_ok\" onclick=\"if (confirm('Deseja realmente excluir a missa?')) { window.location.href='principal.php?cod_missa=$linha[cod_missa]&acao=excluir'; }\">
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
