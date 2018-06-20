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
      ";
      
      if (isset($_POST["alterar"]) and ($_POST["alterar"])) {
           $codbatismo = $_POST["codbatismo"];
           $batnumero = $_POST["batnumero"];
           $batlivro = $_POST["batlivro"];
           $batfolha = $_POST["batfolha"];
           $batdata = converte_data($_POST["batdata"]);
           $batlocal = $_POST["batlocal"];
           $batnome = $_POST["batnome"];
           $batnascto = converte_data($_POST["batnascto"]);
           $batparoq = $_POST["batparoq"];
           $batpai = $_POST["batpai"];
           $batmae = $_POST["batmae"];
           $batcasado = $_POST["batcasado"];
           $batpadrin = $_POST["batpadrin"];
           $batmadrin = $_POST["batmadrin"];
           $batceleb = $_POST["batceleb"];
           $batsexo = $_POST["batsexo"];
           $batobs = $_POST["batobs"];
           
           $atualiza = "update batismo set batlivro='$batlivro', batfolha='$batfolha', batdata='$batdata', batlocal='$batlocal', batnome='$batnome', batnascto='$batnascto', batparoq='$batparoq', batpai='$batpai', batmae='$batmae', batcasado='$batcasado', batpadrin='$batpadrin', batmadrin='$batmadrin', batceleb='$batceleb', batsexo='$batsexo', batnumero='$batnumero', batobs='$batobs' where codbatismo = '$codbatismo'";
           mysql_query($atualiza, $conectar) or die ("Não foi possivel atualizar dados de batismo!");
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
                               <h3>Altera Dados de Batismo</h3>
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
                               $batobs = $linha["BATOBS"];

                               echo "
                               <form method=\"POST\" action=\"alterar_dados_batizado.php\" name=\"f2\">
                               <input type=\"hidden\" name=\"codbatismo\" value=\"$codbatismo\">
                                     <table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" class=\"tabela_formatada\">
                                            
                                            <tr>
                                                <td class=\"td1\"><b>Livro:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batlivro\" value=\"$batlivro\" size=\"5\" maxlength=\"10\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Folha</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batfolha\" value=\"$batfolha\" size=\"5\" maxlength=\"10\" class=\"field_textbox\">
                                                </td>
                                            </tr>
					    <tr>
                                                <td class=\"td1\">
                                                    <b>Número:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batnumero\" value=\"$batnumero\" size=\"5\" maxlength=\"10\" class=\"field_textbox\">
                                                </td>
                                            </tr>
                                            

                                            <tr>
                                                <td class=\"td1\"><b>Nome:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batnome\" value=\"$batnome\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Sexo(M/F):</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batsexo\" value=\"$batsexo\" size=\"1\" maxlength=\"1\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Data Batizado:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batdata\" value=\"$batdata\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Local:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batlocal\" value=\"$batlocal\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Data Nascimento:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batnascto\" value=\"$batnascto\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Paróquia:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batparoq\" value=\"$batparoq\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Pai:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batpai\" value=\"$batpai\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Mãe:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batmae\" value=\"$batmae\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Casados(S/N):</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batcasado\" value=\"$batcasado\" size=\"1\" maxlength=\"1\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Padrinho:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batpadrin\" value=\"$batpadrin\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Madrinha:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batmadrin\" value=\"$batmadrin\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class=\"td1\"><b>Observação:</b></td>
                                                <td class=\"td2\">
                                                    <textarea rows=\"5\" cols=\"40\" name=\"batobs\" class=\"field_textbox\">$batobs</textarea>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\"><b>Celebrante:</b></td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"batceleb\" value=\"$batceleb\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
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
