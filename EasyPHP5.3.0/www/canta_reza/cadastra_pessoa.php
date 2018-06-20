<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['nome'].value == ''){
                          alert('Informe o nome da pessoa!');
                          return false;
                       }
                       if (document.form_cadastro['endereco'].value == ''){
                          alert('Digite as informações do endereço da pessoa!');
                          return false;
                       }
                       if (document.form_cadastro['mae'].value == ''){
                          alert('Digite o nome da mãe!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {

       $nome = $_POST["nome"];
       $pai = $_POST["pai"];
       $mae = $_POST["mae"];
       $nascto = converte_data($_POST["nascto"]);
       $data1 = explode("/",$_POST["nascto"]);
       $dia = $data1[0];
       $endereco = $_POST["endereco"];
       $bairro = $_POST["bairro"];
       $cidade = $_POST["cidade"];
       $cep = $_POST["cep"];
       $estado = $_POST["estado"];
       $telefone = $_POST["telefone"];
       $conjuge = $_POST["conjuge"];
       $datacasa = converte_data($_POST["datacasa"]);
       $data2 = explode("/",$_POST["datacasa"]);
       $dia_casamento = $data2[0];
       $paroquia = $_POST["paroquia"];
       $profissao = $_POST["profissao"];
       $atividade = $_POST["atividade"];
       $admissao = converte_data($_POST["admissao"]);
       $valor = $_POST["valor"];
       
       $select = "select * from canta_reza_pessoa where ( NOME = '$nome') and ( MAE = '$mae') and (PAI = '$pai')";
       $resposta = mysql_query($select, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
       $num = mysql_num_rows($resposta);
       
       if ($num == 0) {
          $cadastrar = "insert into canta_reza_pessoa (NOME, PAI, MAE, NASCTO, ENDERECO, BAIRRO, CIDADE, CEP, ESTADO, TELEFONE, CONJUGE, DATACASA, PAROQUIA, PROFISSAO, ATIVIDADE, ADMISSAO, VALOR, DIA, DIA_CASAMENTO) values ( '$nome' , '$pai' , '$mae' , '$nascto' ,'$endereco' , '$bairro' , '$cidade' , '$cep' , '$estado' , '$telefone' , '$conjuge' , '$datacasa' , '$paroquia', '$profissao' , '$atividade' , '$admissao' , '$valor', '$dia', '$dia_casamento')";
          mysql_query($cadastrar, $conectar) or die ("Não foi possivel inserir dados de pessoa!");
          echo "
          <script language=\"JavaScript\">
                 alert('Dados inseridos com sucesso!');
          </script>
          ";
       }
       else {
          echo "
          <script language=\"JavaScript\">
                 alert('Você já possui uma pessoa com este cpf ou rg!');
          </script>
          ";
       }
    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Pessoa</h3>
            <br>
            <form method=\"post\" action=\"cadastra_pessoa.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\" class=\"tabela_formatada\">

                         <tr>
                             <td class=\"td1\">
                                 <b>Nome:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"nome\" size=\"30\" maxlength=\"40\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Data nascimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"nascto\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Nome do Pai:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"pai\" size=\"30\" maxlength=\"40\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Nome Mãe:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"mae\" size=\"30\" maxlength=\"40\" class=\"field_textbox\">
                             </td>
                         </tr>


                         <tr>
                             <td class=\"td1\">
                                 <b>Endereço:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"endereco\" size=\"40\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Bairro:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"bairro\" size=\"20\" maxlength=\"25\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Cidade:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"cidade\" size=\"20\" maxlength=\"25\" class=\"field_textbox\">
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
                                  <b>CEP:</b>
                             </td>
                             <td class=\"td2\">
                                  <input type=\"text\" name=\"cep\" size=\"9\" maxlength=\"9\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"#####-###\">
                             </td>
                         </tr>

                          <tr>
                             <td class=\"td1\">
                                 <b>Telefone residencial:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"telefone\" value=\"\" size=\"13\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Nome conjuge:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"conjuge\" size=\"30\" maxlength=\"35\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data casamento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"datacasa\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Paroquia:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"paroquia\" size=\"20\" maxlength=\"25\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td height=\"5\" width=\"20%\" bgcolor=\"#CCCCCC\"></td>
                             <td height=\"5\" width=\"80%\" bgcolor=\"#CCCCCC\"></td>
                             
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Profissão:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"profissao\" value=\"\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Atividade:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"atividade\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                             </td>
                         </tr>

                          <tr>
                             <td height=\"5\" width=\"20%\" bgcolor=\"#CCCCCC\"></td>
                             <td height=\"5\" width=\"80%\" bgcolor=\"#CCCCCC\"></td>

                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Admissão:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"admissao\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Valor:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"valor\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
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
