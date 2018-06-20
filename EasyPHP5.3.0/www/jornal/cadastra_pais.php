<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['descricao'].value == ''){
                          alert('Informe o nome do país!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {

       $descricao = trim($_POST["descricao"]);

       $select = "select * from jornal_pais where descricao = '$descricao'";
       $resposta = mysql_query($select, $conectar) or die ("Não foi possível realizar a consulta de paises!");
       $num = mysql_num_rows($resposta);
       
       if ($num == 0) {
          $insert = "insert into jornal_pais (descricao) values ('$decricao')";
          mysql_query($insert, $conectar) or die ("Não foi possivel inserir dados de pais!");
          echo "
          <script language=\"JavaScript\">
                 alert('Dados inseridos com sucesso!');
          </script>
          ";
       }
       else {
          echo "
          <script language=\"JavaScript\">
                 alert('Você já possui um país com este nome cadastrado!');
          </script>
          ";
       }

    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de País</h3>
            <br>
            <form method=\"post\" action=\"cadastra_pais.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">

                         <tr>
                             <td class=\"td1\">
                                 <b>Pais:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"descricao\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
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
