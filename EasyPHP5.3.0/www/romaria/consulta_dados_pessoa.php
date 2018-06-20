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
                               <h3>Consulta de Dados de Pessoa</h3>
                           </td>
                       </tr>

                       <tr>
                           <td valign=\"top\" align=\"center\">
                               ";
                               $cod_pessoa_jornal = $_GET["cod_pessoa_jornal"];
                               $consulta = "select * from tab_pessoa_jornal inner join tab_bairro inner join tab_municipio inner join tab_situacao_civil inner join tab_situacao_endereco where (cod_pessoa_jornal = '$cod_pessoa_jornal') and (tab_pessoa_jornal.cod_bairro = tab_bairro.cod_bairro) and (tab_pessoa_jornal.cod_municipio = tab_municipio.cod_municipio) and (tab_pessoa_jornal.cod_situacao_civil = tab_situacao_civil.cod_situacao_civil) and (tab_situacao_endereco.cod_situacao_endereco = tab_pessoa_jornal.cod_situacao_endereco)";
                               $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
                               $linha = mysql_fetch_array($resposta);
                               $nome_pessoa = $linha["nome_pessoa"];
                               $data_nascimento = converte_data($linha["data_nascimento"]);
                               $nome_pai = $linha["nome_pai"];
                               $nome_mae = $linha["nome_mae"];
                               $endereco = $linha["endereco"];
                               $cpf = $linha["cpf"];
                               $rg = $linha["rg"];
                               $cep = $linha["cep"];
                               $nome_bairro = $linha["nome_bairro"];
                               $nome_municipio = $linha["nome_municipio"];
                               $descricao_situacao_civil = $linha["descricao_situacao_civil"];
                               $nome_conjuge = $linha["nome_conjuge"];
                               $telefone_residencial = $linha["telefone_residencial"];
                               $celular = $linha["celular"];
                               $profissao = $linha["profissao"];
                               $descricao_situacao_endereco = $linha["descricao_situacao_endereco"];

                               echo "
                                     <table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" class=\"tabela_formatada\">
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Código Pessoa:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $cod_pessoa_jornal
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $nome_pessoa
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>CPF:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $cpf
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>RG:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $rg
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Data nascimento:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $data_nascimento
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome do Pai:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $nome_pai
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome Mãe:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $nome_mae
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
                                                    $nome_bairro
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Cidade:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $nome_municipio
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Situação civil:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $descricao_situacao_civil
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome conjuge:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $nome_conjuge
                                                </td>
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
                                                    <b>Situação endereço:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    $descricao_situacao_endereco
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
