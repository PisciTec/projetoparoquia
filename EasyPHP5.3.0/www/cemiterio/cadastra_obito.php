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
                          alert('Informe o nome do livro!');
                          return false;
                       }
                       if (document.form_cadastro['obfolha'].value == ''){
                          alert('Digite o número da folha!');
                          return false;
                       }
                       if (document.form_cadastro['obnumero'].value == ''){
                          alert('Digite o número!');
                          return false;
                       }
                       if (document.form_cadastro['obnome'].value == ''){
                          alert('Digite o nome!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST["cadastro"])) {
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

       $cadastrar = "insert into cemiterio_obitos (oblivro, obfolha, obnumero, obnome, obdata, oblocal, obparoquia,
        obidade, obnatura, obresid, obpai, obmae, obcasado, obsepult)
       values ( '$livro' , '$folha' , '$numero' , '$nome' , '$data' , '$local', '$paroquia', '$idade', '$natura',
        '$resid', '$pai', '$mae', '$conjuge', '$sepult')";
       mysql_query($cadastrar, $conectar) or die ("Não foi possivel inserir dados de cemiterio obito!");
       $id = mysql_insert_id();
       $mensagem="<a href=\"certidao_obito.php?cod_obito=$id\" target=\"_blank\">Imprimir Certidão</a>";       

	
	echo "
       <script language=\"JavaScript\">
            alert('Dados inseridos com sucesso!');
       </script>
       ";
    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Óbito</h3>
            <br>";
	    if (isset($mensagem)){ 
		echo $mensagem; 
	    }
            echo "
		<form method=\"post\" action=\"cadastra_obito.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Livro:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"oblivro\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Folha:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obfolha\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Número:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obnumero\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Nome:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obnome\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obdata\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Local:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"oblocal\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Paroquia:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obparoquia\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Idade:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obidade\" size=\"3\" maxlength=\"3\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Natural de:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obnatura\" size=\"40\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Residente em:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obresid\" size=\"40\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Pai:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obpai\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Mãe:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obmae\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Casado com:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obcasado\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Sepultado no cemitério de:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obsepult\" size=\"40\" maxlength=\"50\" class=\"field_textbox\">
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
