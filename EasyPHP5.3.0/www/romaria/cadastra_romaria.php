<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['fretante'].value == ''){
                          alert('Informe o nome do fretante!');
                          return false;
                       }
                       if (document.form_cadastro['cod_motivo_romaria'].value == ''){
                          alert('Informe o motivo da romaria!');
                          return false;
                       }
                       if (document.form_cadastro['cod_animador_festa'].value == ''){
                          alert('Informe o animador da festa!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {

       $fretante = $_POST["fretante"];
       $endereco = $_POST["endereco"];
       $cidade = $_POST["cidade"];
       $estado = $_POST["estado"];
       $paroquias = $_POST["paroquias"];
       $vigarios = $_POST["vigarios"];
       $data_romaria = converte_data($_POST["data_romaria"]);
       $num_veiculos = $_POST["num_veiculos"];
       $num_romeiros = $_POST["num_romeiros"];
       $ranchos = $_POST["ranchos"];
       $cod_motivo_romaria = $_POST["cod_motivo_romaria"];
       $cod_animador_festa = $_POST["cod_animador_festa"];
       $reuniao_depois = $_POST["reuniao_depois"];

       $cadastrar = "insert into tab_romaria (fretante, endereco, cidade, estado, paroquias, vigarios, data_romaria, num_veiculos, num_romeiros, ranchos, cod_motivo_romaria, cod_animador_festa, reuniao_depois) values ( '$fretante' , '$endereco' , '$cidade' , '$estado' , '$paroquias' , '$vigarios' , '$data_romaria' , '$num_veiculos' , '$num_romeiros' , '$ranchos' , '$cod_motivo_romaria' , '$cod_animador_festa' , '$reuniao_depois' )";
       mysql_query($cadastrar, $conectar) or die ("Não foi possivel inserir dados da romaria!");
       echo "
          <script language=\"JavaScript\">
                 alert('Dados inseridos com sucesso!');
          </script>
       ";
    }

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Romarias</h3>
            <br>
            <form method=\"post\" action=\"cadastra_romaria.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">

                         <tr>
                             <td class=\"td1\">
                                 <b>Fretante:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"fretante\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
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
                                 <b>Cidade:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"cidade\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Estado:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"estado\" size=\"15\" maxlength=\"30\" class=\"field_textbox\">
                             </td>
                         </tr>


                         <tr>
                             <td class=\"td1\">
                                 <b>Paroquia:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"paroquias\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         <tr>
                             <td class=\"td1\">
                                 <b>Vigario:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"vigarios\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data romaria:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"data_romaria\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Nº veículos:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"num_veiculos\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Nº romeiros:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"num_romeiros\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Rancho:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"ranchos\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Motivo Romaria:</b>
                             </td>
                             <td class=\"td2\">
                                  <select name=\"cod_motivo_romaria\" class=\"field_listbox\">
                                          <option>Selecione</option>
                                  ";
                                          $select = "select cod_motivo_romaria, descricao_motivo_romaria from tab_motivo_romaria order by descricao_motivo_romaria asc";
                                          $resposta = mysql_query($select, $conectar) or die ("Não foi possivel efetuar a consulta de bairro");
                                          while($linha = mysql_fetch_array($resposta)){
                                                $cod_motivo_romaria = $linha["cod_motivo_romaria"];
                                                $descricao_motivo_romaria = $linha["descricao_motivo_romaria"];
                                                 //----------  Codigo que retorna os ultimos valores digitados ou não
                                                echo "<option value=$cod_motivo_romaria>$descricao_motivo_romaria</option>";
                                          }
                                  mysql_free_result($resposta);
                                  echo "
                                  </select>
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Animador da festa:</b>
                             </td>
                             <td class=\"td2\">
                                  <select name=\"cod_animador_festa\" class=\"field_listbox\">
                                          <option>Selecione</option>
                                  ";
                                          $select = "select cod_animador_festa, descricao_animador_festa from tab_animador_festa order by descricao_animador_festa asc";
                                          $resposta = mysql_query($select,$conectar) or die ("Não foi possível efetuar a consulta de municipios!");
                                          while($linha = mysql_fetch_array($resposta)){
                                                $cod_animador_festa = $linha["cod_animador_festa"];
                                                $descricao_animador_festa = $linha["descricao_animador_festa"];
                                                // ----------  Codigo que retorna os ultimos valores digitados ou não
                                                echo "<option value=$cod_animador_festa>$descricao_animador_festa</option>";
                                          }
                                          mysql_free_result($resposta);
                                  echo "
                                  </select>
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Houve reunião depois(sim/não):</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"reuniao_depois\" size=\"3\" maxlength=\"3\" class=\"field_textbox\">
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
