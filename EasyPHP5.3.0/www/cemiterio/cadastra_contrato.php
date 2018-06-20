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
                       if (document.form_cadastro['titular'].value == ''){
                          alert('Digite o nome do titular!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {
       $quadra = $_POST["quadra"];
       $sepultura = $_POST["sepultura"];
       $ala = $_POST["ala"];
       $titular = $_POST["titular"];
       $endereco = $_POST["endereco"];
       $bairro = $_POST["bairro"];
       $cidade = $_POST["cidade"];
       $estado = $_POST["estado"];
       $cep = $_POST["cep"];
       $fone = $_POST["fone"];
       $inicio = converte_data($_POST["inicio"]);
       $termino = converte_data($_POST["termino"]);
       $valor = str_replace(",",".",$_POST["valor"]);
       $datarec = converte_data($_POST["datarec"]);
       $obs = $_POST["obs"];

       $cadastrar = "insert into cemiterio_contrato (quadra, sepultura, ala, titular, endereco, bairro, cidade, estado, cep, fone,
       inicio, termino, valor, datarec, obs) values ( '$quadra' , '$sepultura' , '$ala' , '$titular' , '$endereco' , '$bairro' ,
        '$cidade' , '$estado' , '$cep' , '$fone', '$inicio' , '$termino' , '$valor' , '$datarec' , '$obs' )";
       mysql_query($cadastrar, $conectar) or die ("Não foi possivel inserir dados de cemiterio contrato!");
       $id = mysql_insert_id();
       $mensagem="<a href=\"contrato_cemiterio.php?contrato=$id\" target=\"_blank\">Imprimir Contrato</a>";

	echo "
       <script language=\"JavaScript\">
            alert('Dados inseridos com sucesso!');
       </script>
       ";
    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Contrato</h3>
	    <br>
	    ";
	    if (isset($mensagem)){
		echo $mensagem; 
	    }
	    echo "            
            <form method=\"post\" action=\"cadastra_contrato.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         
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
                                 <b>Titular:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"titular\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Endereço:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"endereco\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Bairro:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"bairro\" size=\"40\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Cidade:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"cidade\" size=\"40\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Estado:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"estado\" size=\"2\" maxlength=\"2\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Cep:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"cep\" size=\"9\" maxlength=\"9\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"#####-###\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Telefone:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"fone\" size=\"13\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Início:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"inicio\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Término:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"termino\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Valor R$:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"valor\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Recebimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"datarec\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Obs:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obs\" size=\"70\" maxlength=\"100\" class=\"field_textbox\">
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
