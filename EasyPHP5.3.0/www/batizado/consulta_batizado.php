<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Consulta Total de Batizados</h3>
            <br>
    ";
        $consulta = "select codbatismo, batnumero, batlocal, batdata, batnome, batmae from batismo";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de batismo!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrados: $total</b>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\" width=\"10%\"><b>Cod.</b></td>
                  <td class=\"td3\" width=\"40%\"><b>Local</b></td>
                  <td class=\"td3\" width=\"15%\"><b>Data</b></td>
                  <td class=\"td3\" width=\"15%\"><b>Batizado</b></td>
                  <td class=\"td3\" width=\"20%\"><b>Mãe</b></td>
              </tr>
        </table>
        <div id=\"scroll\">
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"600\" class=\"tabela_formatada\">
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["codbatismo"];
                  $batnumero = $linha["batnumero"];
                  $batlocal = $linha["batlocal"];
                  $batdata = $linha["batdata"];
                  $batnome = $linha["batnome"];
                  $batmae = $linha["batmae"];
                  echo "
                  <tr>
                      <td class=\"td2\" width=\"10%\">$codigo</td>
                      <td class=\"td2\" width=\"40%\">$batlocal</td>
                      <td class=\"td2\" width=\"15%\">$batdata</td>
                      <td class=\"td2\" width=\"15%\">$batnome</td>
                      <td class=\"td2\" width=\"20%\">$batmae</td>
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
