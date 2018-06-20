<?php
    include "abreconexao.php";
    include "funcoes.inc";

    echo"
    <html>
          <head>
                <title>CONTROLE DE DÍZIMO</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>
      ";
      
      if (isset($_POST["alterar"]) and ($_POST["alterar"])) {

           $nascto = converte_data($_POST["nascto"]);
           $datacasa = converte_data($_POST["datacasa"]);
           $admissao = converte_data($_POST["admissao"]);
           
           $atualiza = "update dizimo set NOME='$_POST[nome]', NASCTO='$nascto', PAI='$_POST[pai]', MAE='$_POST[mae]', ENDERECO='$_POST[endereco]', BAIRRO='$_POST[bairro]', CIDADE='$_POST[cidade]', ESTADO='$_POST[estado]', TELEFONE='$_POST[telefone]', CEP='$_POST[cep]', CONJUGE='$_POST[conjuge]', DATACASA='$datacasa', PAROQUIA='$_POST[paroquia]', PROFISSAO='$_POST[profissao]', ATIVIDADE='$_POST[atividade]', ADMISSAO='$admissao', VALOR='$_POST[valor]' where CODIGO = '$_POST[codigo]'";
           mysql_query($atualiza, $conectar) or die ("Não foi possivel atualizar dados de pessoa!");
           echo "
           <script language=\"JavaScript\">
                  alert('Dados atualizados com sucesso!');
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
                               <h3>Altera Dados de Pessoa</h3>
                           </td>
                       </tr>

                       <tr>
                           <td valign=\"top\" align=\"center\">
                               ";
                               $codigo = $_GET["codigo"];
                               $consulta = "select * from dizimo where CODIGO = '$codigo'";
                               $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
                               $linha = mysql_fetch_array($resposta);
                               $nome = $linha["NOME"];
                               $nascto = converte_data($linha["NASCTO"]);
                               $pai = $linha["PAI"];
                               $mae = $linha["MAE"];
                               $endereco = $linha["ENDERECO"];
                               $cep = $linha["CEP"];
                               $bairro = $linha["BAIRRO"];
                               $cidade = $linha["CIDADE"];
                               $estado = $linha["ESTADO"];
                               $telefone = $linha["TELEFONE"];
                               $conjuge = $linha["CONJUGE"];
                               $paroquia = $linha["PAROQUIA"];
                               $datacasa = converte_data($linha["DATACASA"]);
                               $profissao = $linha["PROFISSAO"];
                               $atividade = $linha["ATIVIDADE"];
                               $admissao = converte_data($linha["ADMISSAO"]);
                               $valor = $linha["VALOR"];

                               echo "
                               <form method=\"POST\" action=\"alterar_dados_pessoa.php\" name=\"f2\">
                               <input type=\"hidden\" name=\"codigo\" value=\"$codigo\">
                                     <table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" class=\"tabela_formatada\">
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Código Pessoa:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $codigo
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"nome\" value=\"$nome\" size=\"30\" maxlength=\"40\" class=\"field_textbox\">
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
                                                    <b>Nome do Pai:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"pai\" value=\"$pai\" size=\"30\" maxlength=\"40\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome Mãe:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"mae\" value=\"$mae\" size=\"30\" maxlength=\"40\" class=\"field_textbox\">
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
                                                    <b>CEP:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"cep\" value=\"$cep\" size=\"9\" maxlength=\"9\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"#####-###\">
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
                                                    <input type=\"text\" name=\"cidade\" value=\"$cidade\" size=\"20\" maxlength=\"25\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Estado:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"estado\" value=\"$estado\" size=\"2\" maxlength=\"2\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Telefone((##)####-####):</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"telefone\" value=\"$telefone\" size=\"13\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome conjuge:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"conjuge\" value=\"$conjuge\" size=\"40\" maxlength=\"50\" class=\"field_textbox\">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Data casamento:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"datacasa\" value=\"$datacasa\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Paróquia:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"paroquia\" value=\"$paroquia\" size=\"20\" maxlength=\"25\" class=\"field_textbox\">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td height=\"5\" bgcolor=\"#CCCCCC\"></td>
                                                <td height=\"5\" bgcolor=\"#CCCCCC\"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Profissão:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"profissao\" value=\"$profissao\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Atividade:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"atividade\" value=\"$atividade\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td height=\"5\" bgcolor=\"#CCCCCC\"></td>
                                                <td height=\"5\" bgcolor=\"#CCCCCC\"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Admissão:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"admissao\" value=\"$admissao\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Valor:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"valor\" value=\"$valor\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
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
