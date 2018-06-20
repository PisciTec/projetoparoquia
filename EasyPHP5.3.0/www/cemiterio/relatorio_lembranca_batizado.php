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
                <div style=\"width:770px; height:600px;\">
                <img src=\"img/lembranca_batismo.jpg\" width=\"770\" height=\"500\" border=\"0\">
                <br>
                <center>
                <table width=\"70%\" height=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                       <tr>
                           <td valign=\"top\" align=\"left\">
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
                               
                               $datas1 = explode("/",$batnascto);
                               $dia1 = $datas1[0];
                               $mes_numero1 = $datas1[1];
                               $ano1 = $datas1[2];
                               
                               $datas2 = explode("/",$batdata);
                               $dia2 = $datas2[0];
                               $mes_numero2 = $datas2[1];
                               $ano2 = $datas2[2];

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
                                     de <b>$batnome</b><br>
                                     <br>
                                     filho(a) de <b>$batpai</b><br>
                                     e de <b>$batmae</b><br>
                                     <br>
                                     nascido em <b>$batparoq</b> no dia <b>$batnascto</b><br>
                                     realizado na Igreja <b>$batlocal</b><br>
                                     <br>
                                     no dia <b>$dia2</b> de <b>$mes[$mes_numero2]</b> de <b>$ano2</b><br>
                                     <br>
                                     foram padrinhos: <b>$batpadrin</b><br>
                                     e <b>$batmadrin</b><br>
                                     <br>
                                     <b>$batceleb</b><br>
                                     O celebrante
                                      </span>
                           </td>
                       </tr>
                </table>
                </center>
                ";
             echo "
             </div>
             </body>
    </html>
    ";
?>
