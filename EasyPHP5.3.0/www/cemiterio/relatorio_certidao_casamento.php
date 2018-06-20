<?php
    include "abreconexao.php";
    include "funcoes.inc";

    echo"
    <html>
          <head>
                <title>CONTROLE DE CASAMENTO</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>

          <body>
          ";
          
          if (!isset($_POST["consulta"])){
                echo "
                   <h3>Dados adicionais</h3>
                   <form name=\"form1\" method=\"POST\" action=\"relatorio_certidao_casamento.php\">
                   <input type=\"hidden\" name=\"codcasamento\" value=\"$_GET[codcasamento]\">
                   <label>Assinante do documento</label><br>
                   <select name=\"cod_assinatura\" class=\"field_listbox\">
                   <option>Selecione</option>
                   ";
                   $consulta="select * from tab_assinatura order by nome_assinatura asc";
                   $resposta=mysql_query($consulta) or die ("Não foi possivel realizar a consulta de assinantes");
                   while($linha=mysql_fetch_array($resposta)){
                       $cod_assinatura=$linha["cod_assinatura"];
                       $nome_assinatura=$linha["nome_assinatura"];
                       echo "<option value=\"$cod_assinatura\">$nome_assinatura</option>";
                 }
                echo "
                </select>
                <br>
                <input type=\"submit\" value=\"Continuar\" name=\"consulta\">
                ";
                }
                else {
                echo "
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div id=\"titulo\">Certidão de Casamento</div>
                <br>
                <br>
                <br>
                <br>
                <br>
		<br>
		<br>
		<br>
                <table width=\"770\" height=\"400\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                       <tr>
                           <td valign=\"top\" align=\"left\">
                               ";
                               $codcasamento = $_POST["codcasamento"];
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
                               $casfale = $linha["CASFALE"];
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
                               
                               $datas1 = explode("/",$casdata);
                               $dia1 = $datas1[0];
                               $mes_numero1 = $datas1[1];
                               $ano1 = $datas1[2];
                               
                               $datas2 = explode("/",$casnactoe);
                               $dia2 = $datas2[0];
                               $mes_numero2 = $datas2[1];
                               $ano2 = $datas2[2];
                               
                               $datas3 = explode("/",$casnactoa);
                               $dia3 = $datas3[0];
                               $mes_numero3 = $datas3[1];
                               $ano3 = $datas3[2];

                               $mes["01"] = "Janeiro";
                               $mes["02"] = "Fevereiro";
                               $mes["03"] = "Março";
                               $mes["04"] = "Abril";
                               $mes["05"] = "Maio";
                               $mes["06"] = "Junho";
                               $mes["07"] = "Julho";
                               $mes["08"] = "Agosto";
                               $mes["09"] = "Setembro";
                               $mes["10"] = "Outubro";
                               $mes["11"] = "Novembro";
                               $mes["12"] = "Dezembro";
                               
                               $dia_atual = date("d");
                               $mes_numero_atual = date("m");
                               $ano_atual = date("Y");
                               $consulta_assinatura="select * from tab_assinatura where cod_assinatura=$_POST[cod_assinatura]";
                               $res_assinatura=mysql_query($consulta_assinatura) or die ("Não foi possível consultar assinatura");
                               $linha_assinatura=mysql_fetch_array($res_assinatura);
                               $assinatura=$linha_assinatura["nome_assinatura"];

                               echo "
                                    <span style=\"font: arial,verdana, tahoma; font-size: 15;\">
                                     Certificamos que, tendo dado busca nos livros de Assentamento de Casamentos desta Paróquia<br>
                                     encontramos no Livro <b>$caslivro</b> Folha <b>$casfolha</b> Nº <b>$casnumero</b> o teor seguinte:<br>
                                     <br>
                                     Aos <b>$dia1</b> de <b>$mes[$mes_numero1]</b> de <b>$ano1</b> na <b>$caslocal</b><br>
                                     <br>
                                     compareceram perante o Rvmo. <b>$casparoco</b> os contraentes:<br>
                                     <b>$casnomee</b> e <b>$casnomea</b><br>
                                     <br>
                                     Ele, nascido a <b>$dia2</b> de <b>$mes[$mes_numero2]</b> de <b>$ano2</b>, filho de <b>$caspaie</b><br>
                                     e de <b>$casmaee</b> natural de <b>$casloce</b><br>
                                     e residente em <b>$casende</b><br>
                                     <br>
                                     Ela, nascida a <b>$dia3</b> de <b>$mes[$mes_numero3]</b> de <b>$ano3</b>, filha de <b>$caspaia</b><br>
                                     e de <b>$casmaea</b> natural de <b>$casloca</b><br>
                                     e residente em <b>$casenda</b><br>
                                     <br>
                                     os quais, devidamente habilitados segundo o direito Canônico<br>
                                     contrairam matrimônio, com palavras de presente, na forma do Ritual, recebendo<br>
                                     as bençãos nupiciais.<br>
                                     Foram testemunhas: <b>$castest1</b> e <b>$castest2</b><br>
                                     <br>
                                     Caninde, <b>$dia_atual</b> de <b>$mes[$mes_numero_atual]</b> de <b>$ano_atual</b><br>
                                     <br>
                                     <br>
                                     <br>
                                     <br>
                                     <br>
				     <br>
				     <br>
                                     <center>___________________________________________________________<br>
                                     $assinatura
                                     </center>
                                      </span>
                           </td>
                       </tr>
                </table>
                ";
                }
                echo "
             </body>
    </html>
    ";
?>
