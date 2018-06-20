<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Consulta Total de Casamentos</h3>
            <br>
    ";
        $consulta = "select casnumero, caslocal, casdata, casnomee, casnomea from casamen";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrados: $total</b>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\" width=\"10%\"><b>Número</b></td>
                  <td class=\"td3\" width=\"40%\"><b>Local</b></td>
                  <td class=\"td3\" width=\"15%\"><b>Data</b></td>
                  <td class=\"td3\" width=\"15%\"><b>Noivo</b></td>
                  <td class=\"td3\" width=\"20%\"><b>Noiva</b></td>
              </tr>
        </table>
        <div id=\"scroll\">
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"600\" class=\"tabela_formatada\">
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $casnumero = $linha["casnumero"];
                  $caslocal = $linha["caslocal"];
                  $casdata = $linha["casdata"];
                  $casnomee = $linha["casnomee"];
                  $casnomea = $linha["casnomea"];
                  echo "
                  <tr>
                      <td class=\"td2\" width=\"10%\">$casnumero</td>
                      <td class=\"td2\" width=\"40%\">$caslocal</td>
                      <td class=\"td2\" width=\"15%\">$casdata</td>
                      <td class=\"td2\" width=\"15%\">$casnomee</td>
                      <td class=\"td2\" width=\"20%\">$casnomea</td>
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
