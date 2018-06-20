<?php
include "abreconexao.php";
include "funcoes.inc";

if (isset($_POST["acessar"]) && $_POST["acessar"]) {
   $nome_usuario = $_POST["nome_usuario"];
   $senha_usuario = $_POST["senha_usuario"];
   
   $consulta = "select * from comunidade_usuario where nome_usuario = '$nome_usuario' and senha_usuario = '$senha_usuario'";
   $resposta = mysql_query($consulta) or die ("Não foi possível consultar usuario");
   $retorno = mysql_num_rows($resposta);
   
   if ($retorno > 0) {
      $atualiza = "update comunidade_usuario set status_usuario = 'logado' where nome_usuario = '$nome_usuario'";
      mysql_query($atualiza) or die ("Não foi possível atualizar status de usuário");
      echo "
       <script language=\"JavaScript\">
            window.location.href='principal.php';
       </script>
       ";
   }
   else {
       echo "
       <script language=\"JavaScript\">
            window.alert('Você digitou usuário ou senha errada!');
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
           <td bgcolor="#ffffff" height="500">
               <div id="geral">
		            <span class="topoRedondo">
			              <span class="rum"></span>
			              <span class="rdois"></span>
			              <span class="rtres"></span>
			              <span class="rquatro"></span>
		            </span>

		            <div class="meioRedondo">
                         <h3>Login</h3>
                             <form action="index.php" method="post">
                             <label>Usuário:</label>
                             <input type="text" name="nome_usuario" size="20" maxlenght="30" class="campos">
                             <br>
                             <label>Senha:</label>
                             <input type="password" name="senha_usuario" size="20" maxlenght="30" class="campos">
                             <br>
                             <input type="submit" name="acessar" value="Acessar" class="botao">
                             &nbsp;
                             <input type="reset" value="Limpar campos" class="botao">
                             </form>
                    </div>
		            <span class="baseRedondo">
			              <span class="rquatro"></span>
			              <span class="rtres"></span>
			              <span class="rdois"></span>
			              <span class="rum"></span>
                    </span>
               </div>
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


