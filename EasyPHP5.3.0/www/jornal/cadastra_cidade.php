<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['ciddes'].value == ''){
                          alert('Informe o nome da cidade!');
                          return false;
                       }
                       if (document.form_cadastro['ciduf'].value == ''){
                          alert('Informe a sigla da UF!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {

       $ciddes = trim($_POST["ciddes"]);
       $ciduf = trim($_POST["ciduf"]);

       $select = "select * from jornal_cidade where ciddes = '$ciddes' and ciduf = '$ciduf'";
       $resposta = mysql_query($select, $conectar) or die ("Não foi possível realizar a consulta de cidade!");
       $num = mysql_num_rows($resposta);
       
       if ($num == 0) {
          $insert = "insert into jornal_cidade (ciddes, ciduf) values ('$ciddes', '$ciduf')";
          mysql_query($insert, $conectar) or die ("Não foi possivel inserir dados de cidade!");
          echo "
          <script language=\"JavaScript\">
                 alert('Dados inseridos com sucesso!');
          </script>
          ";
       }
       else {
          echo "
          <script language=\"JavaScript\">
                 alert('Você já possui uma cidade com este nome cadastrado!');
          </script>
          ";
       }

    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Cidade</h3>
            <br>
            <form method=\"post\" action=\"cadastra_cidade.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">

                         <tr>
                             <td class=\"td1\">
                                 <b>Cidade:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"ciddes\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>UF:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"ciduf\" size=\"2\" maxlength=\"2\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td2\">
                                 <input type=\"submit\" value=\"Cadastrar\" name=\"cadastro\" class=\"botao_ok\">
                             </td>
                             <td class=\"td2\">
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
