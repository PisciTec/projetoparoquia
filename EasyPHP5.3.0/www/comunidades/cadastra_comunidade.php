<?php
include "abreconexao.php";
include "funcoes.inc";

// Verificação de usuário logado!
$consulta_logado = "select * from comunidade_usuario where nome_usuario = 'admin' and status_usuario = 'logado'";
$resposta = mysql_query($consulta_logado) or die ("Não foi possível consultar dados de logado!");
$num = mysql_num_rows($resposta);

if ($num == 0) {
   echo "
           <script language=\"JavaScript\">
                   window.alert('Você não esta logado no sistema!');
                   window.location.href='index.php';
           </script>
   ";
}
// ###############################

if (isset($_POST["cadastro"]) and $_POST["cadastro"]) {
   $nome_comunidade = $_POST["nome_comunidade"];
   
   $consulta = "select * from comunidade where nome_comunidade = '$nome_comunidade'";
   $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados da comunidade");
   $retorno = mysql_num_rows($resposta);
   
   if ($retorno == 0) {
      $inserir = "insert into comunidade (nome_comunidade) values ('$nome_comunidade')";
      mysql_query($inserir) or die ("Não foi possível inserir dados da comunidade");
      echo "
           <script language=\"JavaScript\">
                   window.alert('Dados salvos com sucesso!');
           </script>
      ";
   }
   else {
       echo "
           <script language=\"JavaScript\">
                   window.alert('Comunidade já cadastrada!');
           </script>
      ";
   }
}

if (isset($_GET["acao"]) and $_GET["acao"] == "excluir") {
   $cod_comunidade = $_GET["cod_comunidade"];
   $consulta1 = "select * from comunidade_entrada where cod_comunidade = '$cod_comunidade'";
   $resposta = mysql_query($consulta1) or die ("Não foi possível consultar dados de entrada de valores");
   $retorno1 = mysql_num_rows($resposta);
   
   $consulta2 = "select * from comunidade_saida where cod_comunidade = '$cod_comunidade'";
   $resposta = mysql_query($consulta2) or die ("Não foi possível consultar dados de saída de valores");
   $retorno2 = mysql_num_rows($resposta);
   
   if ($retorno1 == 0 and $retorno2 == 0){
      $excluir = "delete from comunidade where cod_comunidade = '$cod_comunidade'";
      mysql_query($excluir) or die ("Não foi possível excluir dados da comunidade");
      echo "
           <script language=\"JavaScript\">
                   window.alert('Comunidade excluída com sucesso!');
           </script>
      ";
   }
   else {
        echo "
           <script language=\"JavaScript\">
                   window.alert('Comunidade não pode ser excluida pois existem valores de entrada e saída!');
           </script>
      ";
   }
}
?>

<html>
<head>
<title>Comunidades</title>
<link rel="stylesheet" type="text/css" href="estilo_novo.css">
<script language="JavaScript" src="js/funcao_mascara.js" type="text/javascript"></script>
<head>

<body onLoad="Mascaras.carregar();">

<table border="0" cellpadding="1" cellspacing="1" class="table_formatada" width="700" height="600">
       <tr>
           <td bgcolor="#A4BFD2" height="70" align="center">
               <span style="font-family: tahoma, verdana; font-size: 18pt; text-align: center;">Comunidades</h2>
           </td>
       </tr>
       <tr>
           <td bgcolor="#ffffff" height="500" valign="top" align="center">
               <h3>Cadastro de Comunidade</h3>
               <form method="post" action="cadastra_comunidade.php">
                     <label>Nome da Comunidade:</label>
                     <input type="text" name="nome_comunidade" size="70" maxlenght="200">
                     <br>
                     <input type="submit" name="cadastro" value="Salvar" class="botao">
                     &nbsp;
                     <input type="button" value="Cancelar" class="botao" onclick="window.location.href='principal.php';">
               </form>
               <h3>Lista de Comunidades</h3>
               <?php
               echo"
                    Clique para imprimir a lista de comunidades -->
                    <a href=\"imprimir_relatorio_lista_comunidade.php\" target=\"_blank\">
                        <img src=\"images/imprimir.jpg\" width=\"22\" height=\"24\" border=\"0\">
                    </a>
               ";
               ?>
               <div id="scroll_menor">

                    <table border="0" cellpadding="1" cellspacing="1" bgcolor="#000000" width="95%">
                           <tr>
                               <th>Comunidade</th>
                               <th width="10%">Saldo</th>
                               <th width="10%">Ação</th>
                           </tr>
                    <?php
                         $total_saldo = 0;
                         $consulta = "select * from comunidade order by nome_comunidade asc";
                         $resposta = mysql_query($consulta) or die ("Não foi possível consultar as comunidades");
                         while ($linha = mysql_fetch_array($resposta)){
                               $saldo = number_format($linha["saldo"], 2, ",", ".");
                               $total_saldo = $total_saldo + $linha["saldo"];
                               echo "
                                    <tr>
                                        <td bgcolor=\"#ffffff\">$linha[nome_comunidade]</td>
                                        <td bgcolor=\"#ffffff\" align=\"right\">$saldo</td>
                                        <td bgcolor=\"#ffffff\" align=\"center\">
                                              <input type=\"image\" src=\"images/editar.jpg\" alt=\"Editar\" value=\"Editar\" onclick=\"window.location.href='alterar_dados_comunidade.php?cod_comunidade=$linha[cod_comunidade]';\">
                                              <input type=\"image\" src=\"images/excluir.jpg\" alt=\"Excluir\" value=\"Excluir\" onclick=\"if (confirm('Tem certeza que deseja excluir a comunidade')){ window.location.href='cadastra_comunidade.php?cod_comunidade=$linha[cod_comunidade]&acao=excluir'; }\">
                                        </td>
                               ";
                         }
                    ?>
                         <tr>
                             <td bgcolor="#c0c0c0" colspan="2">Saldo Total</td>
                             <td bgcolor="#ffffff" align="right"><?php echo number_format($total_saldo, 2, ",", "."); ?></td>
                         </tr>
                    </table>
               </div>
               <input type="button" value="Voltar" class="botao" onclick="window.location.href='principal.php';">
           </td>
       </tr>
       <tr>
           <td bgcolor="#A4BFD2" height="30" align="center">
               COMUNIDADES.
           </td>
       </tr>
</table>

</body>

</html>


