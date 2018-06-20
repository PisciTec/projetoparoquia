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
           <td bgcolor="#ffffff" height="500" valign="top">
              <h3>Pesquisa de Comunidades por Período</h3>
              <form action="relatorios.php" method="post">
                    <label>Nome da Comunidade:</label>
                    <select name="cod_comunidade" class="campos">
                            <option value="todas">Todas</option>
                            <?php
                            $consulta = "select * from comunidade order by nome_comunidade asc";
                            $resposta = mysql_query($consulta) or die ("Não foi possível consultar comunidade");
                            while ($linha = mysql_fetch_array($resposta)) {
                                  echo "
                                       <option value=\"$linha[cod_comunidade]\">$linha[nome_comunidade]</option>
                                  ";
                            }
                            ?>
                    </select>
                    <br>
                    <label>Período da Pesquisa:</label>
                    <input type="text" name="data_inicial" size="13" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####">
                    &nbsp;
                    a
                    &nbsp;
                    <input type="text" name="data_final" size="13" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####">
                    <br>
                    <input type="submit" name="pesquisa" value="Pesquisar" class="botao">
              </form>
              <?php
                   if (isset($_POST["pesquisa"]) and $_POST["pesquisa"]) {
                      $cod_comunidade = $_POST["cod_comunidade"];
                      $data_inicial = converte_data($_POST["data_inicial"]);
                      $data_final = converte_data($_POST["data_final"]);
                      
                      echo"
                           Clique para imprimir -->
                           <a href=\"imprimir_relatorio_comunidade.php?cod_comunidade=$cod_comunidade&data_inicial=$data_inicial&data_final=$data_final\" target=\"_blank\">
                           <img src=\"images/imprimir.jpg\" width=\"22\" height=\"24\" border=\"0\">
                           </a>
                      ";
                   }
              ?>
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


