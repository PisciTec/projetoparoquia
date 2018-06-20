<?php

    include "abreconexao.php";
    include "funcoes.inc";

    echo"
            <html>
            <head>
                  <title>CONTROLE DE DÍZIMO</title>
                  <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
            </head>
            <body>
            <h3>Relatório Aniversariantes por Mês</h3>
            <br>
    ";
        $mes = $_GET[mes];
        $consulta = "select codigo, nome, mae, nascto, dia, endereco from dizimo where (nascto like '$mes') and (motivo = '1') order by dia asc";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <center>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" width=\"700\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\"><b>Nome Pessoa</b></td>                  
                  <td class=\"td3\"><b>Endereço</b></td>
                  <td class=\"td3\"><b>Dia</b></td>
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["codigo"];
                  $nome = $linha["nome"];
                  $mae = $linha["mae"];
                  $data = converte_data($linha["nascto"]);
                  $endereco = $linha["endereco"];
                  $dia = $linha["dia"];
                  echo "
                  <tr>
                      <td class=\"td2\">$nome</td>                     
                      <td class=\"td2\">$endereco</td>
                      <td class=\"td2\">$dia</td>
                  </tr>
                  ";
          }
          echo "
        </table>
        </center>
        </body>
        </html>
        ";

?>
