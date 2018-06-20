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
<title>Controle de Pagamentos</title>
<link rel="stylesheet" type="text/css" href="estilo_novo.css">
<script language="JavaScript" src="js/funcao_mascara.js" type="text/javascript"></script>
<head>

<body onLoad="Mascaras.carregar();">
               <h3>Relatório por Período de Pagamento</h3>
                    <table border="0" cellpadding="1" cellspacing="1" class="table_formatada" width="90%">
                           <tr>
                               <td bgcolor="#c0c0c0" width="75%">Nome</td>
                               <td bgcolor="#c0c0c0" width="5%">Data</td>
                               <td bgcolor="#c0c0c0" width="10%">Valor</td>
                           </tr>
                           <?php
                              $data_inicial = $_GET["data_inicial"];
                              $data_final = $_GET["data_final"];
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
                                      </tr>
                                 ";
                                 $total = $total + $linha["valor"];
                              }
                              $total_novo = number_format($total, 2, ',','');
                              echo "
                              <tr>
                                  <td bgcolor=\"#c0c0c0\" colspan=\"2\"><b>Total:</b></td>
                                  <td bgcolor=\"#ffffff\" align=\"right\"><b>$total_novo</b></td>
                              </tr>
                              ";
                           ?>
                    </table>
</body>

</html>


