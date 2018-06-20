<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.f1['nome_dizimista'].value == ''){
                          alert('Informe o nome do dizimista!');
                          return false;
                       }
                       return true;
              }
              
              function buscaNome() {
                       janela = window.open(\"busca_nome.php\", \"\", \"height=400, width=600, status\");
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {
          $nome_dizimista = $_POST["nome_dizimista"];
          $data_pagamento = converte_data($_POST["data_pagamento"]);
          $mes_pagamento = $_POST["mes_pagamento"];
          $valor_pago = $_POST["valor_pago"];
          $cod_pessoa = $_POST["cod_pessoa"];
          
          $insert = "insert into tab_dizimo (data_pagamento, mes_pagamento, valor_pago, cod_pessoa) values ('$data_pagamento','$mes_pagamento','$valor_pago','$cod_pessoa')";
          mysql_query($insert, $conectar) or die ("Não foi possivel inserir dados pagamento de dizimo!");
          echo "
          <script language=\"JavaScript\">
                 alert('Dados inseridos com sucesso!');
          </script>
          ";
    }

    $codigo = $_GET["codigo"];
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Pagamento de Dízimo</h3>
            <br>
            <form method=\"post\" action=\"cadastra_dizimo.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">
                  <input type=\"hidden\" name=\"codigo\" value=\"$codigo\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">

                         <tr>
                             <td>
                                 <b>Nome:</b>
                             </td>
                             <td>
                                 <input type=\"text\" name=\"nome\" value=\"$_POST[nome_dizimista]\" size=\"40\" maxlength=\"80\" class=\"field_textbox\">
                                 <input type=\"button\" value=\"Buscar Nome\" class=\"botao_ok\" onclick=\"buscaNome();\">
                             </td>
                         </tr>
                         <tr>
                             <td width=\"20%\">
                                 <b>Data pagamento:</b>
                             </td>
                             <td width=\"80\">
                                 <input type=\"text\" name=\"data_pagamento\" value=\"$_POST[data_pagamento]\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>

                         <tr>
                             <td>
                                 <b>Mes de pagamento</b>
                             </td>
                             <td>
                                 <select name=\"mes_pagamento\" class=\"field_listbox\">
                                         <option></option>
                                         <option value=\"01\">01 - Janeiro</option>
                                         <option value=\"02\">02 - Fevereiro</option>
                                         <option value=\"03\">03 - Março</option>
                                         <option value=\"04\">04 - Abril</option>
                                         <option value=\"05\">05 - Maio</option>
                                         <option value=\"06\">06 - Junho</option>
                                         <option value=\"07\">07 - Julho</option>
                                         <option value=\"08\">08 - Agosto</option>
                                         <option value=\"09\">09 - Setembro</option>
                                         <option value=\"10\">10 - Outubro/option>
                                         <option value=\"11\">11 - Novembro</option>
                                         <option value=\"12\">12 - Dezembro</option>
                                 </select>
                             </td>
                         </tr>

                         <tr>
                             <td>
                                 <b>Valor pago R$:</b>
                             </td>
                             <td>
                                 <input type=\"text\" name=\"valor_pago\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td align=\"center\">
                                 <input type=\"submit\" value=\"Cadastrar\" name=\"cadastro\" class=\"botao_ok\">
                             </td>
                             <td>
                                 <input type=\"reset\" value=\"Limpar Dados\" class=\"botao_ok\">
                             </td>
                         </tr>
                   </table>
            </form>
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
