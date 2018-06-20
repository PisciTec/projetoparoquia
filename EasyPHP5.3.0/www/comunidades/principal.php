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
               <input type="button" value="Cadastro de Comunidade" class="botao" onclick="window.location.href='cadastra_comunidade.php';">
               &nbsp;
               <input type="button" value="Entrada de Valores" class="botao" onclick="window.location.href='entrada_valores.php';">
               &nbsp;
               <input type="button" value="Saída de Valores" class="botao" onclick="window.location.href='saida_valores.php';">
               &nbsp;
               <input type="button" value="Juros Mensal" class="botao" onclick="window.location.href='juros_mensal.php';">
               &nbsp;
               <input type="button" value="Relatórios" class="botao" onclick="window.location.href='relatorios.php';">
               &nbsp;
               <input type="button" value="Alterar Senha" class="botao" onclick="window.location.href='alterar_senha.php';">
               &nbsp;
               <input type="button" value="Sair" class="botao" onclick="window.location.href='sair.php';">
               <br>
               <br>
               <img src="images/comunidade1.png" border="0">
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


