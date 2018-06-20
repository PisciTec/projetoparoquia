<?php
    include "abreconexao.php";
    include "funcoes.inc";

    echo"
    <html>
          <head>
                <title>CONTROLE DE CASAMENTOS</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>

          <body>
                <table width=\"600\" height=\"400\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                       <tr>
                           <td bordercolor=\"#CCCCCC\" height=\"78\">
                               <h3>Certidão de Casamento</h3>
                           </td>
                       </tr>

                       <tr>
                           <td valign=\"top\" align=\"center\">
                               ";
                               $codcasamento = $_GET["codcasamento"];
                               $consulta = "select * from casamen where casnumero = '$casnumero'";
                               $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
                               $linha = mysql_fetch_array($resposta);
                               $caslivro = $linha["CASLIVRO"];
                               $casfolha = $linha["CASFOLHA"];
				$casnumero = $linha["CASNUMERO"];
                               $casdata = converte_data($linha["CASDATA"]);
                               $caslocal = $linha["CASLOCAL"];
                               $casnomee = $linha["CASNOMEE"];
                               $casnactoe = converte_data($linha["CASNACTOE"]);
                               $caspaie = $linha["CASPAIE"];
                               $casmaee = $linha["CASMAEE"];
                               $casviue = $linha["CASVIUE"];
                               $casfale = converte_data($linha["CASFALE"]);
                               $casloce = $linha["CASLOCE"];
                               $casende = $linha["CASENDE"];
                               $casnomea = $linha["CASNOMEA"];
                               $casnactoa = $linha["CASNACTOA"];
                               $caspaia = $linha["CASPAIA"];
                               $casmaea = $linha["CASMAEA"];
                               $casviua = $linha["CASVIUA"];
                               $casfala = converte_data($linha["CASFALA"]);
                               $casloca = $linha["CASLOCA"];
                               $casenda = $linha["CASENDA"];
                               $casdisp = $linha["CASDISP"];
                               $castest1 = $linha["CASTEST1"];
                               $castest2 = $linha["CASTEST2"];
                               $casparoco = $linha["CASPAROCO"];
                               $casobs = $linha["CASOBS"];

                               echo "
                                     <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" class=\"tabela_formatada\">

                                            <tr>
                                                <td class=\"td2\"><b>Livro:</b></td>
                                                <td class=\"td2\">$caslivro</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Folha</b></td>
                                                <td class=\"td2\">$casfolha</td>
                                            </tr>
					    <tr>
                                                <td class=\"td2\"><b>Numero</b></td>
                                                <td class=\"td2\">$casnumero</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Data:</b></td>
                                                <td class=\"td2\">$casdata</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Local:</b></td>
                                                <td class=\"td2\">$caslocal</td>
                                            </tr>

                                            <tr>
                                                <td colspan=\"2\" class=\"td2\"><b>Ele:</b></td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Nome:</b></td>
                                                <td class=\"td2\">$casnomee</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Nacimento:</b></td>
                                                <td class=\"td2\">$casnactoe</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Pai:</b></td>
                                                <td class=\"td2\">$caspaie</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Mãe:</b></td>
                                                <td class=\"td2\">$casmaee</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Viuvo de:</b></td>
                                                <td class=\"td2\">$casviue</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Falecimento:</b></td>
                                                <td class=\"td2\">$casfale</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Local Nascimento:</b></td>
                                                <td class=\"td2\">$casloce</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Endereço:</b></td>
                                                <td class=\"td2\">$casende</td>
                                            </tr>

                                            <tr>
                                                <td colspan=\"2\" class=\"td2\"><b>Ela:</b></td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Nome:</b></td>
                                                <td class=\"td2\">$casnomea</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Nacimento:</b></td>
                                                <td class=\"td2\">$casnactoa</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Pai:</b></td>
                                                <td class=\"td2\">$caspaia</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Mãe:</b></td>
                                                <td class=\"td2\">$casmaea</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Viuvo de:</b></td>
                                                <td class=\"td2\">$casviua</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Falecimento:</b></td>
                                                <td class=\"td2\">$casfala</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Local Nascimento:</b></td>
                                                <td class=\"td2\">$casloca</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Endereço:</b></td>
                                                <td class=\"td2\">$casenda</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Com dispensa de:</b></td>
                                                <td class=\"td2\">$casdisp</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Testemunha 1:</b></td>
                                                <td class=\"td2\">$castest1</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Testemunha 2:</b></td>
                                                <td class=\"td2\">$castest2</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Celebrante:</b></td>
                                                <td class=\"td2\">$casparoco</td>
                                            </tr>

                                            <tr>
                                                <td class=\"td2\"><b>Direito Canônico:</b></td>
                                                <td class=\"td2\">$casobs</td>
                                            </tr>
                                            
                                     </table>
                           </td>
                       </tr>
                </table>
             </body>
    </html>
    ";
?>
