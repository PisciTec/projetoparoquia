<?php
    include "abreconexao.php";
    include "funcoes.inc";

    echo"
    <html>
          <head>
                <title>CONTROLE DE BATIZADO</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>

          <body>
                <table width=\"600\" height=\"400\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                       <tr>
                           <td bordercolor=\"#CCCCCC\" height=\"78\">
                               <h3>Consulta de Dados de Batismo</h3>
                           </td>
                       </tr>

                       <tr>
                           <td valign=\"top\" align=\"center\">
                               ";
                               $codbatismo = $_GET["codbatismo"];
                               $consulta = "select * from batismo where codbatismo = '$codbatismo'";
                               $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de batismo!");
                               $linha = mysql_fetch_array($resposta);
                               $batnumero = $linha["BATNUMERO"];
                               $batlivro = $linha["BATLIVRO"];
                               $batfolha = $linha["BATFOLHA"];
                               $batdata = converte_data($linha["BATDATA"]);
                               $batlocal = $linha["BATLOCAL"];
                               $batnome = $linha["BATNOME"];
                               $batnascto = converte_data($linha["BATNASCTO"]);
                               $batparoq = $linha["BATPAROQ"];
                               $batpai = $linha["BATPAI"];
                               $batmae = $linha["BATMAE"];
                               $batcasado = $linha["BATCASADO"];
                               $batpadrin = $linha["BATPADRIN"];
                               $batmadrin = $linha["BATMADRIN"];
                               $batceleb = $linha["BATCELEB"];
                               $batsexo = $linha["BATSEXO"];

                               echo "
                                     <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" class=\"tabela_formatada\">
                                            
                                            <tr>
                                                <td class=\"td1\"><b>Livro:</b></td>
                                                <td class=\"td2\">$batlivro</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Folha</b></td>
                                                <td class=\"td2\">$batfolha</td>
                                            </tr>
					    <tr>
                                                <td class=\"td1\"><b>Número:</b></td>
                                                <td class=\"td2\">$batnumero</td>
                                            </tr>
                                            
					    <tr>
                                                <td class=\"td1\"><b>Data:</b></td>
                                                <td class=\"td2\">$batdata</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Local:</b></td>
                                                <td class=\"td2\">$batlocal</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Nome:</b></td>
                                                <td class=\"td2\">$batnome</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\"><b>Sexo:</b></td>
                                                <td class=\"td2\">$batsexo</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Data Nascimento:</b></td>
                                                <td class=\"td2\">$batnascto</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Pai:</b></td>
                                                <td class=\"td2\">$batpai</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Mãe:</b></td>
                                                <td class=\"td2\">$batmae</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Casados:</b></td>
                                                <td class=\"td2\">$batcasado</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Paróquia:</b></td>
                                                <td class=\"td2\">$batparoq</td>
                                            </tr>

					    <tr>
						<td class=\"td1\"><b>Padrinho:</b></td>
                                                <td class=\"td2\">$batpadrin</td>
                                            </tr>
					   
					    <tr>
                                                <td class=\"td1\"><b>Madrinha:</b></td>
                                                <td class=\"td2\">$batmadrin</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Celebrante:</b></td>
                                                <td class=\"td2\">$batceleb</td>
                                            </tr>

                                     </table>
                           </td>
                       </tr>
                </table>
             </body>
    </html>
    ";
?>
