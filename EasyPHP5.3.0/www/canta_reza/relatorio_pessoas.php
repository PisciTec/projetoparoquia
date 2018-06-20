<?php
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco

    echo"
            <html>
            <head>
                  <title>SISTEMA CANTA E REZA</title>
                  <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
            </head>
            <body>
            <h3>Relatório Total de Pessoas</h3>
            <br>
    ";
        $consulta = "select codigo, nome, mae, pai, endereco from canta_reza_pessoa where motivo = '1'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <center>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" width=\"600\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\" width=\"5%\"><b>Cód.</b></td>
                  <td class=\"td3\" width=\"30%\"><b>Nome Pessoa</b></td>
                  <td class=\"td3\" width=\"35%\"><b>Mãe</b></td>
                  <td class=\"td3\" width=\"30%\"><b>Endereço</b></td>
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["codigo"];
                  $nome = $linha["nome"];
                  $mae = $linha["mae"];
                  $endereco = $linha["endereco"];
                  echo "
                  <tr>
                      <td class=\"td2\">$codigo</td>
                      <td class=\"td2\">$nome</td>
                      <td class=\"td2\">$mae</td>
                      <td class=\"td2\">$endereco</td>
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
