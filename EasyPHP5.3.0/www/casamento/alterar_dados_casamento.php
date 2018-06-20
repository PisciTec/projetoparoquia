<?php
    include "abreconexao.php";
    include "funcoes.inc";

    echo"
    <html>
          <head>
                <title>SISTEMA DE CONTROLE DE CASAMENTO</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>
      ";
      
      if (isset($_POST["alterar"]) and ($_POST["alterar"])) {
           $codcasamento = $_POST["codcasamento"];
           $casnumero = $_POST["casnumero"];
           $caslivro = $_POST["caslivro"];
           $casfolha = $_POST["casfolha"];
           $casdata = converte_data($_POST["casdata"]);
           $caslocal = $_POST["caslocal"];
           $casnomee = $_POST["casnomee"];
           $casnactoe = converte_data($_POST["casnactoe"]);
           $caspaie = $_POST["caspaie"];
           $casmaee = $_POST["casmaee"];
           $casviue = $_POST["casviue"];
           $casfale = converte_data($_POST["casfale"]);
           $casloce = $_POST["casloce"];
           $casende = $_POST["casende"];
           $casnomea = $_POST["casnomea"];
           $casnactoa = converte_data($_POST["casnactoa"]);
           $caspaia = $_POST["caspaia"];
           $casmaea = $_POST["casmaea"];
           $casviua = $_POST["casviua"];
           $casfala = converte_data($_POST["casfala"]);
           $casloca = $_POST["casloca"];
           $casenda = $_POST["casenda"];
           $casdisp = $_POST["casdisp"];
           $castest1 = $_POST["castest1"];
           $castest2 = $_POST["castest2"];
           $casparoco = $_POST["casparoco"];
           $casobs = $_POST["casobs"];
           $casidadee = $_POST["casidadee"];
           $casidadea = $_POST["casidadea"];
           
           $atualiza = "update casamen set caslivro='$caslivro', casfolha='$casfolha', casdata='$casdata'
           , caslocal='$caslocal', casnomee='$casnomee', casnactoe='$casnactoe', caspaie='$caspaie'
           , casmaee='$casmaee', casviue='$casviue', casfale='$casfale', casloce='$casloce', casende='$casende'
           , casnomea='$casnomea', casnactoa='$casnactoa', caspaia='$caspaia', casmaea='$casmaea'
           , casviua='$casviua', casfala='$casfala', casloca='$casloca', casenda='$casenda', casdisp='$casdisp'
           , castest1='$castest1', castest2='$castest2', casparoco='$casparoco', casobs='$casobs'
           , casnumero='$casnumero', casidadee='$casidadee', casidadea='$casidadea' where codcasamento = '$codcasamento'";
           mysql_query($atualiza, $conectar) or die ("Não foi possivel atualizar dados de pessoa!");
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
                               <h3>Altera Dados de Casamento</h3>
                           </td>
                       </tr>

                       <tr>
                           <td valign=\"top\" align=\"center\">
                               ";
                               $codcasamento = $_GET["codcasamento"];
                               $consulta = "select * from casamen where codcasamento = '$codcasamento'";
                               $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de casamento!");
                               $linha = mysql_fetch_array($resposta);
                               $casnumero = $linha["CASNUMERO"];
                               $caslivro = $linha["CASLIVRO"];
                               $casfolha = $linha["CASFOLHA"];
                               $casdata = converte_data($linha["CASDATA"]);
                               $caslocal = $linha["CASLOCAL"];
                               $casnomee = $linha["CASNOMEE"];
                               $casnactoe = converte_data($linha["CASNACTOE"]);
                               $casidadee = $linha["CASIDADEE"];
                               $caspaie = $linha["CASPAIE"];
                               $casmaee = $linha["CASMAEE"];
                               $casviue = $linha["CASVIUE"];
                               $casfale = converte_data($linha["CASFALE"]);
                               $casloce = $linha["CASLOCE"];
                               $casende = $linha["CASENDE"];
                               $casnomea = $linha["CASNOMEA"];
                               $casnactoa = converte_data($linha["CASNACTOA"]);
                               $casidadea = $linha["CASIDADEA"];
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
                               $casidadee = $linha["CASIDADEE"];
                               $casidadea = $linha["CASIDADEA"];

                               echo "
                               <form method=\"POST\" action=\"alterar_dados_casamento.php\" name=\"f2\">
                               <input type=\"hidden\" name=\"codcasamento\" value=\"$codcasamento\">
                                     <table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" class=\"tabela_formatada\">
                                                                                        
                                            <tr>
                                                <td class=\"td1\"><b>Livro:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"caslivro\" value=\"$caslivro\" size=\"5\" maxlength=\"10\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Folha</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casfolha\" value=\"$casfolha\" size=\"5\" maxlength=\"10\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Número:</b></td>
                                                <td class=\"td2\"><input type=\"text\" name=\"casnumero\" value=\"$casnumero\" size=\"5\" maxlength=\"10\" class=\"field_textbox\"></td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Data:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casdata\" value=\"$casdata\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Local:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"caslocal\" value=\"$caslocal\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan=\"2\" class=\"td2\"><b>Ele:</b></td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Nome:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casnomee\" value=\"$casnomee\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Nacimento:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casnactoe\" value=\"$casnactoe\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\"><b>Idade:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casidadee\" value=\"$casidadee\" size=\"5\" maxlength=\"5\" class=\"field_textbox\">
                                                    * Obs: Campo usado apenas para cadastros antigos
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Pai:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"caspaie\" value=\"$caspaie\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Mãe:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casmaee\" value=\"$casmaee\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Viuvo de:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casviue\" value=\"$casviue\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Falecimento:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casfale\" value=\"$casfale\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Local Nascimento:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casloce\" value=\"$casloce\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Endereço:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casende\" value=\"$casende\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan=\"2\" class=\"td2\">
                                                    <b>Ela:</b>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casnomea\" value=\"$casnomea\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nacimento:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casnactoa\" value=\"$casnactoa\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\"><b>Idade:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casidadea\" value=\"$casidadea\" size=\"5\" maxlength=\"5\" class=\"field_textbox\">
                                                    * Obs: Campo usado apenas para cadastros antigos
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome do Pai:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"caspaia\" value=\"$caspaia\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nome Mãe:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casmaea\" value=\"$casmaea\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Viuvo de:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casviua\" value=\"$casviua\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Falecimento:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casfala\" value=\"$casfala\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Local Nascimento:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casloca\" value=\"$csloca\" size=\"20\" maxlength=\"30\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Endereço:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casenda\" value=\"$casenda\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Com dispensa de:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casdisp\" value=\"$casdisp\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Testemunha 1:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"castest1\" value=\"$castest1\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Testemunha 2:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"castest2\" value=\"$castest2\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Celebrante:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casparoco\" value=\"$casparoco\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Direito Canônico:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"casobs\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
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
