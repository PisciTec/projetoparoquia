<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['data_inicial'].value == ''){
                          alert('Informe mes de pesquisa!');
                          return false;
                       }
                       if (document.form_cadastro['data_final'].value == ''){
                          alert('Informe mes de pesquisa!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";
    
    echo "
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Consulta de Contribuicao por Período</h3>
            <br>
            <b>Pesquisa por Período</b>
            <br>
            <form method=\"post\" action=\"consulta_contribuicao_periodo.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Inicial:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"data_inicial\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Final:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"data_final\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td2\" colspan=\"2\">
                                 <input type=\"submit\" value=\"Consultar\" name=\"consulta\" class=\"botao_ok\">
                             </td>
                         </tr>
                   </table>
            </form>
            <br>
    ";
      if (isset($_POST["consulta"]) and ($_POST["consulta"])) {

        $data_inicial = converte_data($_POST["data_inicial"]);
        $data_final = converte_data($_POST["data_final"]);
        $consulta = "select sum(valor) as valor from canta_reza_pagamento where data between '$data_inicial' AND '$data_final'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de valores!");
        $linha = mysql_fetch_array($resposta);
        $valor = $linha["valor"];
        echo "
             <h4>Resumo de arrecadação</h4>
             <b>Período pesquisado:</b> $_POST[data_inicial] à $_POST[data_final]<br>
             Valor arrecado no período foi de <b>".$valor."</b> reais
             <br>
             Click na impressora para gerar relatório <a href=\"relatorio_contribuicao_periodo.php?data_inicial=$data_inicial&data_final=$data_final\" target=\"_blank\"><img src=\"img/impressora.gif\" width=\"40\" height=\"30\" border=\"0\"></a>
             ";
      }
        echo "
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
