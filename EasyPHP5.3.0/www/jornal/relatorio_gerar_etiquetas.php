<?php
    include "abreconexao.php";
    
    echo"
    <html>
          <head>
                <title>SISTEMA DE JORNAL</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>
          
          <body>
      ";
    
        $consulta = "select * from jornal_cliente inner join jornal_cidade where ativo='1' and (jornal_cliente.cidade = jornal_cidade.cidcod)";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de cliente!");
        $total = mysql_num_rows($resposta);
        echo "
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"600\">
        ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["CODCLIENTE"];
                  $nome = $linha["NOME"];
                  $endereco = $linha["ENDERECO"];
                  $ciddes = $linha["CIDDES"];
                  $ciduf = $linha["CIDUF"];
                  $cep = $linha["CEP"];
                  echo "
                  <tr>
                      <td width=\"48%\" height=\"70\">
                          $nome<br>
                          $endereco<br>
                          $ciddes, $ciduf<br>
                          $cep
                      </td>
                      <td width=\"4%\" height=\"70\">
                            &nbsp;
                      </td>
                  ";
                  $linha = mysql_fetch_array($resposta);
                  $codigo = $linha["CODCLIENTE"];
                  $nome = $linha["NOME"];
                  $endereco = $linha["ENDERECO"];
                  $ciddes = $linha["CIDDES"];
                  $ciduf = $linha["CIDUF"];
                  $cep = $linha["CEP"];
                  echo "
                      <td width=\"48%\" height=\"70\">
                          $nome<br>
                          $endereco<br>
                          $ciddes, $ciduf<br>
                          $cep
                      </td>
                  </tr>
                  <tr>
                      <td colspan=\"3\" height=\"10\">
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
