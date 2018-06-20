<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";

// Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.f1['data'].value == ''){
                          alert('Você deve digitar uma data!');
                          return false;
                       }
                       if (document.f1['hora'].value == ''){
                          alert('Você deve escolher uma hora!');
                          return false;
                       }
                       if (document.f1['nome'].value == ''){
                          alert('Você deve digitar um nome!');
                          return false;
                       }
                       if (document.f1['cod_tipo'].value == '0'){
                          alert('Você deve escolher um tipo de missa!');
                          return false;
                       }
                       if (document.f1['secretaria'].value == ''){
                          alert('Você deve escolher uma secretaria!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

if (isset($_POST["cadastro"]) and $_POST["cadastro"]){
$data=converte_data($_POST["data"]);
$cod_missa = $_POST["cod_missa"];
$nome = strtoupper($_POST["nome"]);
$atualizar = "update missa set data = '$data', hora = '$_POST[hora]', nome = '$nome', cod_tipo = '$_POST[cod_tipo]',
              secretaria = '$_POST[secretaria]' where cod_missa = '$cod_missa'";
mysql_query($atualizar) or die ("Não foi possível atualizar dados");
echo "
       <script language=\"JavaScript\">
            window.alert('Dados atualizados com sucesso!');
            window.location.href='principal.php';
       </script>
";
}

$cod_missa = $_GET["cod_missa"];
$consulta = "select * from missa where cod_missa = '$cod_missa'";
$resposta = mysql_query($consulta) or die ("Não foi possível consultar dados da missa");
$linha = mysql_fetch_array($resposta);
$data = converte_data($linha["data"]);
$hora = $linha["hora"];
$nome = $linha["nome"];
$cod_tipo = $linha["cod_tipo"];
$secretaria = $linha["secretaria"];

?>

<div style="height: 400px; width: 751px; background-color: #e8ebec;" align="center">
<h3>Alterar Dados Missa</h3>
<form method="POST" action="alterar_dados_missa.php" name="f1" onsubmit="return validaFormulario(this);">
<input type="hidden" name="cod_missa" value="<?php echo $cod_missa; ?>">
<table border="0" cellpadding="0" cellspacing="0" width="620">
       <tr>
           <td><label>Data(dd/mm/aaaa):</label></td>
           <td><input type="text" name="data" value="<?php echo $data; ?>" size="13" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####"></td>
       </tr>
       <tr>
           <td><label>Hora:</td>
           <td>
               <select name="hora" class="field_listbox">
                       <option value="">Selecione</option>
                       <?php
                       $consulta = "select * from missa_hora where ativo = 'ativada' order by missa_hora asc";
                       $resposta = mysql_query($consulta, $conectar) or die ("Não foi possivel efetuar consultar hora!");
                       while($linha = mysql_fetch_array($resposta)){
                                    if ($hora == $linha["missa_hora"]) {
                                       echo "<option value=$linha[missa_hora] selected>$linha[missa_hora]</option>";
                                    }
                                    else {
                                       echo "<option value=$linha[missa_hora]>$linha[missa_hora]</option>";
                                    }
                       }
                       mysql_free_result($resposta);
                       ?>
               </select>
           </td>
       </tr>
       <tr>
           <td><label>Nome:</label></td>
           <td><input type="text" name="nome" value="<?php echo $nome; ?>" size="50" maxlenght="70" class="campos"></td>
       </tr>
       <tr>
           <td><label>Tipo:</td>
           <td>
               <select name="cod_tipo" class="field_listbox">
                       <option value="0">Selecione</option>
                       <?php
                       $consulta = "select * from missa_tipo order by nome_tipo asc";
                       $resposta = mysql_query($consulta, $conectar) or die ("Não foi possivel efetuar a consulta do tipo!");
                       while($linha = mysql_fetch_array($resposta)){
                                    if ($cod_tipo == $linha["cod_tipo"]) {
                                       echo "<option value=\"$linha[cod_tipo]\" selected>$linha[nome_tipo]</option>";
                                    }
                                    else {
                                       echo "<option value=\"$linha[cod_tipo]\">$linha[nome_tipo]</option>";
                                    }
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
                       <?php
                         if ($secretaria == "SIMONE") {
                            echo "
     				 <option value=\"\">Selecione</option>
	                         <option value=\"SIMONE\" selected>SIMONE</option>
                                 <option value=\"MARCELLA\">MARCELLA</option>
                                 <option value=\"GLEICIANE\">GLEICIANE</option>
                                 <option value=\"EDIANE\">EDIANE</option>
                            ";
                         }
                         else if ($secretaria == "MARCELLA") {
                              echo "
                                 <option value=\"\">Selecione</option>
				 <option value=\"SIMONE\">SIMONE</option>
                                 <option value=\"MARCELLA\" selected>MARCELLA</option>
                                 <option value=\"GLEICIANE\">GLEICIANE</option>
                                 <option value=\"EDIANE\">EDIANE</option>
                            ";
                         }
                         else if ($secretaria == "GLEICIANE") {
                              echo "
                                 <option value=\"\">Selecione</option>
				 <option value=\"SIMONE\">SIMONE</option>
                                 <option value=\"MARCELLA\">MARCELLA</option>
                                 <option value=\"GLEICIANE\" selected>GLEICIANE</option>
                                 <option value=\"EDIANE\">EDIANE</option>
                            ";
                         }
                         else if ($secretaria == "EDIANE") {
                              echo "
				 <option value=\"\">Selecione</option>
                                 <option value=\"SIMONE\">SIMONE</option>
                                 <option value=\"MARCELLA\">MARCELLA</option>
                                 <option value=\"GLEICIANE\">GLEICIANE</option>
                                 <option value=\"EDIANE\" selected>EDIANE</option>
                            ";
                         }
                         else {
                             echo "
                                 <option value=\"\" selected>Selecione</option>
				 <option value=\"SIMONE\">SIMONE</option>
                                 <option value=\"MARCELLA\">MARCELLA</option>
                                 <option value=\"GLEICIANE\">GLEICIANE</option>
                                 <option value=\"EDIANE\">EDIANE</option>
                            ";
                         }
                       ?>
               </select>
           </td>
       </tr>       
</table>
        <input type="submit" name="cadastro" value="Atualizar" class="botao_ok">
        &nbsp;
        <input type="button" name="index.php" value="Voltar para Principal" class="botao_ok" onclick="window.location.href='principal.php';">
</form>
</div>
<?php
include "rodape.inc";
?>
