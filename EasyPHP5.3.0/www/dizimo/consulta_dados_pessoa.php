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

          <body>
                <table width=\"600\" height=\"400\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                       <tr>
                           <td bordercolor=\"#CCCCCC\" height=\"78\">
                               <h3>Consulta de Dados de Pessoa</h3>
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
                                     </table>
                           </td>
                       </tr>
                </table>
             </body>
    </html>
    ";
?>
