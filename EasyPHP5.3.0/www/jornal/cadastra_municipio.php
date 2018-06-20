<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['nome_municipio'].value == ''){
                          alert('Informe o nome do município!');
                          return false;
                       }
                       if (document.form_cadastro['uf'].value == ''){
                          alert('Informe a sigla do estado!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {

       $nome_municipio = trim($_POST["nome_municipio"]);
       $uf = trim($_POST["uf"]);

       $select = "select * from tab_municipio where nome_municipio = '$nome_municipio' and uf = '$uf'";
       $resposta = mysql_query($select, $conectar) or die ("Não foi possível realizar a consulta de municipios!");
       $num = mysql_num_rows($resposta);
       
       if ($num == 0) {
          $insert = "insert into tab_municipio (nome_municipio, uf) values ('$nome_municipio', '$uf')";
          mysql_query($insert, $conectar) or die ("Não foi possivel inserir dados de município!");
          echo "
          <script language=\"JavaScript\">
                 alert('Dados inseridos com sucesso!');
          </script>
          ";
       }
       else {
          echo "
          <script language=\"JavaScript\">
                 alert('Você já possui um município com este nome cadastrado!');
          </script>
          ";
       }

    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Município</h3>
            <br>
            <form method=\"post\" action=\"cadastra_municipio.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">

                         <tr>
                             <td class=\"td1\">
                                 <b>Município:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"nome_municipio\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>UF:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"uf\" size=\"2\" maxlength=\"2\" class=\"field_textbox\">
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
