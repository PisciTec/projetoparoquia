<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['batdata'].value == ''){
                          alert('Informe data de pesquisa!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";
    
    echo "
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Consulta de Batizado por Data</h3>
            <br>
            <b>Pesquisa por mês</b>
            <br>
            <form method=\"post\" action=\"consulta_batizado_data.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         <tr>
                             <td class=\"td1\">
                                 <b>Data:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batdata\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
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

        $batdata = converte_data($_POST["batdata"]);

        $consulta = "select codbatismo, batnumero, batlivro, batfolha, batnome, batmae from batismo where (batdata = '$batdata') order by batnome, batmae asc";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de batizado!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado:</b> $total <b>Data do Batizado:</b> $_POST[batdata]
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\" width=\"10%\"><b>Cod.</b></td>
                  <td class=\"td3\" width=\"10%\"><b>Lvro</b></td>
                  <td class=\"td3\" width=\"10%\"><b>Folha</b></td>
                  <td class=\"td3\" width=\"35%\"><b>Batizado</b></td>
                  <td class=\"td3\" width=\"35%\"><b>Mãe</b></td>
              </tr>
        </table>
        <div id=\"scroll\">
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"590\" class=\"tabela_formatada\">
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codbatismo = $linha["codbatismo"];
                  $batnumero = $linha["batnumero"];
                  $batlivro = $linha["batlivro"];
                  $batfolha = $linha["batfolha"];
                  $batnome = $linha["batnome"];
                  $batmae = $linha["batmae"];
                  echo "
                  <tr>
                      <td class=\"td2\" width=\"10%\">$codbatismo</td>
                      <td class=\"td2\" width=\"10%\">$batlivro</td>
                      <td class=\"td2\" width=\"10%\">$batfolha</td>
                      <td class=\"td2\" width=\"35%\">$batnome</td>
                      <td class=\"td2\" width=\"35%\">$batmae</td>
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
