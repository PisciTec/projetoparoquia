<?php
    include "abreconexao.php";
    
        $consulta = "select codigo, nome, endereco, bairro, estado, cep from canta_reza_pessoa where motivo = '1'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <html>
        <head>
        <title>SISTEMA CANTA E REZA</title>

        </head>
        <body>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"640\">
               <tr>
                      <td colspan=\"3\" height=\"70\">
                           teste
                      </td>
               </tr>
        ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["codigo"];
                  $nome = $linha["nome"];
                  $endereco = $linha["endereco"];
                  $bairro = $linha["bairro"];
                  $estado = $linha["estado"];
                  $cep = $linha["cep"];
                  echo "
                  <tr>
                      <td width=\"305\" height=\"80\">
                          $nome<br>
                          $endereco<br>
                          $bairro, $estado<br>
                          $cep
                      </td>
                      <td width=\"30\" height=\"80\">
                            &nbsp;
                      </td>
                  ";
                      $linha = mysql_fetch_array($resposta);
                      $codigo = $linha["codigo"];
                      $nome = $linha["nome"];
                      $endereco = $linha["endereco"];
                      $bairro = $linha["bairro"];
                      $estado = $linha["estado"];
                      $cep = $linha["cep"];
                  echo "
                      <td width=\"305\" height=\"80\">
                          $nome<br>
                          $endereco<br>
                          $bairro, $estado<br>
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
