<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Fun��o para validar formulario e verificar se esta entrando com dados em branco

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Consulta Total de Clientes</h3>
            <br>
    ";
        $valores_ativo = array("Inativo","Ativo");
        $consulta = "select codcliente, nome, cgccpf, cgfrg, ativo from jornal_cliente";
        $resposta = mysql_query($consulta, $conectar) or die ("N�o foi poss�vel realizar a consulta de cliente!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\" width=\"10%\"><b>Cod.</b></td>
                  <td class=\"td3\" width=\"40%\"><b>Nome Cliente</b></td>
                  <td class=\"td3\" width=\"15%\"><b>CPF</b></td>
                  <td class=\"td3\" width=\"15%\"><b>RG</b></td>
                  <td class=\"td3\" width=\"20%\"><b>Situa��o</b></td>
              </tr>
        </table>
        <div id=\"scroll\">
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"600\" class=\"tabela_formatada\">
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["codcliente"];
                  $nome = $linha["nome"];
                  $cpf = $linha["cgccpf"];
                  $rg = $linha["cgfrg"];
                  $ativo = $valores_ativo[$linha[ativo]];
                  echo "
                  <tr>
                      <td class=\"td2\" width=\"10%\">$codigo</td>
                      <td class=\"td2\" width=\"40%\">$nome</td>
                      <td class=\"td2\" width=\"15%\">$cpf</td>
                      <td class=\"td2\" width=\"15%\">$rg</td>
                      <td class=\"td2\" width=\"20%\">$ativo</td>
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
