<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['caslivro'].value == ''){
                          alert('Informe o nome do livro!');
                          return false;
                       }
                       if (document.form_cadastro['casfolha'].value == ''){
                          alert('Digite o número da folha!');
                          return false;
                       }
                       if (document.form_cadastro['casnomee'].value == ''){
                          alert('Escolha o nome do noivo!');
                          return false;
                       }
                       if (document.form_cadastro['casnomea'].value == ''){
                          alert('Digite o nome da noiva!');
                          return false;
                       }
                       if (document.form_cadastro['castest1'].value == ''){
                          alert('Digite o nome da 1 testemunha!');
                          return false;
                       }
                       if (document.form_cadastro['castest2'].value == ''){
                          alert('Digite o nome da 2 testemunha!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {

       $casnumero = $_POST["casnumero"];
       $caslivro = $_POST["caslivro"];
       $casfolha = $_POST["casfolha"];
       $casdata = converte_data($_POST["casdata"]);
       $caslocal = $_POST["caslocal"];
       $casnomee = $_POST["casnomee"];
       $casnactoe = converte_data($_POST["casnactoe"]);
       $caspaie = $_POST["caspaie"];
       $casmaee = $_POST["casmaee"];
       $casviue = $_POST["casviue"];
       $casfale = converte_data($_POST["casfale"]);
       $casloce = $_POST["casloce"];
       $casende = $_POST["casende"];
       $casnomea = $_POST["casnomea"];
       $casnactoa = converte_data($_POST["casnactoa"]);
       $caspaia = $_POST["caspaia"];
       $casmaea = $_POST["casmaea"];
       $casviua = $_POST["casviua"];
       $casfala = converte_data($_POST["casfala"]);
       $casloca = $_POST["casloca"];
       $casenda = $_POST["casenda"];
       $casdisp = $_POST["casdisp"];
       $castest1 = $_POST["castest1"];
       $castest2 = $_POST["castest2"];
       $casparoco = $_POST["casparoco"];
       $casobs = $_POST["casobs"];

       $cadastrar = "insert into casamen (caslivro, casfolha, casdata, caslocal, casnomee, 
		casnactoe, caspaie, casmaee, casviue, casfale, casloce, casende, 
		casnomea, casnactoa, caspaia, casmaea, casviua, casfala, casloca, casenda, 
		casdisp, castest1, castest2, casparoco, casobs, casnumero) values 
		( '$caslivro' , '$casfolha' , '$casdata' , '$caslocal' , '$casnomee' ,
 		'$casnactoe' , '$caspaie' , '$casmaee' , '$casviue' , '$casfale', 
		'$casloce' , '$casende' , '$casnomea' , '$casnactoa' , '$caspaia' , 
		'$casmaea' , '$casviua' , '$casfala' , '$casloca' , '$casenda' , 
		'$casdisp' , '$castest1' , '$castest2' , '$casparoco' , '$casobs', 
		'$casnumero')";
       mysql_query($cadastrar, $conectar) or die ("Não foi possivel inserir dados de pessoa!");
       echo "
       <script language=\"JavaScript\">
            alert('Dados inseridos com sucesso!');
       </script>
       ";
    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Casamento</h3>
            <br>
            <form method=\"post\" action=\"cadastra_casamento.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">

                         <tr>
                             <td class=\"td1\">
                                 <b>Livro:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"caslivro\" size=\"5\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>                                             

                         <tr>
                             <td class=\"td1\">
                                 <b>Folha</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casfolha\" size=\"5\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

			 <tr>
                             <td class=\"td1\">
                                 <b>Número:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casnumero\" size=\"5\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Data:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casdata\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Local:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"caslocal\" value=\"\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         <tr>
                             <td colspan=\"2\" class=\"td2\">
                                 <b>Ele:</b>
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Nome:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casnomee\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Nacimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casnactoe\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Pai:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"caspaie\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Mãe:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casmaee\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Viuvo de:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casviue\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Falecimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casfale\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Local Nascimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casloce\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Endereço:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casende\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td colspan=\"2\" class=\"td2\">
                                 <b>Ela:</b>
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Nome:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casnomea\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Nacimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casnactoa\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Nome do Pai:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"caspaia\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Nome Mãe:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casmaea\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Viuvo de:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casviua\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Falecimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casfala\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Local Nascimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casloca\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Endereço:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casenda\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Com dispensa de:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casdisp\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Testemunha 1:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"castest1\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Testemunha 2:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"castest2\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Celebrante:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casparoco\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Direito Canônico:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"casobs\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
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
