<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['nome_pessoa'].value == ''){
                          alert('Informe o nome da pessoa!');
                          return false;
                       }
                       if (document.form_cadastro['endereco'].value == ''){
                          alert('Digite as informações do endereço da pessoa!');
                          return false;
                       }
                       if (document.form_cadastro['cod_bairro'].value == ''){
                          alert('Escolha um bairro!');
                          return false;
                       }
                       if (document.form_cadastro['cod_municipio'].value == ''){
                          alert('Escolha um município!');
                          return false;
                       }
                       if (document.form_cadastro['cod_situcao_endereco'].value == ''){
                          alert('Escolha a situação do endereço da pessoa!');
                          return false;
                       }
                       if (document.form_cadastro['cod_situcao_civil'].value == ''){
                          alert('Escolha a situação civil da pessoa!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {

       $nome_pessoa = $_POST["nome_pessoa"];
       $endereco = $_POST["endereco"];
       $cpf = $_POST["cpf"];
       $rg = $_POST["rg"];
       $data_nascimento = converte_data($_POST["data_nascimento"]);
       $cod_bairro = $_POST["cod_bairro"];
       $cod_municipio = $_POST["cod_municipio"];
       $cep = $_POST["cep"];
       $cod_situacao_endereco = $_POST["cod_situacao_endereco"];
       $nome_pai = $_POST["nome_pai"];
       $nome_mae = $_POST["nome_mae"];
       $fone_residencial = $_POST["fone_residencial"];
       $celular = $_POST["celular"];
       $cod_situacao_civil = $_POST["cod_situacao_civil"];
       $nome_conjuge = $_POST["nome_conjuge"];
       $profissao = $_POST["profissao"];
       
       $select = "select * from tab_pessoa_jornal where (cpf = '$cpf') or (rg = '$rg')";
       $resposta = mysql_query($select, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
       $num = mysql_num_rows($resposta);
       
       if ($num == 0) {
          $cadastrar = "insert into tab_pessoa_jornal (nome_pessoa, endereco, cpf, rg, data_nascimento, cod_bairro, cod_municipio, cep, cod_situacao_endereco, nome_pai, nome_mae, fone_residencial, celular, cod_situacao_civil, nome_conjuge, profissao, ativo) values ( '$nome_pessoa' , '$endereco' , '$cpf' , '$rg' , '$data_nascimento' , '$cod_bairro' , '$cod_municipio' , '$cep' , '$cod_situacao_endereco' , '$nome_pai' , '$nome_mae', '$fone_residencial' , '$celular' , '$cod_situacao_civil' , '$nome_conjuge' , '$profissao' , '1')";
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
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">

                         <tr>
                             <td class=\"td1\">
                                 <b>Nome:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"nome_pessoa\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>CPF:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"cpf\" size=\"14\" maxlength=\"14\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"###.###.###.##\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>RG:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"rg\" size=\"15\" maxlength=\"15\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data nascimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"data_nascimento\" value=\"$_POST[data_nascimento]\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Nome do Pai:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"nome_pai\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Nome Mãe:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"nome_mae\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>


                         <tr>
                             <td class=\"td1\">
                                 <b>Endereço:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"endereco\" size=\"50\" maxlength=\"80\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Bairro:</b>
                             </td>
                             <td class=\"td2\">
                                  <select name=\"cod_bairro\" class=\"field_listbox\">
                                          <option></option>
                                  ";
                                          $select_bairro = "select cod_bairro, nome_bairro from tab_bairro order by nome_bairro asc";
                                          $resposta_bairro = mysql_query($select_bairro, $conectar) or die ("Não foi possivel efetuar a consulta de bairro");
                                          while($linha = mysql_fetch_array($resposta_bairro)){
                                                $cod_bairro = $linha["cod_bairro"];
                                                $nome_bairro = $linha["nome_bairro"];
                                                // ----------  Codigo que retorna os ultimos valores digitados ou não
                                                if(isset($_POST["cod_bairro"]) and ($_POST["cod_bairro"] == $cod_bairro)){
                                                   echo "<option value=$cod_bairro selected>$nome_bairro</option>";
                                                }
                                                else{
                                                     echo "<option value=$cod_bairro>$nome_bairro</option>";
                                                }
                                          }
                                  mysql_free_result($resposta_bairro);
                                  echo "
                                  </select>
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Município:</b>
                             </td>
                             <td class=\"td2\">
                                  <select name=\"cod_municipio\" class=\"field_listbox\">
                                          <option></option>
                                  ";
                                          $select_municipio = "select cod_municipio, nome_municipio, uf from tab_municipio order by nome_municipio asc";
                                          $resposta_municipio = mysql_query($select_municipio,$conectar) or die ("Não foi possível efetuar a consulta de municipios!");
                                          while($linha = mysql_fetch_array($resposta_municipio)){
                                                $cod_municipio = $linha["cod_municipio"];
                                                $nome_municipio = $linha["nome_municipio"];
                                                $uf = $linha["uf"];
                                                // ----------  Codigo que retorna os ultimos valores digitados ou não
                                                if(isset($_POST["cod_municipio"]) and ($_POST["cod_municipio"] == $cod_municipio)){
                                                   echo "<option value=$cod_municipio selected>$nome_municipio - $uf</option>";
                                                }
                                                else{
                                                     echo "<option value=$cod_municipio>$nome_municipio - $uf</option>";
                                                }
                                          }
                                          mysql_free_result($resposta_municipio);
                                  echo "
                                  </select>
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Situação endereço:</b>
                             </td>
                             <td class=\"td2\">
                                  <select name=\"cod_situacao_endereco\" class=\"field_listbox\">
                                          <option></option>
                                  ";
                                          $select_situacao = "select cod_situacao_endereco, descricao_situacao_endereco from tab_situacao_endereco order by descricao_situacao_endereco asc";
                                          $resposta_situacao = mysql_query($select_situacao,$conectar) or die ("Não foi possível efetuar a consulta de situacao de endereco!");
                                          while($linha = mysql_fetch_array($resposta_situacao)){
                                                $cod_situacao_endereco = $linha["cod_situacao_endereco"];
                                                $descricao_situacao_endereco = $linha["descricao_situacao_endereco"];
                                                // ----------  Codigo que retorna os ultimos valores digitados ou não
                                                if(isset($_POST["cod_situacao_endereco"]) and ($_POST["cod_situacao_endereco"] == $cod_situacao_endereco)){
                                                   echo "<option value=$cod_situacao_endereco selected>$descricao_situacao_endereco</option>";
                                                }
                                                else{
                                                     echo "<option value=$cod_situacao_endereco>$descricao_situacao_endereco</option>";
                                                }
                                          }
                                          mysql_free_result($resposta_situacao);
                                  echo "
                                  </select>
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                  <b>CEP:</b>
                             </td>
                             <td class=\"td2\">
                                  <input type=\"text\" name=\"cep\" value=\"$cep\" size=\"9\" maxlength=\"9\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"#####-###\">
                             </td>
                         </tr>

                          <tr>
                             <td class=\"td1\">
                                 <b>Telefone residencial:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"fone_residencial\" value=\"\" size=\"13\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Celular:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"celular\" value=\"\" size=\"13\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Situação civil:</b>
                             </td>
                             <td class=\"td2\">
                                  <select name=\"cod_situacao_civil\" class=\"field_listbox\">
                                          <option></option>
                                  ";
                                          $select_situacao = "select cod_situacao_civil, descricao_situacao_civil from tab_situacao_civil order by descricao_situacao_civil asc";
                                          $resposta_situacao = mysql_query($select_situacao,$conectar) or die ("Não foi possível efetuar a consulta de situacao de endereco!");
                                          while($linha = mysql_fetch_array($resposta_situacao)){
                                                $cod_situacao_civil = $linha["cod_situacao_civil"];
                                                $descricao_situacao_civil = $linha["descricao_situacao_civil"];
                                                // ----------  Codigo que retorna os ultimos valores digitados ou não
                                                if(isset($_POST["cod_situacao_civil"]) and ($_POST["cod_situacao_civil"] == $cod_situacao_civil)){
                                                   echo "<option value=$cod_situacao_civil selected>$descricao_situacao_civil</option>";
                                                }
                                                else{
                                                     echo "<option value=$cod_situacao_civil>$descricao_situacao_civil</option>";
                                                }
                                          }
                                          mysql_free_result($resposta_situacao);
                                  echo "
                                  </select>
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Nome conjuge:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"nome_conjuge\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Profissão:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"profissao\" size=\"30\" maxlength=\"40\" class=\"field_textbox\">
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
