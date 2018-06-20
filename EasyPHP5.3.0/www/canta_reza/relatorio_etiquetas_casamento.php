<?php
    include "abreconexao.php";
    
    echo"
    <html>
          <head>
                <title>SISTEMA CANTA E REZA</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>

          <body>
      ";
    
        $consulta = "select codigo, nome, endereco, cep, estado, cidade from canta_reza_pessoa where motivo = '1' and (datacasa like '____-$_GET[mes]-__')";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"600\">
        ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["codigo"];
                  $nome = $linha["nome"];
                  $endereco = $linha["endereco"];
                  $cep = $linha["cep"];
                  $cidade = $linha["cidade"];
                  $estado = $linha["estado"];
                  echo "
                  <tr>
                      <td width=\"48%\" height=\"70\">
                          $nome<br>
                          $endereco<br>
                          $cidade, $estado<br>
                          $cep
                      </td>
                      <td width=\"4%\" height=\"70\">
                            &nbsp;
                      </td>
                  ";
                      $linha = mysql_fetch_array($resposta);
                      $codigo = $linha["codigo"];
                      $nome = $linha["nome"];
                      $endereco = $linha["endereco"];
                      $cep = $linha["cep"];
                      $cidade = $linha["cidade"];
                      $estado = $linha["estado"];
                  echo "
                      <td width=\"48%\" height=\"70\">
                          $nome<br>
                          $endereco<br>
                          $cidade, $estado<br>
                          $cep
                      </td>
                  </tr>
                  <tr>
                      <td colspan=\"3\" height=\"5\">
                           &nbsp;
                      </td>
                  </tr>
                  ";
          }
          echo "
        </table>
    </body>
    </html>
    ";
?>
