<?php
include "abreconexao.php";
include "funcoes.inc";

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

?>
<html>
<head>
<title>SISTEMA BATIZADO</title>
<link rel="stylesheet" href="estilo.css" type="text/css">
<script language="JavaScript" src="js/funcao_mascara.js" type="text/javascript"></script>
</head>

<body>
<?php
if (!isset($_POST["gerar"])) {
?>
<h3>Gerar Certidão Negativa</h3>
<form method="post" action="gerar_certidao_negativa.php">
      <center>
      <table border="0" cellpadding="1" cellspacing="0" bgcolor="000000">
             <tr>
                 <td bgcolor="ffffff"><label>Batizado:<label></td>
                 <td bgcolor="ffffff"><input type="text" name="batizado" class="field_textbox"></td>
             </tr>
             <tr>
                 <td bgcolor="ffffff"><label>Data Nascimento:<label></td>
                 <td bgcolor="ffffff">
                     <input type="text" name="dia" value="" size="2" maxlength="2" class="field_selectbox">
                     <select name="mes" class="field_selectbox">
                             <option value="JANEIRO">JANEIRO</option>
                             <option value="FEVEREIRO">FEVEREIRO</option>
                             <option value="MARÇO">MARÇO</option>
                             <option value="ABRIL">ABRIL</option>
                             <option value="MAIO">MAIO</option>
                             <option value="JUNHO">JUNHO</option>
                             <option value="JULHO">JULHO</option>
                             <option value="AGOSTO">AGOSTO</option>
                             <option value="SETEMBRO">SETEMBRO</option>
                             <option value="OUTUBRO">OUTUBRO</option>
                             <option value="NOVEMBRO">NOVEMBRO</option>
                             <option value="DEZEMBRO">DEZEMBRO</option>
                     </select>
                     <input type="text" name="ano" value="" size="4" maxlength="4" class="field_textbox">
                 </td>
             </tr>
             <tr>
                 <td bgcolor="ffffff"><label>Pai:</label></td>
                 <td bgcolor="ffffff"><input type="text" name="pai" value="" size="50" maxlength="50" class="field_textbox"></td>
             </tr>
             <tr>
                 <td bgcolor="ffffff"><label>Mãe:</label></td>
                 <td bgcolor="ffffff"><input type="text" name="mae" value="" size="50" maxlength="50" class="field_textbox"></td>
             </tr>
             <tr>
                 <td bgcolor="ffffff"><label>Padrinho:</label></td>
                 <td bgcolor="ffffff"><input type="text" name="padrinho" value="" size="50" maxlength="50" class="field_textbox"></td>
             </tr>
             <tr>
                 <td bgcolor="ffffff"><label>Madrinha:</label></td>
                 <td bgcolor="ffffff"><input type="text" name="madrinha" value="" size="50" maxlength="50" class="field_textbox"></td>
             </tr>
             <tr>
                 <td bgcolor="ffffff"><label>Testemunha 1:</label></td>
                 <td bgcolor="ffffff"><input type="text" name="testemunha1" value="" size="50" maxlength="50" class="field_textbox"></td>
             </tr>
             <tr>
                 <td bgcolor="ffffff"><label>Testemunha 2:</label></td>
                 <td bgcolor="ffffff"><input type="text" name="testemunha2" value="" size="50" maxlength="50" class="field_textbox"></td>
             </tr>
             <tr>
                 <td bgcolor="ffffff"><label>Tipo:</label></td>
                 <td bgcolor="ffffff"><input type="text" name="tipo" value="" size="20" maxlength="20" class="field_textbox"></td>
             </tr>
             <tr>
                 <td bgcolor="ffffff" valign="top"><label>Observação:</label></td>
                 <td bgcolor="ffffff"><textarea name="obs" rows="5" cols="60"></textarea></td>
             </tr>
             <tr>
                 <td bgcolor="ffffff"><label>Data Batismo:</label></td>
                 <td bgcolor="ffffff">
                     <input type="text" name="dia1" value="" size="2" maxlength="2" class="field_textbox">
                     <select name="mes1" class="field_selectbox">
                             <option value="JANEIRO">JANEIRO</option>
                             <option value="FEVEREIRO">FEVEREIRO</option>
                             <option value="MARÇO">MARÇO</option>
                             <option value="ABRIL">ABRIL</option>
                             <option value="MAIO">MAIO</option>
                             <option value="JUNHO">JUNHO</option>
                             <option value="JULHO">JULHO</option>
                             <option value="AGOSTO">AGOSTO</option>
                             <option value="SETEMBRO">SETEMBRO</option>
                             <option value="OUTUBRO">OUTUBRO</option>
                             <option value="NOVEMBRO">NOVEMBRO</option>
                             <option value="DEZEMBRO">DEZEMBRO</option>
                     </select>
                     <input type="text" name="ano1" value="" size="4" maxlength="4" class="field_textbox">
                 </td>
             </tr>
             <tr>
                 <td bgcolor="ffffff">
                   <label>Assinante do documento:</label>
                 </td>
                 <td bgcolor="ffffff">
                   <select name="assinatura" class="field_selectbox">
                   <option>Selecione</option>
                   <?php
                   $consulta="select * from tab_assinatura order by nome_assinatura asc";
                   $resposta=mysql_query($consulta) or die ("Não foi possivel realizar a consulta de assinantes");
                   while($linha=mysql_fetch_array($resposta)){
                       $cod_assinatura=$linha["cod_assinatura"];
                       $nome_assinatura=$linha["nome_assinatura"];
                       echo "<option value=\"$nome_assinatura\">$nome_assinatura</option>";
                   }
                   ?>
                   </select>
                </td>
             </tr>
      </table>
      <input type="submit" name="gerar" value="Gerar" class="botao_ok">
      </center>
</form>
<?php
}
else {
?>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <center>
     <h3>CERTIDÃO NEGATIVA DE BATISMO</h3>
     <br>
     <table border="0" cellpadding="1" cellspacing="0" style="font: verdana, tahoma; font-size: 15px;">
     <tr>
     <td align="left">
     Certificamos que, tendo dado busca nos livros de Batismo desta Paroquia<br>
     não encontrei o termo de assentamento de <b><?php echo $_POST["batizado"]; ?></b><br>
     que diz ter nascido aos <b><?php echo $_POST["dia"]." do mes de ".$_POST["mes"]." de ".$_POST["ano"];?></b><br>
     ser filho(a) de <b><?php echo $_POST["pai"];?></b><br>
     e de <b><?php echo $_POST["mae"];?></b><br>
     foram padrinhos <b><?php echo $_POST["padrinho"];?></b><br>
     e <b><?php echo $_POST["madrinha"];?></b><br>
     </td>
     </tr>
     <tr>
     <td align="center">
     Ita in fide Parochi<br><br>
     <b>Caninde, <?php echo $dia_atual." de ".$mes[$mes_numero_atual]." de ".$ano_atual; ?></b><br><br><br>
     _________________________________<br>
     <b><?php echo $_POST["assinatura"];?></b><br><br><br>
     </td>
     </tr>
     </table>
     <h3>JUSTIFICAÇÃO</h3><br><br>
     <table border="0" cellpadding="1" cellspacing="0" style="font: verdana, tahoma; font-size: 15px;">
     <tr>
     <td align="left">
     Comparaceram a minha presença <b><?php echo $_POST["testemunha1"];?></b><br>
     e <b><?php echo $_POST["testemunha2"];?></b><br>
     o supramencionado <b><?php echo $_POST["batizado"];?></b><br>
     batizado em <b><?php echo $_POST["dia1"]." do mes de ".$_POST["mes1"]." de ".$_POST["ano1"];?></b><br>
     Juro fidedignas ambas as testumunhas por que é <b><?php echo $_POST["tipo"];?></b> DO SUPRAMENCIONADO<br>
     observação <b><?php echo $_POST["obs"];?></b>
     </td>
     </tr>
     <tr>
     <td align="center">
     Ita in fide Parochi<br><br>
     <b>Caninde, <?php echo $dia_atual." de ".$mes[$mes_numero_atual]." de ".$ano_atual; ?></b><br><br><br>
     _________________________________<br>
     <b><?php echo $_POST["assinatura"];?></b>
     </td>
     </tr>
     </table>
     </center>
<?php
}
?>
</form>
</body>
</html>
