<?php
    include "abreconexao.php";
    include "funcoes.inc";
    $mes["01"] = "Janeiro";
    $mes["02"] = "Fevereiro";
    $mes["03"] = "Mar�o";
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
	<title>CONTROLE DO CEMIT�RIO</title>
    <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
	</head>

	<body>
	";
                if (!isset($_POST["consulta"])){
                echo "
                   <h3>Dados adicionais</h3>
                   <form name=\"form1\" method=\"POST\" action=\"contrato_cemiterio.php\">
                   <input type=\"hidden\" name=\"contrato\" value=\"$_GET[contrato]\">                   
                   <label>Assinante do documento</label><br>
                   <select name=\"cod_assinatura\" class=\"field_listbox\">
                   <option>Selecione</option>
                   ";
                   $consulta="select * from tab_assinatura order by nome_assinatura asc";
                   $resposta=mysql_query($consulta) or die ("N�o foi possivel realizar a consulta de assinantes");
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
	    ";

	    $contrato = $_POST["contrato"];
    	$consulta = "select * from cemiterio_contrato where contrato='$contrato'";
    	$resposta = mysql_query($consulta) or die ("N�o foi poss�vel consultar dados do contrato");
    	$linha = mysql_fetch_array($resposta);

    	$quadra = $linha["QUADRA"];
    	$ala = $linha["ALA"];
    	$sepultura = $linha["SEPULTURA"];
    	$titular = $linha["TITULAR"];
    	$endereco = $linha["ENDERECO"];
    	$bairro = $linha["BAIRRO"];
    	$cidade = $linha["CIDADE"];
    	$estado = $linha["ESTADO"];
    	$cep = $linha["CEP"];
    	$fone = $linha["FONE"];
    	$inicio = converte_data($linha["INICIO"]);
    	$termino = converte_data($linha["TERMINO"]);
    	$valor = $linha["VALOR"];
    	$datarec = $linha["DATAREC"];
    	$obs = $linha["OBS"];

	    $consulta_assinatura="select * from tab_assinatura where cod_assinatura=$_POST[cod_assinatura]";
        $res_assinatura=mysql_query($consulta_assinatura) or die ("N�o foi poss�vel consultar assinatura");
        $linha_assinatura=mysql_fetch_array($res_assinatura);
        $assinatura=$linha_assinatura["nome_assinatura"];

	echo "
    <div id=\"conteudo\" style=\"width:670px; margin: 10; padding: 5; text-align: justify; font-size: 16px;\">
    <center><h3>CONTRATO PARA UTILIZA��O DE SEPULTURA - n�. $contrato</h3></center>
	<br>
	<span style=\"font: verdana, tahoma; font-size: 16; text-align:justify;\">
	Contrato que fazem entre si <b>PAR�QUIA DE S�O FRANCISCO DAS CHAGAS - CANIND�</b><br>
	de agora em diante denominado <b>LOCADORA</b>, e <b>$titular</b>, residente em<br>
	<b>$endereco</b>, bairro <b>$bairro</b>, telefone <b>$fone</b>, cidade <b>$cidade-$estado</b>, de agora em diante de<br>
	nominado <b>LOCAT�RIO(A)</b>.
	<br>
	<br>
	<center><b>Cl�usula Primeira - Do Objeto</b></center>
	<br>
	O presente Contrato tem como objeto a cess�o, por aluguel, do direito de uso para o <b>LOCAT�RIO</b>, da<br>
	SEPULTURA de <b>N� $sepultura</b> da Ala <b>$ala</b> da quadra <b>$quadra</b> no <b>Cemit�rio de S�o Miguel - Caninde-CE</b>.
	<br>
	<br>
	<center><b>Cl�usula Segunda - Do Per�odo da Utiliza��o</b></center>
	<br>
	O presente Contrato sera v�lido pelo per�odo de <b>$inicio</b> � <b>$termino</b>.<br>
	No final do prazo o  <b>LOCAT�RIO(A)</b> dever� procurar a <b>LOCADORA</b> para renova��o ou cancelamento do Contrato.
	<br>
	<br>
	<center><b>Cl�usula Terceira - Do valor do Contrato</b></center>
	<br>
	Pelos tempo da vig�ncia deste Contrato o <b>LOCAT�RIO(A)</b> pagar� a <b>LOCADORA</b> a	quantia �nica de <b>R$ $valor</b>.
	<br>
	<br>	
	<center><b>Cl�usula Quarta - Considera��es Gerais</b></center>
	<br>
	O valor pago por este Contrato n�o isenta o <b>LOCAT�RIO</b> do pagamento da taxa relativa aos sepultamentos que forem efetuados na sepultura contratada.<br>
	<br>
	No final da vig�ncia deste contrato a n�o procura por parte do <b>LOCAT�RIO</b>	implicar� no autom�tico cancelamento deste.<br>
	<br>
	Obs: $obs
	<br>
	<br>
	<center>Caninde, $dia_atual de $mes[$mes_numero_atual] de $ano_atual</center>
	<br>
	<br>
	<center>_____________________________________</center><br>
	<center><b>$assinatura</b></center><br>
	<br>
	<center>_____________________________________</center><br>
	<center><b>$titular</b></center><br>
	</span>
	</div>
    ";
    }
echo "
</body>
</html>
";
?>
