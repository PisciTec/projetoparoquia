<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Consulta a Todas as Romarias</h3>
            <br>
    ";
        $consulta = "select cod_romaria, fretante,endereco, cidade, estado from tab_romaria";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\" width=\"10%\"><b>Cod.</b></td>
                  <td class=\"td3\" width=\"40%\"><b>Fretante</b></td>
                  <td class=\"td3\" width=\"15%\"><b>Endereço</b></td>
                  <td class=\"td3\" width=\"15%\"><b>Cidade</b></td>
                  <td class=\"td3\" width=\"20%\"><b>Estado</b></td>
              </tr>
        </table>
        <div id=\"scroll\">
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"600\" class=\"tabela_formatada\">
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["cod_romaria"];
                  $fretante = $linha["fretante"];
                  $endereco = $linha["endereco"];
                  $cidade = $linha["cidade"];
                  $estado = $linha["estado"];
                  echo "
                  <tr>
                      <td class=\"td2\" width=\"10%\">$codigo</td>
                      <td class=\"td2\" width=\"40%\">$fretante</td>
                      <td class=\"td2\" width=\"15%\">$endereco</td>
                      <td class=\"td2\" width=\"15%\">$cidade</td>
                      <td class=\"td2\" width=\"20%\">$estado</td>
                  </tr>
                  ";
          }
          echo "
        </table>
        </div>
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
