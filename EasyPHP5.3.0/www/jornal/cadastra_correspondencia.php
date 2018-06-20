<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['cordes'].value == ''){
                          alert('Informe a situacao de correspondência!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {

       $cordes = trim($_POST["cordes"]);

       $select = "select * from jornal_corresp where cordes = '$cordes'";
       $resposta = mysql_query($select, $conectar) or die ("Não foi possível realizar a consulta de situação de correspondência!");
       $num = mysql_num_rows($resposta);
       
       if ($num == 0) {
          $insert = "insert into jornal_corresp (cordes) values ('$cordes')";
          mysql_query($insert, $conectar) or die ("Não foi possivel inserir dados da situação de correspondência!");
          echo "
          <script language=\"JavaScript\">
                 alert('Dados inseridos com sucesso!');
          </script>
          ";
       }
       else {
          echo "
          <script language=\"JavaScript\">
                 alert('Você já possui uma situação de correspondência!');
          </script>
          ";
       }

    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Situação de Correspondência</h3>
            <br>
            <form method=\"post\" action=\"cadastra_correspondencia.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">

                         <tr>
                             <td class=\"td1\">
                                 <b>Situação endereço:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"cordes\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
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
