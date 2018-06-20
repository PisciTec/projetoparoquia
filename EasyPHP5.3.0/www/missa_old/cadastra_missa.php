<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";

// Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.f1['secretaria'].value == ''){
                          alert('Você deve escolher uma secretaria!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";


if (isset($_POST["data"])) {
	$data_sistema = $_POST["data"];
}
else {
	$data_sistema = date("d/m/Y");
}

if (isset($_POST["cadastro"]) and $_POST["cadastro"]){
	$data=converte_data($_POST["data"]);
	$hora = $_POST["hora"];
	$nome = strtoupper($_POST["nome"]);	
	$cod_tipo = $_POST["cod_tipo"];
	$secretaria = $_POST["secretaria"];

	$consulta_repetido = "select * from missa where data = '$data' and hora = '$hora' and nome = '$nome'";
	$resposta_repetido = mysql_query($consulta_repetido) or die ("No foi possivel consultar repetido");
	$total = mysql_num_rows($resposta_repetido);
	
	if ($total == 0) {
	$inserir = "insert into missa (data, hora, nome, cod_tipo, secretaria) values ('$data', '$hora',
	           '$nome', '$_POST[cod_tipo]', '$_POST[secretaria]')";
	mysql_query($inserir) or die ("Não foi possível cadastrar dados");
	echo "
	       <script language=\"JavaScript\">
	            window.alert('Dados inseridos com sucesso!');		    
	       </script>
	";
	}
	else {
		echo "
	        <script language=\"JavaScript\">
	            alert('Dados da missa repetidos! Impossivel Cadastro!');
	        </script>
		";
	}
}
?>
<div style="height: 400px; width: 751px; background-color: #ffffcc;" align="center">
<h3>Cadastrar Missa</h3>
<form method="POST" action="cadastra_missa.php" name="f1" onsubmit="return validaFormulario(this);">
<table border="0" cellpadding="0" cellspacing="0" width="620">
       <tr>
           <td><label>Data(dd/mm/aaaa):</label></td>
           <td><input type="text" name="data" value="<?php echo $data_sistema ; ?>" size="13" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####"></td>
       </tr>
       <tr>
           <td><label>Hora:</td>
           <td>
               <select name="hora" class="field_listbox">
                       <option>Selecione</option>
                       <?php
                       $consulta = "select * from missa_hora where ativo = 'ativada' order by missa_hora asc";
                       $resposta = mysql_query($consulta, $conectar) or die ("Não foi possivel efetuar consultar hora!");
                       while($linha = mysql_fetch_array($resposta)){
                                    $missa_hora=$linha["missa_hora"];
                                    if (isset($_POST["hora"]) and $_POST["hora"] == $missa_hora) {
				        echo "<option value=$missa_hora selected>$missa_hora</option>";
				    }
				    else {
					echo "<option value=$missa_hora>$missa_hora</option>";
				    }
                       }
                       mysql_free_result($resposta);
                       ?>
               </select>
           </td>
       </tr>
       <tr>
           <td><label>Nome:</label></td>
           <td><input type="text" name="nome" size="80" maxlenght="70" class="campos"></td>
       </tr>
       <tr>
           <td><label>Tipo:</td>
           <td>
               <select name="cod_tipo" class="field_listbox">
                       <option>Selecione</option>
                       <?php
                       $consulta = "select * from missa_tipo order by nome_tipo asc";
                       $resposta = mysql_query($consulta, $conectar) or die ("Não foi possivel efetuar a consulta do tipo!");
                       while($linha = mysql_fetch_array($resposta)){
                                    $cod_tipo=$linha["cod_tipo"];
                                    $nome_tipo=$linha["nome_tipo"];
                                    echo "<option value=$cod_tipo>$nome_tipo</option>";
                       }
                       mysql_free_result($resposta);
                       ?>
               </select>
           </td>
       </tr>
       <tr>
           <td><label>Secretária:</label></td>
           <td>
               <select name="secretaria" class="field_listbox">
                       <option value="">Selecione</option>
                       <option value="SIMONE">SIMONE</option>
                       <option value="MARCELLA">MARCELLA</option>
                       <option value="VERBENE">VERBENE</option>
                       <option value="EDIANE">EDIANE</option>
               </select>
           </td>
       </tr>       
</table>
        <input type="submit" name="cadastro" value="Cadastrar" class="botao_ok">
        &nbsp;
        <input type="reset" value="Limpar campos" class="botao_ok">
        &nbsp;
        <input type="button" name="retornar" value="Voltar para Principal" class="botao_ok" onclick="window.location.href='principal.php';">
</form>
<br>
       <center>
       <p align="left" style="font-size: 10px; color: #191970;">
       <?php
       $consulta = "select * from missa, missa_tipo where missa.cod_tipo = missa_tipo.cod_tipo order by cod_missa desc limit 0, 15";
       $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados");
       while($linha=mysql_fetch_array($resposta)){
       $data=converte_data($linha["data"]);
       echo "
           $linha[hora] $data $linha[nome] $linha[nome_tipo]<br>
       ";
       }
       ?>
       </p>
       </center>

</div>
<?php
include "rodape.inc";
?>
