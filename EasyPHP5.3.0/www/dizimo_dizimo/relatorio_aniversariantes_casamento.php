<?php

    include "abreconexao.php";
    include "funcoes.inc";

    echo"
            <html>
            <head>
                  <title>CONTROLE DE D�ZIMO</title>
                  <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
            </head>
            <body>
            <h3>Relat�rio Aniversariantes de Casamento</h3>
            <br>
    ";
        $mes = $_GET[mes];
        $consulta = "select codigo, nome, conjuge, mae, nascto, datacasa, endereco, dia_casamento from dizimo where (datacasa like '$mes') and (motivo = '1') order by dia_casamento asc";
        $resposta = mysql_query($consulta, $conectar) or die ("N�o foi poss�vel realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <center>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" width=\"700\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\"><b>Nome Pessoa</b></td>
                  <td class=\"td3\"><b>Conjuge</b></td>
                  <td class=\"td3\"><b>Endere�o</b></td>
                  <td class=\"td3\"><b>Dia Casamento</b></td>
		  <td class=\"td3\"><b>Anos Casados</b></td>
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["codigo"];
                  $nome = $linha["nome"];
                  $conjuge = $linha["conjuge"];
                  $data = $linha["datacasa"];
                  $endereco = $linha["endereco"];
                  $dia_casamento = $linha["dia_casamento"];
		  $data2 = strtotime($data);
                  $data1 = time();
                  $anos = round(($data1 - $data2)/86400/365);
                  echo "
                  <tr>
                      <td class=\"td2\">$nome</td>
                      <td class=\"td2\">$conjuge</td>
                      <td class=\"td2\">$endereco</td>
                      <td class=\"td2\">$dia_casamento</td>
		      <td class=\"td2\">$anos</td>
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
