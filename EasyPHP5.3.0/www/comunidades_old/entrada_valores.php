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
   $data_entrada = converte_data($_POST["data_entrada"]);
   $valor = str_replace(",", ".", $_POST["valor"]);

   $inserir = "insert into comunidade_entrada (cod_comunidade, data_entrada, valor) values ('$cod_comunidade', '$data_entrada', '$valor')";
   mysql_query($inserir) or die ("Não foi possível inserir dados de entrada de valor");
   echo "
       <script language=\"JavaScript\">
           window.alert('Dados salvos com sucesso!');
       </script>
   ";
   // Calculo de saldo
   $consulta = "select * from comunidade where cod_comunidade = '$cod_comunidade'";
   $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados da comunidade");
   $linha = mysql_fetch_array($resposta);
   $saldo = $linha["saldo"];
   
   $saldo = $saldo + $valor;
   
   $atualiza = "update comunidade set saldo = '$saldo' where cod_comunidade = '$cod_comunidade'";
   mysql_query($atualiza) or die ("Não foi possivel atualizar dados do saldo da comunidade");
   // -- Fim do calculo de saldo
}

if (isset($_GET["acao"]) and $_GET["acao"] == "excluir") {
      $cod_entrada = $_GET["cod_entrada"];
      $cod_comunidade = $_GET["cod_comunidade"];
      $valor = $_GET["valor"];
      $excluir = "delete from comunidade_entrada where cod_entrada = '$cod_entrada'";
      mysql_query($excluir) or die ("Não foi possível excluir dados da comunidade");
      echo "
           <script language=\"JavaScript\">
                   window.alert('Comunidade excluída com sucesso!');
           </script>
      ";
      
      // Calculo de saldo
      $consulta = "select * from comunidade where cod_comunidade = '$cod_comunidade'";
      $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados da comunidade");
      $linha = mysql_fetch_array($resposta);
      $saldo = $linha["saldo"];

      $saldo = $saldo - $valor;

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
           <td bgcolor="#A4BFD2" height="70" align="center">
               <span style="font-family: tahoma, verdana; font-size: 18pt; text-align: center;">Comunidades</h2>
           </td>
       </tr>
       <tr>
           <td bgcolor="#ffffff" height="500" valign="top">
               <h3>Entrada de Valores</h3>
               <form method="post" action="entrada_valores.php">
                     <label>Nome da Comunidade:</label>
                     <select name="cod_comunidade" class="campos">
                             <?php
                                  $consulta = "select * from comunidade order by nome_comunidade asc";
                                  $resposta = mysql_query($consulta) or die ("Não foi possivel consultar dados da comunidade");
                                  while ($linha = mysql_fetch_array($resposta)) {
                                        echo "
                                             <option value=\"$linha[cod_comunidade]\">$linha[nome_comunidade]</option>
                                        ";
                                  }
                             ?>
                     </select
                     <br>
                     <label>Data:</label>
                     <input type="text" name="data_entrada" value="<?php echo date("d/m/Y"); ?>" size="13" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####">
                     <br>
                     <label>Valor:</label>
                     <input type="text" name="valor" size="10" class="campos">
                     <br>
                     <input type="submit" name="cadastro" value="Salvar" class="botao">
                     &nbsp;
                     <input type="button" value="Cancelar" class="botao" onclick="window.location.href='principal.php';">
               </form>
               <center>
               <h3>Últimas Entradas de Valores</h3>
               <div id="scroll_menor">

                    <table border="0" cellpadding="1" cellspacing="1" bgcolor="#000000" width="95%">
                           <tr>
                               <th>Comunidade</th>
                               <th width="10%">Data</th>
                               <th width="10%">Valor</th>
                               <th width="10%">Ação</th>
                           </tr>
                    <?php
                         $consulta = "select * from comunidade_entrada a inner join comunidade b where a.cod_comunidade = b.cod_comunidade order by b.nome_comunidade asc";
                         $resposta = mysql_query($consulta) or die ("Não foi possível consultar as comunidades");
                         while ($linha = mysql_fetch_array($resposta)){
                               $data_entrada = converte_data($linha["data_entrada"]);
                               $valor = number_format($linha["valor"], 2, ',', '.');
                               echo "
                                    <tr>
                                        <td bgcolor=\"#ffffff\">$linha[nome_comunidade]</td>
                                        <td bgcolor=\"#ffffff\">$data_entrada</td>
                                        <td bgcolor=\"#ffffff\" align=\"right\">$valor</td>
                                        <td bgcolor=\"#ffffff\" align=\"center\">
                                              <input type=\"image\" src=\"images/editar.jpg\" alt=\"Editar\" value=\"Editar\" onclick=\"window.location.href='alterar_dados_entrada_valor.php?cod_entrada=$linha[cod_entrada]';\">
                                              <input type=\"image\" src=\"images/excluir.jpg\" alt=\"Excluir\" value=\"Excluir\" onclick=\"if (confirm('Tem certeza que deseja excluir a entrada de valor')){ window.location.href='entrada_valores.php?cod_entrada=$linha[cod_entrada]&cod_comunidade=$linha[cod_comunidade]&valor=$linha[valor]&acao=excluir'; }\">
                                        </td>
                               ";
                         }
                    ?>
                    </table>
               </div>
               <input type="button" value="Voltar" class="botao" onclick="window.location.href='principal.php';">
               </center>
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


