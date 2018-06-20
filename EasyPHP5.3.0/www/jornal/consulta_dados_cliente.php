<?php
    include "abreconexao.php";
    include "funcoes.inc";

    echo"
    <html>
          <head>
                <title>CONTROLE DE JORNAL</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>

          <body>
                <table width=\"600\" height=\"400\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                       <tr>
                           <td bordercolor=\"#CCCCCC\" height=\"78\">
                               <h3>Consulta de Dados de Cliente</h3>
                           </td>
                       </tr>

                       <tr>
                           <td valign=\"top\" align=\"center\">
                               ";
                               $codcliente = $_GET["codcliente"];
                               $consulta = "select * from jornal_cliente inner join jornal_cidade inner join jornal_pais inner join jornal_corresp where (codcliente = '$codcliente') and (jornal_cliente.cidade = jornal_cidade.cidcod) and (jornal_cliente.pais = jornal_pais.codigo) and (jornal_cliente.corresp = jornal_corresp.corcod)";
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
                               $ciddes = $linha["CIDDES"];
                               $ciduf = $linha["CIDUF"];
                               $descricao = $linha["DESCRICAO"];
                               $cordes = $linha["CORDES"];
                               
                               $descricao_tipo["F"] = "Pessoa física";
                               $descricao_tipo["J"] = "Pessoa jurídica";
                               
                               $descricao_ativo[0] = "Desativada";
                               $descricao_ativo[1] = "Ativa";
                               
                               echo "
                                     <table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" class=\"tabela_formatada\">
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Código Cliente:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $codcliente
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
                                                    <b>Situação:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $descricao_ativo[$ativo]
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
                                                    <b>Tipo pessoa:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $descricao_tipo[$tipo]
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>CPF:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $cgccpf
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>RG:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $cgfrg
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
                                                    <b>Endereço:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $endereco
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
                                                    $ciddes
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Estado:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $ciduf
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>País:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $descricao
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
                                                    <b>Telefone residencial:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $foneres
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Telefone comercial:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $fonecom
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Fax:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $fonefax
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Celular:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $fonecel
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Email:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $email
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Contato:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $contato
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Situação correspondência:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $cordes
                                                </td>
                                            </tr>
                                     </table>
                           </td>
                       </tr>
                </table>
                <br>
                <h3>Histórico de ativação e desativação de cliente</h3>
                ";
                $consulta = "select * from jornal_processo_motivo where codcliente = '$codcliente'";
                $resposta = mysql_query($consulta) or die ("Não foi possível realizar consulta de processo");
                echo "

                <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" class=\"tabela_formatada\" width=\"100%\">
                       <tr>
                           <td class=\"td1\" width=\"70%\">Motivo</td>
                           <td class=\"td1\" width=\"15%\">Tipo Motivo</td>
                           <td class=\"td1\" width=\"15%\">Data</td>
                       </tr>
                ";
                while ($linha = mysql_fetch_array($resposta)) {
                      $data_alteracao = converte_data($linha["data_alteracao"]);
                      echo "
                      <tr>
                      <td class=\"td2\">$linha[motivo]</td>
                      <td class=\"td2\">$linha[tipo_motivo]</td>
                      <td class=\"td2\">$data_alteracao</td>
                      </tr>
                      ";
                }
                echo "
                </table>
             </body>
    </html>
    ";
?>
