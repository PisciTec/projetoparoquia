<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";

if (isset($_GET["acao"]) and $_GET["acao"] == "desativar") {
   $atualizar = "update missa_hora set ativo = 'desativada' where cod_missa_hora = '$_GET[cod_missa_hora]'";
   mysql_query($atualizar) or die ("Não foi possível desativar hora");
   echo "
       <script language=\"JavaScript\">
            alert('Hora desativada!!');
       </script>
   ";
}

if (isset($_GET["acao"]) and $_GET["acao"] == "ativar") {
   $atualizar = "update missa_hora set ativo = 'ativada' where cod_missa_hora = '$_GET[cod_missa_hora]'";
   mysql_query($atualizar) or die ("Não foi possível ativar hora");
   echo "
       <script language=\"JavaScript\">
            alert('Hora ativada!!');
       </script>
   ";
}

if (isset($_GET["acao"]) and $_GET["acao"] == "excluir") {
   $atualizar = "delete from missa_hora where cod_missa_hora = '$_GET[cod_missa_hora]'";
   mysql_query($atualizar) or die ("Não foi possível ativar hora");
   echo "
       <script language=\"JavaScript\">
            alert('Hora excluída com sucesso!!');
       </script>
   ";
}

if (isset($_POST["cadastro"]) and $_POST["cadastro"]){
$inserir = "insert into missa_hora (missa_hora, ativo) values ('$_POST[missa_hora]', 'ativada')";
mysql_query($inserir) or die ("Não foi possível cadastrar dados");
echo "
       <script language=\"JavaScript\">
            alert('Dados inseridos com sucesso!');
       </script>
";
}
?>
<div style="height: 400px; width: 751px; background-color: #e8ebec;" align="center">
<h3>Cadastro de Hora da Missa</h3>
<form method="POST" action="cadastra_missa_hora.php">
<table border="0" cellpadding="0" cellspacing="0" width="50%">
       <tr>
           <td><label>Hora da Missa:</label></td>
           <td><input type="text" name="missa_hora" size="7" maxlenght="5" class="campos" tipo="numerico" mascara="##:##"></td>
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
           <th bgcolor="#c0c0c0">Status</th>
           <th bgcolor="#c0c0c0">Ação</th>
       </tr>
       <?php
       $consulta = "select * from missa_hora order by missa_hora asc";
       $resposta = mysql_query($consulta) or die ("Não foi possível consultar as horas cadastradas");
       while($linha=mysql_fetch_array($resposta)){

       echo "
       <tr>
           <td bgcolor=\"#ffffff\">$linha[cod_missa_hora]</td>
           <td bgcolor=\"#ffffff\">$linha[missa_hora]</td>
           <td bgcolor=\"#ffffff\">$linha[ativo]</td>
           <td bgcolor=\"#ffffff\">
       ";
           if ($linha["ativo"] == "ativada") {
              echo "
                   <input type=\"button\" name=\"desativar_hora\" value=\"Desativar Horário\" class=\"botao_ok\" onclick=\"window.location.href='cadastra_missa_hora.php?cod_missa_hora=$linha[cod_missa_hora]&acao=desativar';\">
              ";
           }
           else {
              echo "
                   <input type=\"button\" name=\"ativar_hora\" value=\"Ativar Horário\" class=\"botao_ok\" onclick=\"window.location.href='cadastra_missa_hora.php?cod_missa_hora=$linha[cod_missa_hora]&acao=ativar';\">
              ";
           }
       echo "
                   <input type=\"button\" name=\"excluir_hora\" value=\"Excluir Horário\" class=\"botao_ok\" onclick=\"window.location.href='cadastra_missa_hora.php?cod_missa_hora=$linha[cod_missa_hora]&acao=excluir';\">
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
