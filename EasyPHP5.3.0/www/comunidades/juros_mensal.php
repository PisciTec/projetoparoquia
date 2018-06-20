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

if (isset($_POST["aplicar"]) and $_POST["aplicar"]) {
   $valor_indice = $_POST["valor_indice"];
   $consulta = "select * from comunidade";
   $resposta = mysql_query($consulta) or die ("Não foi possivel consultar dados da comunidade");

   while ($linha = mysql_fetch_array($resposta)) {
         $cod_comunidade = $linha["cod_comunidade"];
         $saldo = $linha["saldo"];
         if ($saldo > 0) {
            $novo_valor = ($saldo * $valor_indice) + $saldo;
            $atualiza = "update comunidade set saldo = '$novo_valor' where cod_comunidade = '$cod_comunidade'";
            mysql_query($atualiza) or die ("Não foi possível atualizar dados da comunidade");
         }
   }
   echo "
           <script language=\"JavaScript\">
                   window.alert('Índice aplicado nas comunidades!');
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
           <td bgcolor="#A4BFD2" height="70" align="center">
               <span style="font-family: tahoma, verdana; font-size: 18pt; text-align: center;">Comunidades</h2>
           </td>
       </tr>
       <tr>
           <td bgcolor="#ffffff" height="500" valign="top">
               <h3>Aplicação do Índice</h3>
               <form method="post" action="juros_mensal.php">
                     Ex. 10% usa 0.10
                     <br>
                     <label>Valor Índice:</label>
                     <input type="text" name="valor_indice" size="5" maxlenght="5" class="campos">
                     <br>
                     <input type="submit" name="aplicar" value="Aplicar Índice" class="botao">
               </form>
               <br>
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


