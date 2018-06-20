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
		
	echo "
	<html>
	<head>
	<title>CONTROLE DE CEMITÉRIO</title>
    <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
	</head>

	<body onLoad=\"Mascaras.carregar();\">
	";
        if (!isset($_POST["consulta"])){
             echo "
                   <h3>Dados adicionais</h3>
                   <form name=\"form1\" method=\"POST\" action=\"guia_sepultamento_segunda_via.php\">
                   <input type=\"hidden\" name=\"cod_obito\" value=\"$_GET[cod_obito]\">
		           <label>Assinante do documento</label><br>
                   <select name=\"cod_assinatura\">
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
			       </form>
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
	    ";		
		$cod_obito = $_POST["cod_obito"];
    	$consulta = "select * from cemiterio_obitos where cod_obito='$cod_obito'";
    	$resposta = mysql_query($consulta) or die ("Não foi possível consultar dados do obito");
    	$linha = mysql_fetch_array($resposta);

    	$livro = $linha["OBLIVRO"];
    	$folha = $linha["OBFOLHA"];
    	$numero = $linha["OBNUMERO"];
        $nome = $linha["OBNOME"];
    	$data = converte_data($linha["OBDATA"]);
    	$local = $linha["OBLOCAL"];
    	$paroquia = $linha["OBPAROQUIA"];
    	$idade = $linha["OBIDADE"];
    	$natura = $linha["OBNATURA"];
    	$resid = $linha["OBRESID"];
    	$pai = $linha["OBPAI"];
    	$mae = $linha["OBMAE"];
    	$conjuge = $linha["OBCASADO"];
    	$sepult = $linha["OBSEPULT"];
    	
    	$consulta_guia = "select * from cemiterio_guia where cod_obito = '$cod_obito'";
        $resposta_guia = mysql_query($consulta_guia) or die ("Não foi possível realizar a consulta de guia de sepultamento");
        $linha_guia = mysql_fetch_array($resposta_guia);
        $data_sepultamento = converte_data($linha_guia["data"]);
        $quadra = $linha_guia["quadra"];
        $sepultura = $linha_guia["sepultura"];
        $gaveta = $linha_guia["gaveta"];
        $hora = $linha_guia["hora"];
        $cod_guia = $linha_guia["cod_guia_sepultamento"];
        $valor = $linha_guia["valor"];

	    $consulta_assinatura="select * from tab_assinatura where cod_assinatura=$_POST[cod_assinatura]";
        $res_assinatura=mysql_query($consulta_assinatura) or die ("Não foi possível consultar assinatura");
        $linha_assinatura=mysql_fetch_array($res_assinatura);
        $assinatura=$linha_assinatura["nome_assinatura"];

	echo "
	<center><h3>GUIA DE SEPULTAMENTO - $ano_atual/$cod_guia</h3></center>
	<br>
	<br>
    <center>
	<table border=\"0\" width=\"65%\" height=\"350px\" cellpading=\"0\" cellspacing=\"1\" bgcolor=\"#000000\">
	<tr>
	<td bgcolor=\"#ffffff\" valign=\"top\">
	Dados do Sepultado<br><br>
	Nome: <b>$nome</b><br><br>
	Sepultamento: <b>$data_sepultamento</b><br><br>
	Falecido em: <b>$data</b><br><br>
	Quadra: <b>$quadra</b><br><br>
	Sepultura: <b>$sepultura</b><br><br>
	Idade: <b>$idade</b><br><br>
	Residente em: <b>$resid</b><br><br>
	Nome do Pai: <b>$pai</b><br><br>
	Nome da Mãe: <b>$mae</b><br><br>
	Casado com: <b>$conjuge</b><br><br>
	Gavetão: <b>$gaveta</b><br><br>
	Hora: <b>$hora</b><br><br>
	</td>
	</tr>
	<tr>
	<td bgcolor=\"#ffffff\">
	Valor Recebido: <b>R$ $valor</b><br>
	<br>
	</td>
	</tr>
	</table>
	</center>
	<br>
	<br>
	<br>
	<br>
	<center>Canindé, $dia_atual de $mes[$mes_numero_atual] de $ano_atual</center>
	<br>
	<br>
	<center>___________________________________</center>
	<center><b>$assinatura</b></center>
";
}
echo "
</body>
</html>
";
?>
