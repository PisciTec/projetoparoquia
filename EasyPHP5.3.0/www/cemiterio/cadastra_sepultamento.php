<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['quadra'].value == ''){
                          alert('Informe o nome da quadra!');
                          return false;
                       }
                       if (document.form_cadastro['sepultura'].value == ''){
                          alert('Digite o número da sepultura!');
                          return false;
                       }
                       if (document.form_cadastro['ala'].value == ''){
                          alert('Digite o número da ala!');
                          return false;
                       }
                       if (document.form_cadastro['nome'].value == ''){
                          alert('Digite o nome do titular!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST["cadastro"])) {
       $contrato = $_POST["contrato"];
       $quadra = $_POST["quadra"];
       $sepultura = $_POST["sepultura"];
       $ala = $_POST["ala"];
       $nome = $_POST["nome"];
       $data_sepultamento = converte_data($_POST["data_sepultamento"]);

       $cadastrar = "insert into cemiterio_sepultamento (contrato, quadra, sepultura, ala, nome, data_sepultamento)
       values ( '$contrato' , '$quadra' , '$sepultura' , '$ala' , '$nome' , '$data_sepultamento' )";
       mysql_query($cadastrar, $conectar) or die ("Não foi possivel inserir dados de cemiterio sepultamento!");
       $id = mysql_insert_id();
       $mensagem="<a href=\"guia_sepultamento.php?cod_sepultamento=$id\" target=\"_blank\">Imprimir Guia</a>";       

	echo "
       <script language=\"JavaScript\">
            alert('Dados inseridos com sucesso!');
       </script>
       ";
    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Sepultamento</h3>
            <br>
	    ";
	    if (isset($mensagem)){
		 echo $mensagem; 
	    }
	    echo "
            <form method=\"post\" action=\"cadastra_sepultamento.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Contrato:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"contrato\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Quadra:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"quadra\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Sepultura:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"sepultura\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Ala:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"ala\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Nome:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"nome\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Falecimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"data_sepultamento\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
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
