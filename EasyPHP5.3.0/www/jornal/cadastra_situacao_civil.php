<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['descricao_situacao_civil'].value == ''){
                          alert('Informe a situacao de endereço!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {

       $descricao_situacao_civil = trim($_POST["descricao_situacao_civil"]);

       $select = "select * from tab_situacao_civil where descricao_situacao_civil = '$descricao_situacao_civil'";
       $resposta = mysql_query($select, $conectar) or die ("Não foi possível realizar a consulta de situação civil!");
       $num = mysql_num_rows($resposta);
       
       if ($num == 0) {
          $insert = "insert into tab_situacao_civil (descricao_situacao_civil) values ('$descricao_situacao_civil')";
          mysql_query($insert, $conectar) or die ("Não foi possivel inserir dados da situação civil!");
          echo "
          <script language=\"JavaScript\">
                 alert('Dados inseridos com sucesso!');
          </script>
          ";
       }
       else {
          echo "
          <script language=\"JavaScript\">
                 alert('Você já possui uma situação civil com esta descrição!');
          </script>
          ";
       }

    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Situacao de Civil</h3>
            <br>
            <form method=\"post\" action=\"cadastra_situacao_civil.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">

                         <tr>
                             <td class=\"td1\">
                                 <b>Situação civil:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"descricao_situacao_civil\" size=\"30\" maxlength=\"40\" class=\"field_textbox\">
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
