<?php
    include "abreconexao.php";
    include "funcoes.inc";

    echo"
    <html>
          <head>
                <title>CONTROLE DE ROMARIA</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>
      ";
      
      if (isset($_POST["alterar"]) and ($_POST["alterar"])) {

           $cod_romaria = $_POST["cod_romaria"];
           $fretante = $_POST["fretante"];
           $endereco = $_POST["endereco"];
           $cidade = $_POST["cidade"];
           $estado = $_POST["estado"];
           $paroquias = $_POST["paroquias"];
           $vigarios = $_POST["vigarios"];
           $data_romaria = converte_data($_POST["data_romaria"]);
           $num_veiculos = $_POST["num_veiculos"];
           $num_romeiros = $_POST["num_romeiros"];
           $ranchos = $_POST["ranchos"];
           $cod_motivo_romaria = $_POST["cod_motivo_romaria"];
           $cod_animador_festa = $_POST["cod_animador_festa"];
           $reuniao_depois = $_POST["reuniao_depois"];

           $atualiza = "update tab_romaria set fretante='$fretante', endereco='$endereco', cidade='$cidade', estado='$estado', paroquias='$paroquias', vigarios='$vigarios', data_romaria='$data_romaria', num_veiculos='$num_veiculos', num_romeiros='$num_romeiros', ranchos='$ranchos', cod_motivo_romaria = '$cod_motivo_romaria', cod_animador_festa ='$cod_animador_festa', reuniao_depois='$reuniao_depois' where cod_romaria = '$cod_romaria'";
           mysql_query($atualiza, $conectar) or die ("Não foi possivel atualizar dados de romaria!");
           echo "

           <script language=\"JavaScript\">
                  alert('Dados atualizados com sucesso');
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
                               <h3>Altera Dados de Romaria</h3>
                           </td>
                       </tr>

                       <tr>
                           <td valign=\"top\" align=\"center\">
                               ";
                               $codigo = $_GET["codigo"];
                               $consulta = "select * from tab_romaria where cod_romaria = '$codigo'";
                               $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
                               $linha = mysql_fetch_array($resposta);
                               $fretante = $linha["fretante"];
                               $cidade = $linha["cidade"];
                               $endereco = $linha["endereco"];
                               $estado = $linha["estado"];
                               $paroquias = $linha["paroquias"];
                               $vigarios = $linha["vigarios"];
                               $data_romaria = converte_data($linha["data_romaria"]);
                               $num_veiculos= $linha["num_veiculos"];
                               $num_romeiros = $linha["num_romeiros"];
                               $ranchos = $linha["ranchos"];
                               $cod_motivo_romaria = $linha["cod_motivo_romaria"];
                               $cod_animador_festa = $linha["cod_animador_festa"];
                               $reuniao_depois = $linha["reuniao_depois"];

                               echo "
                               <form method=\"POST\" action=\"alterar_dados_romaria.php\" name=\"f2\">
                               <input type=\"hidden\" name=\"cod_romaria\" value=\"$codigo\">
                                     <table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" class=\"tabela_formatada\">
                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Fretante:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"fretante\" value=\"$fretante\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Endereço:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"endereco\" value=\"$endereco\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Cidade:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"cidade\" value=\"$cidade\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Estado:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"estado\" value=\"$estado\" size=\"15\" maxlength=\"30\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Paroquia:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"paroquias\" value=\"$paroquias\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Vigario:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"vigarios\" value=\"$vigarios\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Data romaria:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"data_romaria\" value=\"$data_romaria\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nº veículos:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"num_veiculos\" value=\"$num_veiculos\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Nº romeiros:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"num_romeiros\" value=\"$num_romeiros\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Rancho:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <input type=\"text\" name=\"ranchos\" value=\"$ranchos\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Motivo Romaria:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <select name=\"cod_motivo_romaria\" class=\"field_listbox\">
                                                            ";
                                                            $select = "select cod_motivo_romaria, descricao_motivo_romaria from tab_motivo_romaria order by descricao_motivo_romaria asc";
                                                            $resposta = mysql_query($select, $conectar) or die ("Não foi possivel efetuar a consulta de bairro");
                                                            while($linha = mysql_fetch_array($resposta)){
                                                                         $cod_motivo_romaria_novo = $linha["cod_motivo_romaria"];
                                                                         $descricao_motivo_romaria = $linha["descricao_motivo_romaria"];
                                                                         //----------  Codigo que retorna os ultimos valores digitados ou não
                                                                         if ($cod_motivo_romaria == $cod_motivo_romaria_novo){
                                                                            echo "<option value=$cod_motivo_romaria_novo selected>$descricao_motivo_romaria</option>";
                                                                         }
                                                                         else {
                                                                            echo "<option value=$cod_motivo_romaria_novo>$descricao_motivo_romaria</option>";
                                                                         }
                                                            }
                                                            mysql_free_result($resposta);
                                                            echo "
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class=\"td1\">
                                                    <b>Animador da festa:</b>
                                                </td>
                                                <td class=\"td2\">
                                                    <select name=\"cod_animador_festa\" class=\"field_listbox\">
                                                            ";
                                                            $select = "select cod_animador_festa, descricao_animador_festa from tab_animador_festa order by descricao_animador_festa asc";
                                                            $resposta = mysql_query($select,$conectar) or die ("Não foi possível efetuar a consulta de municipios!");
                                                            while($linha = mysql_fetch_array($resposta)){
                                                                         $cod_animador_festa_novo = $linha["cod_animador_festa"];
                                                                         $descricao_animador_festa = $linha["descricao_animador_festa"];
                                                                         // ----------  Codigo que retorna os ultimos valores digitados ou não
                                                                         if ($cod_animador_festa == $cod_animador_festa_novo){
                                                                            echo "<option value=$cod_animador_festa_novo selected>$descricao_animador_festa</option>";
                                                                         }
                                                                         else {
                                                                              echo "<option value=$cod_animador_festa_novo>$descricao_animador_festa</option>";
                                                                         }
                                                            }
                                                            mysql_free_result($resposta);
                                                            echo "
                                                            </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class=\"td1\">
                                                        <b>Houve reunião depois(sim/não):</b>
                                                    </td>
                                                    <td class=\"td2\">
                                                        <input type=\"text\" name=\"reuniao_depois\" value=\"$reuniao_depois\" size=\"3\" maxlength=\"3\" class=\"field_textbox\">
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
