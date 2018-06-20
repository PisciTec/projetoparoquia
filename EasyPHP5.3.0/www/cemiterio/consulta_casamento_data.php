<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['casdata'].value == ''){
                          alert('Informe a data de pesquisa!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";
    
    echo "
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Consulta de Casamento por Data</h3>
            <br>
            <b>Pesquisa por mês</b>
            <br>
            <form method=\"post\" action=\"consulta_casamento_data.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         <tr>
                             <td class=\"td1\">
                                 <b>Data:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casdata\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
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

        $casdata = converte_data($_POST["casdata"]);

        $consulta = "select casnumero, caslivro, casfolha, casnomee, casnomea from casamen where (casdata = '$casdata') order by casnomee, casnomea asc";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de casamento!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado:</b> $total <b>Data casamento:</b> $_POST[casdata]
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\" width=\"10%\"><b>Número</b></td>
                  <td class=\"td3\" width=\"10%\"><b>Livro</b></td>
                  <td class=\"td3\" width=\"10%\"><b>Folha</b></td>
                  <td class=\"td3\" width=\"35%\"><b>Noivo</b></td>
                  <td class=\"td3\" width=\"35%\"><b>Noiva</b></td>
              </tr>
        </table>
        <div id=\"scroll\">
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"590\" class=\"tabela_formatada\">
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $casnumero = $linha["casnumero"];
                  $caslivro = $linha["caslivro"];
                  $casfolha = $linha["casfolha"];
                  $casnomee = $linha["casnomee"];
                  $casnomea = $linha["casnomea"];
                  echo "
                  <tr>
                      <td class=\"td2\" width=\"10%\">$casnumero</td>
                      <td class=\"td2\" width=\"10%\">$caslivro</td>
                      <td class=\"td2\" width=\"10%\">$casfolha</td>
                      <td class=\"td2\" width=\"35%\">$casnomee</td>
                      <td class=\"td2\" width=\"35%\">$casnomea</td>
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
