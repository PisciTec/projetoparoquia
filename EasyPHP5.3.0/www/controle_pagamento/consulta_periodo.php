<?php
include "abreconexao.php";
include "funcoes.inc";

if (isset($_GET["acao"]) and $_GET["acao"] == "excluir") {
   $cod_pagamento = $_GET["cod_pagamento"];
   $deleta = "delete from pagamento where cod_pagamento = '$cod_pagamento'";
   mysql_query($deleta) or die ("Não foi possivel excluir dados de pagamento");
   echo "
       <script language=\"JavaScript\">
            window.alert('Pagamento excluído com sucesso!');
       </script>
   ";
}
?>

<html>
<head>
<title>Controle de Pagamentos</title>
<link rel="stylesheet" type="text/css" href="estilo_novo.css">
<script language="JavaScript" src="js/funcao_mascara.js" type="text/javascript"></script>
<head>

<body onLoad="Mascaras.carregar();">

<table border="0" cellpadding="1" cellspacing="1" class="table_formatada" width="700" height="600">
       <tr>
           <td bgcolor="#c0c0c0" height="70" align="center">
               <h2>Controle de Pagamentos</h2>
           </td>
       </tr>
       <tr>
           <td bgcolor="#ffffff" height="500" valign="top">
               <h3>Consulta por Período</h3>
               <form action="consulta_periodo.php" method="post">
                     <label>Período:</label>
                     <input type="text" name="data_inicial" size="13" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####">
                     &nbsp;
                     a
                     &nbsp;
                     <input type="text" name="data_final" size="13" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####">
                     <br>
                     <input type="submit" name="pesquisa" value="Pesquisar" class="botao">
                     &nbsp;
                     <input type="button" value="Voltar" class="botao" onclick="window.location.href='index.php';">
               </form>
               <br>
               <h3>Lista dos Pagamentos</h3>
               <div id="scroll_menor">
                    <table border="0" cellpadding="1" cellspacing="1" class="table_formatada" width="95%">
                           <tr>
                               <td bgcolor="#c0c0c0" width="70%">Nome</td>
                               <td bgcolor="#c0c0c0" width="5%">Data</td>
                               <td bgcolor="#c0c0c0" width="10%">Valor</td>
                               <td bgcolor="#c0c0c0" width="15%">Ação</td>
                           </tr>
                           <?php
                           if (isset($_POST["pesquisa"]) and $_POST["pesquisa"] or isset($_GET["forcar"]) and $_GET["forcar"] == 1) {

                              if (isset($_GET["data_inicial"]) and $_GET["data_final"]) {
                                 $data_inicial = $_GET["data_inicial"];
                                 $data_final = $_GET["data_final"];
                              }
                              else {
                                 $data_inicial = converte_data($_POST["data_inicial"]);
                                 $data_final = converte_data($_POST["data_final"]);
                              }
                              $consulta = "select * from pagamento where data between '$data_inicial' and '$data_final' order by data desc";
                              $resposta = mysql_query($consulta)  or die ("Não foi possível realizar consulta de pagemento");
                              $total = 0;
                              while ($linha = mysql_fetch_array($resposta)) {
                                 $data = converte_data($linha["data"]);
                                 $valor = number_format($linha["valor"], 2, ',','');
                                 echo "
                                      <tr>
                                          <td bgcolor=\"#ffffff\">$linha[nome]</td>
                                          <td bgcolor=\"#ffffff\">$data</td>
                                          <td bgcolor=\"#ffffff\" align=\"right\">$valor</td>
                                          <td bgcolor=\"#ffffff\" align=\"center\">
                                              <input type=\"image\" src=\"images/editar.jpg\" alt=\"Editar\" value=\"Editar\" onclick=\"window.location.href='alterar_dados_pagamento.php?cod_pagamento=$linha[cod_pagamento]';\">
                                              <input type=\"image\" src=\"images/excluir.jpg\" alt=\"Excluir\" value=\"Excluir\" onclick=\"if (confirm('Tem certeza que deseja excluir o pagamento')){ window.location.href='consulta_periodo.php?cod_pagamento=$linha[cod_pagamento]&acao=excluir&forcar=1&data_inicial=$data_inicial&data_final=$data_final'; }\">
                                          </td>
                                      </tr>
                                 ";
                                 $total = $total + $linha["valor"];
                              }
                              $total_novo = number_format($total, 2, ',','');
                              echo "
                              <tr>
                                  <td bgcolor=\"#c0c0c0\" colspan=\"2\"><b>Total:</b></td>
                                  <td bgcolor=\"#ffffff\" align=\"right\"><b>$total_novo</b></td>
                                  <td bgcolor=\"#ffffff\" align=\"right\"></td>
                              </tr>
                              ";
                           }
                           ?>
                    </table>
               </div>
               <b>Clique aqui para imprimir o relatório</b> -->
               <a href="relatorio_periodo.php?data_inicial=<?php echo $data_inicial; ?>&data_final=<?php echo $data_final; ?>" target="_blank">
               <img src="images/imprimir.jpg" border="0">
               </a>
           </td>
       </tr>
       <tr>
           <td bgcolor="#c0c0c0" height="30" align="center">
               Canta e Reza.
           </td>
       </tr>
</table>

</body>

</html>


