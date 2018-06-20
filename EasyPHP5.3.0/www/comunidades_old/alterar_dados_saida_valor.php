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
   $cod_saida = $_POST["cod_saida"];
   $cod_comunidade = $_POST["cod_comunidade"];
   $data_saida = converte_data($_POST["data_saida"]);
   $valor = str_replace(",", ".", $_POST["valor"]);
   $valor_anterior = str_replace(",", ".", $_POST["valor_anterior"]);
   
   $atualiza = "update comunidade_saida set cod_comunidade = '$cod_comunidade', data_saida = '$data_saida', valor = '$valor'
               where cod_saida = '$cod_saida'";
   mysql_query($atualiza) or die ("Não foi possível atualizar dados de saida de valor");
   echo "
       <script language=\"JavaScript\">
             window.alert('Saida de valor atualizado com sucesso');
             window.location.href='saida_valores.php';
       </script>
   ";
   
   // Calculo de saldo
   $consulta = "select * from comunidade where cod_comunidade = '$cod_comunidade'";
   $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados da comunidade");
   $linha = mysql_fetch_array($resposta);
   $saldo = $linha["saldo"];

   $saldo = $saldo + $valor_anterior - $valor;

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
               <h3>Alteração de Dados de Saída de Valor</h3>
               <?php
               $cod_saida = $_GET["cod_saida"];
               $consulta = "select * from comunidade_saida where cod_saida = '$cod_saida'";
               $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados de saida de valor");
               $linha = mysql_fetch_array($resposta);
               $cod_comunidade = $linha["cod_comunidade"];
               $data_saida = converte_data($linha["data_saida"]);
               $valor = number_format($linha["valor"], 2, ',','');
               ?>
               <form action="alterar_dados_saida_valor.php" method="post">
                     <input type="hidden" name="cod_saida" value="<?php echo $cod_saida; ?>">
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
                     <input type="text" name="data_saida" value="<?php echo $data_saida; ?>" size="13" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####">
                     <br>
                     <label>Valor:</label>
                     <input type="text" name="valor" value="<?php echo $valor; ?>" size="10" class="campos">
                     <br>
                     <input type="submit" name="cadastro" value="Salvar" class="botao">
                     &nbsp;
                     <input type="button" value="Cancelar" class="botao" onclick="window.location.href='saida_valores.php';">
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


