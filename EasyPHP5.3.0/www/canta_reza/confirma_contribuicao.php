<?php
    include "abreconexao.php";
    include "funcoes.inc";

    if (isset($_POST[cadastro])) {
          $codigo = $_POST["codigo"];
          $ano = $_POST["ano"];
          $mes = $_POST["mes"];
          $valor = $_POST["valor"];
          $data = date("Y-m-d");
          
          $select = "select * from canta_reza_pagamento where CODIGO = '$codigo' and ANO = '$ano' and MES = '$mes'";
          $retorno = mysql_query($select, $conectar) or die ("Não foi possível consultar dados de contribuição");
          $num = mysql_num_rows($retorno);
          
          if ($num == 0){
             $insert = "insert into canta_reza_pagamento (CODIGO, ANO, MES, VALOR, DATA) values ('$codigo','$ano','$mes','$valor','$data')";
             mysql_query($insert, $conectar) or die ("Não foi possivel inserir dados pagamento de dizimo!");
             echo "
             <script language=\"JavaScript\">
                 alert('Dados inseridos com sucesso!');
                 close();
             </script>
          ";
          }
          else {
             echo "
             <script language=\"JavaScript\">
                 alert('Pagamento já realizado!');
                 close();
             </script>
             ";
          }
    }

    echo"
    <html>
          <head>
                <title>SISTEMA CANTA E REZA</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>

          <body onLoad=\"Mascaras.carregar();\">
                <table width=\"600\" height=\"400\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                       <tr>
                           <td bordercolor=\"#CCCCCC\" height=\"78\">
                               <h3>Cadastro de Contribuição</h3>
                           </td>
                       </tr>

                       <tr>
                           <td valign=\"top\" align=\"center\">
                               ";
                               $codigo = $_GET["codigo"];
                               $consulta = "select * from canta_reza_pessoa where CODIGO = '$codigo'";
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

                               $consulta_pagamento = "select ANO, MES, A.VALOR, DATA from canta_reza_pagamento A inner join canta_reza_pessoa B where A.CODIGO = B.CODIGO and B.CODIGO = $codigo order by A.DATA desc limit 10";
                               $resposta_pagamento = mysql_query($consulta_pagamento, $conectar) or die ("Não foi possivel consultar dados de pagamento!");

                               echo "
                                     <form method=\"POST\" action=\"confirma_contribuicao.php\" name=\"f2\">
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
                                                    <b>Nome Mãe:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $mae
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Endereço:</b>
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
                                                    <b>Paróquia:</b>
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
                                                    <b>Profissão:</b>
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
                                                    <b>Admissão:</b>
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
                                                    <b>Ano pagamento:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"ano\" size=\"4\" maxlength=\"4\" class=\"field_textbox\">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Mes de pagamento</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <select name=\"mes\" class=\"field_listbox\">
                                                            <option></option>
                                                            <option value=\"01\">1 - Janeiro</option>
                                                            <option value=\"02\">2 - Fevereiro</option>
                                                            <option value=\"03\">3 - Março</option>
                                                            <option value=\"04\">4 - Abril</option>
                                                            <option value=\"05\">5 - Maio</option>
                                                            <option value=\"06\">6 - Junho</option>
                                                            <option value=\"07\">7 - Julho</option>
                                                            <option value=\"08\">8 - Agosto</option>
                                                            <option value=\"09\">9 - Setembro</option>
                                                            <option value=\"10\">10 - Outubro</option>
                                                            <option value=\"11\">11 - Novembro</option>
                                                            <option value=\"12\">12 - Dezembro</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Valor pago R$:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"valor\" size=\"15\" maxlength=\"30\" class=\"field_textbox\">
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
                                     <br>
                                     <h3>Últimos 10 pagamentos</h3>
                                     <table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" class=\"tabela_formatada\">
                                            <tr>
                                                <td class=\"td1\">Data</td>
                                                <td class=\"td1\">Valor</td>
                                            </tr>
                                     ";
                                              while ($linha = mysql_fetch_array($resposta_pagamento)) {
                                                    $data = converte_data($linha[DATA]);
                                                    $valor = $linha[VALOR];
                                                    echo "
                                                    <tr>
                                                        <td class=\"td2\">$data</td>
                                                        <td class=\"td2\">$valor</td>
                                                    </tr>
                                                    ";
                                              }
                                     echo "
                                     </table>
                           </td>
                       </tr>
                </table>
             </body>
    </html>
    ";
?>
