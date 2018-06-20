<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['descricao'].value == ''){
                          alert('Informe a descrição!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {

       $descricao = trim($_POST["descricao"]);

       $select = "select * from motivo where descricao = '$descricao'";
       $resposta = mysql_query($select, $conectar) or die ("Não foi possível realizar a consulta de motivo de desligamento!");
       $num = mysql_num_rows($resposta);
       
       if ($num == 0) {
          $insert = "insert into motivo (descricao) values ('$descricao')";
          mysql_query($insert, $conectar) or die ("Não foi possivel inserir dados de motivo de desligamento!");
          echo "
          <script language=\"JavaScript\">
                 alert('Dados inseridos com sucesso!');
          </script>
          ";
       }
       else {
          echo "
          <script language=\"JavaScript\">
                 alert('Já existe um motivo de desligamento!');
          </script>
          ";
       }

    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Motivo de Desligamento</h3>
            <br>
            <form method=\"post\" action=\"cadastra_motivo_desligamento.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">

                         <tr>
                             <td class=\"td1\">
                                 <b>Motivo Desligamento:</b>
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
