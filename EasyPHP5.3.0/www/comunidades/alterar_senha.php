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
   $senha_anterior = $_POST["senha_anterior"];
   $nova_senha = $_POST["nova_senha"];
   $repetir_nova_senha = $_POST["repetir_nova_senha"];
   
   $consulta = "select * from comunidade_usuario where nome_usuario = 'admin' and senha_usuario = '$senha_anterior'";
   $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados do usuário");
   $total = mysql_num_rows($resposta);
   
   if ($total > 0 and $nova_senha == $repetir_nova_senha) {
      $atualiza = "update comunidade_usuario set senha_usuario = '$nova_senha' where nome_usuario = 'admin'";
      mysql_query($atualiza) or die ("Não foi possível alterar senha de usuario");
      echo "
       <script language=\"JavaScript\">
           window.alert('Senha alterada com sucesso!');
           window.location.href='principal.php';
       </script>
   ";
   }
   else {
        echo "
       <script language=\"JavaScript\">
           window.alert('Você digitou a senha errada ou nova senha e repita senha nova não coincidem!');
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
           <td bgcolor="#ffffff" height="500" valign="top">
               <h3>Alteração de Senha</h3>
               <form action="alterar_senha.php" method="post">
                     <label>Senha Anterior:</label>
                     <input type="text" name="senha_anterior" size="20" class="campos">
                     <br>
                     <label>Nova Senha:</label>
                     <input type="text" name="nova_senha" size="20" class="campos">
                     <br>
                     <label>Repetir Nova Senha:</label>
                     <input type="text" name="repetir_nova_senha" size="20" class="campos">
                     <br>
                     <input type="submit" name="cadastro" value="Salvar" class="botao">
                     &nbsp;
                     <input type="button" value="Cancelar" class="botao" onclick="window.location.href='principal.php';">
               </form>
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


