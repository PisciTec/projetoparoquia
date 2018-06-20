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

	<body>
	";
                if (!isset($_POST["consulta"])){
                echo "
                   <h3>Dados adicionais</h3>
                   <form name=\"form1\" method=\"POST\" action=\"certidao_obito.php\">
                   <input type=\"hidden\" name=\"cod_obito\" value=\"$_GET[cod_obito]\">		   
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
	
	    $consulta_assinatura="select * from tab_assinatura where cod_assinatura=$_POST[cod_assinatura]";
        $res_assinatura=mysql_query($consulta_assinatura) or die ("Não foi possível consultar assinatura");
        $linha_assinatura=mysql_fetch_array($res_assinatura);
        $assinatura=$linha_assinatura["nome_assinatura"];	
	
	    $data1 = explode("/",$data);
	    $dia=$data1[0];
	    $mes_valor=$data1[1];
	    $ano = $data1[2];
	
	echo "
	<div id=\"conteudo\" style=\"width:400px; margin: 10; padding: 10;\">
	<center><h3>CERTIDÃO DE ÓBITO</h3></center>
	<br>	
	<br>
	<span style=\"font: verdana, tahoma; font-size: 15; text-align:justify;\">
	Certificamos que, tendo dado busca nos livros de Obitos desta Paróquia<br>
	encontrei no Livro <b>$livro</b> Folha <b>$folha</b> Nº <b>$numero</b>, o teor seguinte:<br>
	<br>	
	Aos <b>$dia</b> de <b>$mes[$mes_valor]</b> de <b>$ano</b> em <b>$local</b><br><br>
	da Paróquia de <b>$paroquia</b><br><br>
	Faleceu <b>$nome</b> com <b>$idade</b> de idade<br><br>
	Natural de <b>$natura</b><br><br>
	Residente em <b>$resid</b><br><br>
	Filho de <b>$pai</b><br><br>
	e de <b>$mae</b><br><br>
	Casado com <b>$conjuge</b><br><br>
	O corpo foi encomendado e sepultado no Cemitério de <b>$sepult</b><br>
	<br>
	<br>
	<br>
	<br>
	<center>Canindé, $dia_atual de $mes[$mes_numero_atual] de $ano_atual</center>
	<br>
	<br>
	<br>
	<center>____________________________________________</center><br>
	<center>$assinatura</center>
	</span>
	</div>
    ";
}
echo "
	</body>
	</html>
";
?>
