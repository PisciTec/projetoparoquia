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
   $cod_comunidade = $_POST["cod_comunidade"];
   $nome_comunidade = $_POST["nome_comunidade"];

   $atualiza = "update comunidade set nome_comunidade = '$nome_comunidade' where cod_comunidade = '$cod_comunidade'";
   mysql_query($atualiza) or die ("Não foi possível atualizar dados da comunidade");
   echo "
       <script language=\"JavaScript\">
             window.alert('Dados da comunidade alterados com sucesso');
             window.location.href='cadastra_comunidade.php';
       </script>
   ";
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
           <td bgcolor="#c0c0c0" height="70" align="center">
               <span style="font-family: tahoma, verdana; font-size: 18pt; text-align: center;">Comunidades</h2>
           </td>
       </tr>
       <tr>
           <td bgcolor="#ffffff" height="500" valign="top">
               <h3>Alteração de Dados de Comunidade</h3>
               <?php
               $cod_comunidade = $_GET["cod_comunidade"];
               $consulta = "select * from comunidade where cod_comunidade = '$cod_comunidade'";
               $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados da comunidade");
               $linha = mysql_fetch_array($resposta);
               $nome_comunidade = $linha["nome_comunidade"];
               ?>
               <form action="alterar_dados_comunidade.php" method="post">
                     <input type="hidden" name="cod_comunidade" value="<?php echo $cod_comunidade; ?>">
                     <label>Nome da Comunidade:</label>
                     <input type="text" name="nome_comunidade" value="<?php echo $nome_comunidade; ?>" size="70" maxlenght="200" class="campos">
                     <br>
                     <input type="submit" name="cadastro" value="Salvar" class="botao">
                     &nbsp;
                     <input type="button" value="Cancelar" class="botao" onclick="window.location.href='cadastra_comunidade.php';">
               </form>
           </td>
       </tr>
       <tr>
           <td bgcolor="#c0c0c0" height="30" align="center">
               COMUNIDADES.
           </td>
       </tr>
</table>

</body>

</html>


