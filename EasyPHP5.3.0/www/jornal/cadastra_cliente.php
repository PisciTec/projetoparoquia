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
                          alert('Informe o nome do cliente!');
                          return false;
                       }
                       if (document.form_cadastro['tipo'].value == ''){
                          alert('Escolha o tipo do cliente!');
                          return false;
                       }
                       if (document.form_cadastro['cidade'].value == ''){
                          alert('Escolha uma cidade !');
                          return false;
                       }
                       if (document.form_cadastro['pais'].value == ''){
                          alert('Escolha um pais!');
                          return false;
                       }
                       if (document.form_cadastro['corresp'].value == ''){
                          alert('Escolha o motivo da correspondência!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST[cadastro])) {

       $nome = $_POST["nome"];
       $tipo = $_POST["tipo"];
       $cgccpf = $_POST["cgccpf"];
       $cgfrg = $_POST["cgfrg"];
       $nascto = converte_data($_POST["nascto"]);
       $endereco = $_POST["endereco"];
       $bairro = $_POST["bairro"];
       $cidade = $_POST["cidade"];
       $cep = $_POST["cep"];
       $estado = $_POST["estado"];
       $pais = $_POST["pais"];
       $foneres = $_POST["foneres"];
       $fonecom = $_POST["fonecom"];
       $fonefax = $_POST["fonefax"];
       $fonecel = $_POST["fonecel"];
       $email = $_POST["email"];
       $cadastro = date("Y-m-d");
       $contato = $_POST["contato"];
       $corresp = $_POST["corresp"];
       
       $select = "select * from jornal_cliente where (cgccpf = '$cgccpf') or (cgfrg = '$cgfrg')";
       $resposta = mysql_query($select, $conectar) or die ("Não foi possível realizar a consulta de cliente!");
       $num = mysql_num_rows($resposta);
       
       if ($num == 0) {
          $cadastrar = "insert into jornal_cliente (nome, tipo, cgccpf, cgfrg, nascto, endereco, bairro, cidade, cep, estado, pais, foneres, fonecom, fonefax, fonecel, email, cadastro, contato, corresp, ativo) values ( '$nome' , '$tipo' , '$cgccpf' , '$cgfrg' , '$nascto' , '$endereco' , '$bairro' , '$cidade' , '$cep' , '$estado' , '$pais', '$foneres' , '$fonecom' , '$fonefax' , '$fonecel' , '$email' , '$cadastro', '$contato', '$corresp', '1')";
          mysql_query($cadastrar, $conectar) or die ("Não foi possivel inserir dados do cliente!");
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
            <h3>Cadastro de Cliente</h3>
            <br>
            <form method=\"post\" action=\"cadastra_cliente.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">

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
                                  <b>Tipo pessoa:</b>
                              </td>
                              <td class=\"td2\">
                                  <select name=\"tipo\" class=\"field_listbox\">
                                          <option>Selecione</option>
                                          <option value=\"F\">Física</option>
                                          <option value=\"J\">Jurídica</option>
                                  </select>
                              </td>
                         </tr>
                         <tr>
                             <td class=\"td1\">
                                 <b>CPF:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"cgccpf\" size=\"14\" maxlength=\"14\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"###.###.###.##\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>RG:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"cgfrg\" size=\"20\" maxlength=\"20\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data nascimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"nascto\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
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
                                  <select name=\"cidade\" class=\"field_listbox\">
                                          <option>Selecione</option>
                                  ";
                                          $select_cidade = "select * from jornal_cidade order by ciddes asc";
                                          $resposta_cidade = mysql_query($select_cidade, $conectar) or die ("Não foi possivel efetuar a consulta de cidade!");
                                          while($linha = mysql_fetch_array($resposta_cidade)){
                                                $cidcod = $linha["CIDCOD"];
                                                $ciddes = $linha["CIDDES"];
                                                $ciduf = $linha["CIDUF"];
                                                // ----------  Codigo que retorna os ultimos valores digitados ou não
                                                echo "<option value=$cidcod>$ciddes - $ciduf</option>";
                                          }
                                  mysql_free_result($resposta_cidade);
                                  echo "
                                  </select>
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>País:</b>
                             </td>
                             <td class=\"td2\">
                                  <select name=\"pais\" class=\"field_listbox\">
                                          <option>Selecione</option>
                                  ";
                                          $select_pais = "select * from jornal_pais order by descricao asc";
                                          $resposta_pais = mysql_query($select_pais,$conectar) or die ("Não foi possível efetuar a consulta de paises!");
                                          while($linha = mysql_fetch_array($resposta_pais)){
                                                $codigo = $linha["CODIGO"];
                                                $descricao = $linha["DESCRICAO"];
                                                // ----------  Codigo que retorna os ultimos valores digitados ou não
                                                echo "<option value=$codigo>$descricao</option>";
                                          }
                                          mysql_free_result($resposta_pais);
                                  echo "
                                  </select>
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                  <b>CEP:</b>
                             </td>
                             <td class=\"td2\">
                                  <input type=\"text\" name=\"cep\" value=\"\" size=\"9\" maxlength=\"9\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"#####-###\">
                             </td>
                         </tr>

                          <tr>
                             <td class=\"td1\">
                                 <b>Telefone residencial:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"foneres\" value=\"\" size=\"13\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Telefone comercial:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"fonecom\" value=\"\" size=\"13\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Fax:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"fonefax\" value=\"\" size=\"13\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Celular:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"fonecel\" value=\"\" size=\"13\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Email:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"email\" value=\"\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Contato:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"contato\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Situação correspondência:</b>
                             </td>
                             <td class=\"td2\">
                                  <select name=\"corresp\" class=\"field_listbox\">
                                          <option>Selecione</option>
                                  ";
                                          $select_situacao = "select * from jornal_corresp order by cordes asc";
                                          $resposta_situacao = mysql_query($select_situacao,$conectar) or die ("Não foi possível efetuar a consulta de situacao de correspondência!");
                                          while($linha = mysql_fetch_array($resposta_situacao)){
                                                $corcod = $linha["CORCOD"];
                                                $cordes = $linha["CORDES"];
                                                // ----------  Codigo que retorna os ultimos valores digitados ou não
                                                echo "<option value=$corcod>$cordes</option>";
                                          }
                                          mysql_free_result($resposta_situacao);
                                  echo "
                                  </select>
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
