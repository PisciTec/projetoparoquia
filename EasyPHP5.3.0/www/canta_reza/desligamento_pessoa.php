<?php
    include "abreconexao.php";
    include "funcoes.inc";

    echo"
    <html>
          <head>
                <title>SISTEMA CANTA E REZA</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>
      ";
      
      if (isset($_POST["alterar"]) and ($_POST["alterar"])) {

           $nascto = converte_data($_POST["nascto"]);
           $datacasa = converte_data($_POST["datacasa"]);
           $admissao = converte_data($_POST["admissao"]);
           
           $atualiza = "update canta_reza_pessoa set NOME='$_POST[nome]', NASCTO='$nascto', PAI='$_POST[pai]', MAE='$_POST[mae]', ENDERECO='$_POST[endereco]', BAIRRO='$_POST[bairro]', CIDADE='$_POST[cidade]', ESTADO='$_POST[estado]', TELEFONE='$_POST[telefone]', CEP='$_POST[cep]', CONJUGE='$_POST[conjuge]', DATACASA='$datacasa', PAROQUIA='$_POST[paroquia]', PROFISSAO='$_POST[profissao]', ATIVIDADE='$_POST[atividade]', ADMISSAO='$admissao', VALOR='$_POST[valor]' where CODIGO = '$_POST[codigo]'";
           mysql_query($atualiza, $conectar) or die ("N�o foi possivel atualizar dados de pessoa!");
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
                               <h3>Desligamento de Pessoa</h3>
                           </td>
                       </tr>

                       <tr>
                           <td valign=\"top\" align=\"center\">
                               ";
                               $codigo = $_GET["codigo"];
                               $consulta = "select * from canta_reza_pessoa where CODIGO = '$codigo'";
                               $resposta = mysql_query($consulta, $conectar) or die ("N�o foi poss�vel realizar a consulta de pessoa!");
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
                                                    <b>C�digo Pessoa:</b>
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
                                                    $nome
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Data nascimento:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $nascto
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome do Pai:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $pai
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome M�e:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $mae
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Endere�o:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $endereco
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>CEP:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $cep
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Bairro:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $bairro
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Cidade:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $cidade
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Estado:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $estado
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Telefone:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $telefone
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome conjuge:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $conjuge
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Data casamento:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $datacasa
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Par�quia:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $paroquia
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td height=\"5\" bgcolor=\"#CCCCCC\"></td>
                                                <td height=\"5\" bgcolor=\"#CCCCCC\"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Profiss�o:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $profissao
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Atividade:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $atividade
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td height=\"5\" bgcolor=\"#CCCCCC\"></td>
                                                <td height=\"5\" bgcolor=\"#CCCCCC\"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Admiss�o:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $admissao
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Valor:</b>
                                                </td>
                                                <td class=\"td2\">
                                                   $valor
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Desist�ncia:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"desiste\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Motivo:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <select name=\"motivo\" class=\"field_listbox\">
                                                            <option></option>
                                                    ";
                                                            $select = "select codigo, descricao from motivo order by descricao asc";
                                                            $resposta = mysql_query($select, $conectar) or die ("N�o foi possivel efetuar a consulta de motivo");
                                                            while($linha = mysql_fetch_array($resposta)){
                                                                 $codigo = $linha["codigo"];
                                                                 $descricao = $linha["descricao"];
                                                                 echo "<option value=$codigo>$descricao</option>";
                                                            }
                                                            mysql_free_result($resposta);
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
