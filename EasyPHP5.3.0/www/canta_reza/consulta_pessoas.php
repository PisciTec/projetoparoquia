<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Consulta Total de Pessoas</h3>
            <br>
    ";
        $consulta = "select codigo, nome, mae, pai, endereco from canta_reza_pessoa where motivo = '1'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <br>
        Click na impressora para gerar relatório <a href=\"relatorio_pessoas.php\" target=\"_blank\"><img src=\"img/impressora.gif\" width=\"40\" height=\"30\" border=\"0\"></a>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\" width=\"35%\"><b>Nome Pessoa</b></td>
                  <td class=\"td3\" width=\"35%\"><b>Mãe</b></td>
                  <td class=\"td3\" width=\"30%\"><b>Endereço</b></td>
              </tr>
        </table>
        <div id=\"scroll\">
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"600\" class=\"tabela_formatada\">
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["codigo"];
                  $nome = $linha["nome"];
                  $mae = $linha["mae"];
                  $endereco = $linha["endereco"];
                  echo "
                  <tr>
                      <td class=\"td2\">$nome</td>
                      <td class=\"td2\">$mae</td>
                      <td class=\"td2\">$endereco</td>
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
