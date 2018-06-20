<?php

    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco

    echo"
            <html>
          <head>
                <title>CONTROLE DE ROMARIA</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>
          <body>
            <h4>Relatório das Romarias</h4>
            <br>
    ";
        $consulta = "select * from tab_romaria";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"2\" cellspacing=\"1\" width=\"800\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td4\"><b>Cod.</b></td>
                  <td class=\"td4\"><b>Fretante</b></td>
                  <td class=\"td4\"><b>Endereço</b></td>
                  <td class=\"td4\"><b>Cidade</b></td>
                  <td class=\"td4\"><b>Estado</b></td>
                  <td class=\"td4\"><b>Paroquia</b></td>
                  <td class=\"td4\"><b>Vigario</b></td>
                  <td class=\"td4\"><b>Data romaria</b></td>
                  <td class=\"td4\"><b>Nº veiculos</b></td>
                  <td class=\"td4\"><b>Nº romeiros</b></td>
                  <td class=\"td4\"><b>Rancho</b></td>
              </tr> ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["cod_romaria"];
                  $fretante = $linha["fretante"];
                  $endereco = $linha["endereco"];
                  $cidade = $linha["cidade"];
                  $estado = $linha["estado"];
                  $paroquias = $linha["paroquias"];
                  $vigarios = $linha["vigarios"];
                  $data_romaria = converte_data($linha["data_romaria"]);
                  $num_veiculos = $linha["num_viculos"];
                  $num_romeiros = $linha["num_romeiros"];
                  $ranchos = $linha["ranchos"];
                  echo "
                  <tr>
                      <td class=\"td2\">$codigo</td>
                      <td class=\"td2\">$fretante</td>
                      <td class=\"td2\">$endereco</td>
                      <td class=\"td2\">$cidade</td>
                      <td class=\"td2\">$estado</td>
                      <td class=\"td2\">$paroquias</td>
                      <td class=\"td2\">$vigarios</td>
                      <td class=\"td2\">$data_romaria</td>
                      <td class=\"td2\">$num_veiculos</td>
                      <td class=\"td2\">$num_romeiros</td>
                      <td class=\"td2\">$ranchos</td>
                  </tr>
                  ";
          }
          echo "
        </table>
        </body>
        </html>
        ";
?>
