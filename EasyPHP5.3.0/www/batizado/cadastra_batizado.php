<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['batlivro'].value == ''){
                          alert('Informe o nome do livro!');
                          return false;
                       }
                       if (document.form_cadastro['batfolha'].value == ''){
                          alert('Digite o número da folha!');
                          return false;
                       }
                       if (document.form_cadastro['batnome'].value == ''){
                          alert('Escolha o nome do batizado!');
                          return false;
                       }
                       if (document.form_cadastro['batpai'].value == ''){
                          alert('Digite o nome do pai!');
                          return false;
                       }
                       if (document.form_cadastro['batmae'].value == ''){
                          alert('Digite o nome da mãe!');
                          return false;
                       }
                       if (document.form_cadastro['batpadrin'].value == ''){
                          alert('Digite o nome do padrinho!');
                          return false;
                       }
                       if (document.form_cadastro['batmadrin'].value == ''){
                          alert('Digite o nome da madrinha!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST['cadastro'])) {
       $codbatismo = $_POST["codbatismo"];
       $batlivro = $_POST["batlivro"];
       $batfolha = $_POST["batfolha"];
       $batnumero = $_POST["batnumero"];
       $batdata = converte_data($_POST["batdata"]);
       $batlocal = $_POST["batlocal"];
       $batnome = $_POST["batnome"];
       $batnascto = converte_data($_POST["batnascto"]);
       $batparoq = $_POST["batparoq"];
       $batpai = $_POST["batpai"];
       $batmae = $_POST["batmae"];
       $batcasado = $_POST["batcasado"];
       $batpadrin = $_POST["batpadrin"];
       $batmadrin = $_POST["batmadrin"];
       $batceleb = $_POST["batceleb"];
       $batsexo = $_POST["batsexo"];

       $cadastrar = "insert into batismo (batlivro, batfolha, batnumero, batdata, batlocal, batnome, batnascto, batparoq, batpai, batmae, batcasado,
                     batpadrin, batmadrin, batceleb, batsexo) values ( '$batlivro' , '$batfolha' , '$batnumero' , '$batdata' , '$batlocal' ,
                     '$batnome' , '$batnascto' , '$batparoq' , '$batpai' , '$batmae' , '$batcasado', '$batpadrin' , '$batmadrin' , '$batceleb' ,
                     '$batsexo')";
       mysql_query($cadastrar, $conectar) or die ("Não foi possivel inserir dados de batismo!");
       echo "
       <script language=\"JavaScript\">
            alert('Dados inseridos com sucesso!');
       </script>
       ";
    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Batizado</h3>
            <br>
            <form method=\"post\" action=\"cadastra_batizado.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Livro:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batlivro\" size=\"5\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Folha</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batfolha\" size=\"5\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>
			 <tr>
                             <td class=\"td1\">
                                 <b>Número:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batnumero\" size=\"5\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Nome:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batnome\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Sexo(M/F):</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batsexo\" size=\"1\" maxlength=\"1\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Data Batizado:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batdata\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Local:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batlocal\" value=\"\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Nascimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batnascto\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Paróquia:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batparoq\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Pai:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batpai\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Mãe:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batmae\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Casados(S/N):</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batcasado\" size=\"1\" maxlength=\"1\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Padrinho:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batpadrin\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Madrinha:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batmadrin\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Observação:</b>
                             </td>
                             <td class=\"td2\">
                                 <textarea rows=\"5\" cols=\"40\" name=\"batobs\" class=\"field_textbox\"></textarea>
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Celebrante:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batceleb\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
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
