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

                ";
                if (!isset($_POST["consulta"])){
                echo "
                   <h3>Dados adicionais</h3>
                   <form name=\"form1\" method=\"POST\" action=\"relatorio_certidao_batizado.php\">
                   <input type=\"hidden\" name=\"codbatismo\" value=\"$_GET[codbatismo]\">
                   <label>Fins:</label><input type=\"text\" name=\"fins\" size=\"30\" class=\"field_textbox\"><br>
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
                <div id=\"titulo\">Certidão de Batismo</div>
                <br>
                <br>
                <table width=\"600\" height=\"400\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                       <tr>
                           <td valign=\"top\" align=\"left\">
                               ";
                               $codbatismo = $_POST["codbatismo"];
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

                               $consulta_assinatura="select * from tab_assinatura where cod_assinatura=$_POST[cod_assinatura]";
                               $res_assinatura=mysql_query($consulta_assinatura) or die ("Não foi possível consultar assinatura");
                               $linha_assinatura=mysql_fetch_array($res_assinatura);
                               $assinatura=$linha_assinatura["nome_assinatura"];

                               echo "
                                    <span style=\"font: verdana, tahoma; font-size: 15;\">
                                     Certificamos que, tendo dado busca nos livros de Batismo desta Paróquia<br>
                                     encontramos no Livro <b>$batlivro</b> Folha <b>$batfolha</b> Nº <b>$batnumero</b> o termo de assentamento do<br>
                                     <br>
                                     Batismo de Nome <b>$batnome</b><br>
                                     <br>
                                     Nascido a <b>$dia1</b> de <b>$mes[$mes_numero1]</b> de <b>$ano1</b><br>
                                     na paróquia de <b>$batparoq</b><br>
                                     <br>
                                     Filho de <b>$batpai</b><br>
                                     e de <b>$batmae</b><br>
                                     <br>
                                     Batizado <b>$dia2</b> de <b>$mes[$mes_numero2]</b> de <b>$ano2</b><br>
                                     na <b>$batlocal</b><br>
                                     <br>
                                     Padrinhos: <b>$batpadrin</b><br>
                                     e <b>$batmadrin</b><br>
                                     <br>
                                     Oficiante:<b>$batceleb</b><br>
                                     <br>
                                     Fins: $_POST[fins]<br>
                                     <br>
                                     Observações<br>
                                     $batobs
                                     <br>
                                     <br>
                                     Caninde, <b>$dia_atual</b> de <b>$mes[$mes_numero_atual]</b> de <b>$ano_atual</b><br>
                                     <br>
                                     <br>
                                     <center>
                                     ______________________________________________________<br>
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
