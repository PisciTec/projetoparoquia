<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['nome_bairro'].value == ''){
                          alert('Informe o bairro!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {

       $nome_bairro = trim($_POST["nome_bairro"]);

       $select = "select * from tab_bairro where nome_bairro = '$nome_bairro'";
       $resposta = mysql_query($select, $conectar) or die ("Não foi possível realizar a consulta de bairros!");
       $num = mysql_num_rows($resposta);
       
       if ($num == 0) {
          $insert = "insert into tab_bairro (nome_bairro) values ('$nome_bairro')";
          mysql_query($insert, $conectar) or die ("Não foi possivel inserir dados do bairro!");
          echo "
          <script language=\"JavaScript\">
                 alert('Dados inseridos com sucesso!');
          </script>
          ";
       }
       else {
          echo "
          <script language=\"JavaScript\">
                 alert('Você já possui um bairro com este nome cadastrado!');
          </script>
          ";
       }

    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Bairro</h3>
            <br>
            <form method=\"post\" action=\"cadastra_bairro.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">

                         <tr>
                             <td class=\"td1\">
                                 <b>Bairro:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"nome_bairro\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
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
