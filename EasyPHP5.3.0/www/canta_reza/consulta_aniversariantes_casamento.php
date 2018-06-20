<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['mes'].value == ''){
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
            <h3>Consulta de Aniversariantes de Casamento</h3>
            <br>
            <b>Pesquisa por mês</b>
            <br>
            <form method=\"post\" action=\"consulta_aniversariantes_casamento.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         <tr>
                             <td class=\"td1\">
                                 <b>Mês de pesquisa:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"mes\" size=\"2\" maxlength=\"2\" class=\"field_textbox\">
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

        $mes = "_____".$_POST[mes]."___";

        $consulta = "select codigo, nome, conjuge, mae, nascto, datacasa, endereco, dia_casamento from canta_reza_pessoa where (datacasa like '$mes') and (motivo = '1') order by dia_casamento asc";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <br>
        Click na impressora para gerar relatório <a href=\"relatorio_aniversariantes_casamento.php?mes=$mes\" target=\"_blank\"><img src=\"img/impressora.gif\" width=\"40\" height=\"30\" border=\"0\"></a>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\" width=\"40%\"><b>Nome Pessoa</b></td>
                  <td class=\"td3\" width=\"40%\"><b>Conjuge</b></td>
                  <td class=\"td3\" width=\"10%\"><b>Dia Casamento</b></td>
                  <td class=\"td3\" width=\"10%\"><b>Anos casados</b></td>
              </tr>
        </table>
        <div id=\"scroll\">
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"590\" class=\"tabela_formatada\">
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["codigo"];
                  $nome = $linha["nome"];
                  $conjuge = $linha["conjuge"];
                  $data = $linha["datacasa"];
                  $dia_casamento = $linha["dia_casamento"];
                  $data_final = date("Y-m-d");
                  $data1 = strtotime($data_final);
                  $data2 = strtotime($data);
                  $anos = $data1 - $data2;

                  echo "
                  <tr>
                      <td class=\"td2\" width=\"40%\">$nome</td>
                      <td class=\"td2\" width=\"40%\">$conjuge</td>
                      <td bgcolor=\"#ffffff\" width=\"10%\" align=\"center\">$dia_casamento</td>
                      <td bgcolor=\"#ffffff\" width=\"10%\" align=\"center\">$anos</td>
                  </tr>
                  ";
          }
          echo "
        </table>
        </div>
        ";
        }
        echo "
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
