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
        $valores_ativo = array("Inativo","Ativo");
        $consulta = "select cod_pessoa_jornal, nome_pessoa, cpf, rg, ativo from tab_pessoa_jornal where excluido='0'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\" width=\"10%\"><b>Cod.</b></td>
                  <td class=\"td3\" width=\"40%\"><b>Nome Pessoa</b></td>
                  <td class=\"td3\" width=\"15%\"><b>CPF</b></td>
                  <td class=\"td3\" width=\"15%\"><b>RG</b></td>
                  <td class=\"td3\" width=\"20%\"><b>Situação</b></td>
              </tr>
        </table>
        <div id=\"scroll\">
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"600\" class=\"tabela_formatada\">
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["cod_pessoa_jornal"];
                  $nome = $linha["nome_pessoa"];
                  $cpf = $linha["cpf"];
                  $rg = $linha["rg"];
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
