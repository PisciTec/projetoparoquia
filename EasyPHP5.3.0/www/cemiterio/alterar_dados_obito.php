<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['oblivro'].value == ''){
                          alert('Informe o nome da livro!');
                          return false;
                       }
                       if (document.form_cadastro['obfolha'].value == ''){
                          alert('Digite o número da folha!');
                          return false;
                       }
                       if (document.form_cadastro['obnumero'].value == ''){
                          alert('Digite o número da numero!');
                          return false;
                       }
                       if (document.form_cadastro['obnome'].value == ''){
                          alert('Digite o nome do nome!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST["alterar"])) {
       $livro = $_POST["oblivro"];
       $folha = $_POST["obfolha"];
       $numero = $_POST["obnumero"];
       $nome = $_POST["obnome"];
       $data = converte_data($_POST["obdata"]);
       $local = $_POST["oblocal"];
       $paroquia = $_POST["obparoquia"];
       $idade = $_POST["obidade"];
       $natura = $_POST["obnatura"];
       $resid = $_POST["obresid"];
       $pai = $_POST["obpai"];
       $mae = $_POST["obmae"];
       $conjuge = $_POST["obcasado"];
       $sepult = $_POST["obsepult"];

       $atualiza = "update cemiterio_obitos set oblivro='$livro', obfolha='$folha', obnumero='$numero', obnome='$nome',
        obdata='$data', oblocal='$local', obparoquia='$paroquia', obidade='$idade', obnatura='$natura', obresid='$resid',
         obpai='$pai', obmae='$mae', obcasado='$conjuge', obsepult='$sepult' where cod_obito='$_POST[cod_obito]'";

       mysql_query($atualiza, $conectar) or die ("Não foi possivel atualizar dados de cemiterio obito!");
       echo "
       <script language=\"JavaScript\">
            alert('Dados atualizados com sucesso!');
            window.location.href = 'pre_alterar_obito.php';
       </script>
       ";
    }
    else {
    $cod_obito = $_GET["cod_obito"];
    $consulta = "select * from cemiterio_obitos where cod_obito='$cod_obito'";
    $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados do obito");
    $linha = mysql_fetch_array($resposta);

    $livro = $linha["OBLIVRO"];
    $folha = $linha["OBFOLHA"];
    $numero = $linha["OBNUMERO"];
    $nome = $linha["OBNOME"];
    $data = converte_data($linha["OBDATA"]);
    $local = $linha["OBLOCAL"];
    $paroquia = $linha["OBPAROQUIA"];
    $idade = $linha["OBIDADE"];
    $natura = $linha["OBNATURA"];
    $resid = $linha["OBRESID"];
    $pai = $linha["OBPAI"];
    $mae = $linha["OBMAE"];
    $conjuge = $linha["OBCASADO"];
    $sepult = $linha["OBSEPULT"];
    
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Alteração de Dados do Óbito</h3>
            <br>
            <form method=\"post\" action=\"alterar_dados_obito.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <input type=\"hidden\" name=\"cod_obito\" value=\"$cod_obito\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Cod. Óbito:</b>
                             </td>
                             <td class=\"td2\">
                                 $cod_obito
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Livro:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"oblivro\" value=\"$livro\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Folha:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obfolha\" value=\"$folha\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Número:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obnumero\" value=\"$numero\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Nome:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obnome\" value=\"$nome\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Data:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obdata\" value=\"$data\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Local:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"oblocal\" value=\"$local\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Paroquia:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obparoquia\" value=\"$paroquia\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Idade:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obidade\" value=\"$idade\" size=\"3\" maxlength=\"3\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Natural de:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obnatura\" value=\"$natura\" size=\"40\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Residente em:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obresid\" value=\"$resid\" size=\"40\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Pai:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obpai\" value=\"$pai\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Mãe:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obmae\" value=\"$mae\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Casado com:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obcasado\" value=\"$conjuge\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Sepultado no cemitério de:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obsepult\" value=\"$sepult\" size=\"40\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td2\" colspan=\"2\">
                                 <input type=\"submit\" value=\"Alterar\" name=\"alterar\" class=\"botao_ok\">
                             </td>
                         </tr>
                   </table>
            </form>
        </td>
    </tr>
    ";
    }
    include "rodape.inc";
?>
