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
                <div style=\"width:770px; height:600px;\">
                <img src=\"img/lembranca_casamento.jpg\" width=\"770\" height=\"500\" border=\"0\">
                <br>
                <center>
                <table width=\"70%\" height=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                       <tr>
                           <td valign=\"top\" align=\"left\">
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

                               echo "
                                    <span style=\"font: verdana, tahoma; font-size: 15px;\">
                                     No dia <b>$dia1</b> de <b>$mes[$mes_numero1]</b> de <b>$ano1</b><br>
                                     <br>
                                     <br>
                                     nos <b>$casnomee</b><br><br>
                                     e <b>$casnomea</b><br><br>
                                     unimo-nos em Sagrado Matrimônio Cristão na Igreja de<br><br>
                                     <b>$caslocal</b><br><br>
                                     em <b>Canindé</b><br><br>
                                     celebrado por <b>$casparoco</b><br>
                                     </span>
                           </td>
                       </tr>
                </table>
             </body>
    </html>
    ";
?>
