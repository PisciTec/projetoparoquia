<?php
    include "abreconexao.php";
    include "funcoes.inc";

    echo"
    <html>
          <head>
                <title>SISTEMA DE JORNAL</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>
      ";
      
      if (isset($_POST["alterar"]) and ($_POST["alterar"])) {

           $codcliente = $_POST["codcliente"];
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
           $cadastro = converte_data($_POST["cadastro"]);
           $contato = $_POST["contato"];
           $corresp = $_POST["corresp"];
           $ativo = $_POST["ativo"];
           
           $atualiza = "update jornal_cliente set NOME='$nome', TIPO='$tipo', CGCCPF='$cgccpf', CGFRG='$cgfrg', NASCTO='$nascto', ENDERECO='$endereco', BAIRRO='$bairro', CIDADE='$cidade', CEP='$cep', ESTADO='$estado', PAIS='$pais', FONERES='$foneres', FONECOM='$fonecom', FONEFAX='$fonefax', FONECEL='$fonecel', EMAIL='$email', CADASTRO='$cadastro', CONTATO='$contato', CORRESP='$corresp', ATIVO='$ativo' where CODCLIENTE = '$codcliente'";
           mysql_query($atualiza, $conectar) or die ("Não foi possivel atualizar dados do cliente!");
           echo "
           <script language=\"JavaScript\">
                  alert('Dados atualizados co sucesso!');
                  opener.focus();
                  close();
           </script>
           ";
      }
      
      echo "
          <body onLoad=\"Mascaras.carregar();\">
                <table width=\"600\" height=\"400\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                       <tr>
                           <td bordercolor=\"#CCCCCC\" height=\"78\">
                               <h3>Altera Dados de Cliente</h3>
                           </td>
                       </tr>

                       <tr>
                           <td valign=\"top\" align=\"center\">
                               ";
                               $codigo = $_GET["codigo"];
                               $consulta = "select * from jornal_cliente where CODCLIENTE = '$codigo'";
                               $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de cliente!");
                               $linha = mysql_fetch_array($resposta);
                               $nome = $linha["NOME"];
                               $tipo = $linha["TIPO"];
                               $cgccpf = $linha["CGCCPF"];
                               $cgfrg = $linha["CGFRG"];
                               $nascto = converte_data($linha["NASCTO"]);
                               $endereco = $linha["ENDERECO"];
                               $bairro = $linha["BAIRRO"];
                               $cidade = $linha["CIDADE"];
                               $cep = $linha["CEP"];
                               $estado = $linha["ESTADO"];
                               $pais = $linha["PAIS"];
                               $foneres = $linha["FONERES"];
                               $fonecom = $linha["FONECOM"];
                               $fonefax = $linha["FONEFAX"];
                               $fonecel = $linha["FONECEL"];
                               $email = $linha["EMAIL"];
                               $cadastro = converte_data($linha["CADASTRO"]);
                               $contato = $linha["CONTATO"];
                               $corresp = $linha["CORRESP"];
                               $ativo = $linha["ATIVO"];

                               echo "
                               <form method=\"POST\" action=\"alterar_dados_cliente.php\" name=\"f2\">
                               <input type=\"hidden\" name=\"codcliente\" value=\"$codigo\">
                               <input type=\"hidden\" name=\"ativo\" value=\"$ativo\">
                               <input type=\"hidden\" name=\"cadastro\" value=\"$cadastro\">
                                     <table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" class=\"tabela_formatada\">
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Código Cliente:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $codigo
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Cadastro:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $cadastro
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"nome\" value=\"$nome\" size=\"40\" maxlength=\"40\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Tipo pessoa:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <select name=\"tipo\" class=\"field_listbox\">
                                                    <option>Selecione</option>
                                                    <option value=\"F\""; if ($tipo == "F") echo "selected"; echo ">Física</option>
                                                    <option value=\"J\""; if ($tipo == "J") echo "selected"; echo ">Jurídica</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>CPF:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"cgccpf\" value=\"$cgccpf\" size=\"14\" maxlength=\"14\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"###.###.###.##\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>RG:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"cgfrg\" value=\"$cgfrg\" size=\"20\" maxlength=\"20\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Data nascimento:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"nascto\" value=\"$nascto\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Endereço:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"endereco\" value=\"$endereco\" size=\"40\" maxlength=\"50\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Bairro:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"bairro\" value=\"$bairro\" size=\"20\" maxlength=\"25\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Cidade:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <select name=\"cidade\" class=\"field_listbox\">
                                                            <option>Selecione</option>";
                                                            $select_cidade = "select * from jornal_cidade order by ciddes asc";
                                                            $resposta_cidade = mysql_query($select_cidade, $conectar) or die ("Não foi possivel efetuar a consulta de cidade!");
                                                            while($linha = mysql_fetch_array($resposta_cidade)){
                                                                         $cidcod = $linha["CIDCOD"];
                                                                         $ciddes = $linha["CIDDES"];
                                                                         $ciduf = $linha["CIDUF"];
                                                                         // ----------  Codigo que retorna os ultimos valores digitados ou não
                                                                         if ($cidcod == $cidade) {
                                                                            echo "<option value=$cidcod selected>$ciddes - $ciduf</option>";
                                                                         }
                                                                         else {
                                                                              echo "<option value=$cidcod>$ciddes - $ciduf</option>";
                                                                         }
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
                                                            <option>Selecione</option>";
                                                            $select_pais = "select * from jornal_pais order by descricao asc";
                                                            $resposta_pais = mysql_query($select_pais,$conectar) or die ("Não foi possível efetuar a consulta de paises!");
                                                            while($linha = mysql_fetch_array($resposta_pais)){
                                                                         $codigo = $linha["CODIGO"];
                                                                         $descricao = $linha["DESCRICAO"];
                                                                         // ----------  Codigo que retorna os ultimos valores digitados ou não
                                                                         if ($codigo == $pais){
                                                                              echo "<option value=$codigo selected>$descricao</option>";
                                                                         }
                                                                         else {
                                                                              echo "<option value=$codigo>$descricao</option>";
                                                                         }
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
                                                    <input type=\"text\" name=\"cep\" value=\"$cep\" size=\"9\" maxlength=\"9\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"#####-###\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Telefone residencial:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"foneres\" value=\"$foneres\" size=\"13\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Telefone comercial:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"fonecom\" value=\"$fonecom\" size=\"13\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Fax:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"fonefax\" value=\"$fonefax\" size=\"13\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Celular:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"fonecel\" value=\"$fonecel\" size=\"13\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Email:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"email\" value=\"$email\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Contato:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"contato\" value=\"$contato\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Situação correspondência:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <select name=\"corresp\" class=\"field_listbox\">
                                                            <option>Selecione</option>";
                                                            $select_situacao = "select * from jornal_corresp order by cordes asc";
                                                            $resposta_situacao = mysql_query($select_situacao,$conectar) or die ("Não foi possível efetuar a consulta de situacao de correspondência!");
                                                            while($linha = mysql_fetch_array($resposta_situacao)){
                                                                         $corcod = $linha["CORCOD"];
                                                                         $cordes = $linha["CORDES"];
                                                                         // ----------  Codigo que retorna os ultimos valores digitados ou não
                                                                         if ($corcod == $corresp){
                                                                              echo "<option value=$corcod selected>$cordes</option>";
                                                                         }
                                                                         else {
                                                                              echo "<option value=$corcod>$cordes</option>";
                                                                         }
                                                            }
                                                            mysql_free_result($resposta_situacao);
                                                            echo "
                                                    </select>
                                                </td>
                                            </tr>
                                     </table>
                                     <br>
                                     <input type=\"submit\" value=\"Alterar\" name=\"alterar\" class=\"botao_ok\">
                               </form>
                           </td>
                       </tr>
                </table>
             </body>
    </html>
    ";
?>
