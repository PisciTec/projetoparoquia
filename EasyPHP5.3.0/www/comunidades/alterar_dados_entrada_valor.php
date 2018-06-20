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
// ### Fim da verificação do usuário############################

if (isset($_POST["cadastro"]) and $_POST["cadastro"]) {
   $cod_entrada = $_POST["cod_entrada"];
   $cod_comunidade = $_POST["cod_comunidade"];
   $data_entrada = converte_data($_POST["data_entrada"]);
   $valor = str_replace(",", ".", $_POST["valor"]);
   $valor_anterior = str_replace(",", ".", $_POST["valor_anterior"]);

   $atualiza = "update comunidade_entrada set cod_comunidade = '$cod_comunidade', data_entrada = '$data_entrada', valor = '$valor'
               where cod_entrada = '$cod_entrada'";
   mysql_query($atualiza) or die ("Não foi possível atualizar dados de entrada de valor");
   echo "
       <script language=\"JavaScript\">
             window.alert('Entrada de valor atualizado com sucesso');
             window.location.href='entrada_valores.php';
       </script>
   ";
   
   // Calculo de saldo
   $consulta = "select * from comunidade where cod_comunidade = '$cod_comunidade'";
   $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados da comunidade");
   $linha = mysql_fetch_array($resposta);
   $saldo = $linha["saldo"];

   $saldo = $saldo - $valor_anterior + $valor;

   $atualiza = "update comunidade set saldo = '$saldo' where cod_comunidade = '$cod_comunidade'";
   mysql_query($atualiza) or die ("Não foi possivel atualizar dados do saldo da comunidade");
   // -- Fim do calculo de saldo
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
               <h2>Comunidades</h2>
           </td>
       </tr>
       <tr>
           <td bgcolor="#ffffff" height="500" valign="top">
               <h3>Alteração de Dados de Entrada de Valor</h3>
               <?php
               $cod_entrada = $_GET["cod_entrada"];
               $consulta = "select * from comunidade_entrada where cod_entrada = '$cod_entrada'";
               $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados de entrada de valor");
               $linha = mysql_fetch_array($resposta);
               $cod_comunidade = $linha["cod_comunidade"];
               $data_entrada = converte_data($linha["data_entrada"]);
               $valor = number_format($linha["valor"], 2, ',','');
               ?>
               <form action="alterar_dados_entrada_valor.php" method="post">
                     <input type="hidden" name="cod_entrada" value="<?php echo $cod_entrada; ?>">
                     <input type="hidden" name="valor_anterior" value="<?php echo $valor; ?>">
                     <label>Nome da Comunidade:</label>
                     <select name="cod_comunidade" class="campos">
                             <?php
                                  $consulta = "select * from comunidade order by nome_comunidade asc";
                                  $resposta = mysql_query($consulta) or die ("Não foi possivel consultar dados da comunidade");
                                  while ($linha = mysql_fetch_array($resposta)) {
                                        if ($linha["cod_comunidade"] == $cod_comunidade) {
                                           echo "
                                                <option value=\"$linha[cod_comunidade]\" selected>$linha[nome_comunidade]</option>
                                           ";
                                        }
                                        else {
                                            echo "
                                                <option value=\"$linha[cod_comunidade]\">$linha[nome_comunidade]</option>
                                           ";
                                        }
                                  }
                             ?>
                     </select
                     <br>
                     <label>Data:</label>
                     <input type="text" name="data_entrada" value="<?php echo $data_entrada; ?>" size="13" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####">
                     <br>
                     <label>Valor:</label>
                     <input type="text" name="valor" value="<?php echo $valor; ?>" size="10" class="campos">
                     <br>
                     <input type="submit" name="cadastro" value="Salvar" class="botao">
                     &nbsp;
                     <input type="button" value="Cancelar" class="botao" onclick="window.location.href='entrada_valores.php';">
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


