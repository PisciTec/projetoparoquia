<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";

?>
<div style="height: 450px; width: 751px; background-color: #e8ebec;" align="center">
<h3>Pesquisa de Missa</h3>
<form action="missas_data_hora.php" method="post">
<table border="0" cellpadding="0" cellspacing="0" width="50%">
       <tr>
           <td><label>Data:</label></td>
           <td><input type="text" name="data" size="13" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####"></td>
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
                                    echo "<option value=$missa_hora>$missa_hora</option>";
                       }
                       mysql_free_result($resposta);
                       ?>
               </select>
           </td>
       </tr>
</table>
    <input type="submit" name="pesquisa" value="Pesquisar" class="botao_ok">
    &nbsp;
    <input type="button" name="retornar" value="Voltar para Principal" class="botao_ok" onclick="window.location.href='principal.php';">
</form>

<h3>Lista de Missas por Data e Hora</h3>
<br>
<div id="scroll_menor">
<?php
     if (isset($_POST["pesquisa"])) {
        $data = converte_data($_POST["data"]);
        $hora = $_POST["hora"];
        $consulta = "select * from missa, missa_tipo where missa.cod_tipo = missa_tipo.cod_tipo and data = '$data' and hora = '$hora' order by nome_tipo asc";
        $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados");

        echo "
             Clique aqui para imprimir -->
             <a href=\"imprimir_missas_data_hora.php?data=$data&hora=$hora\" target=\"_blank\">
             <img src=\"img/impressora.gif\" width=\"30\" height=\"25\" border=\"0\">
             </a>
        ";
?>
<table border="0" cellpadding="1" cellspacing="1" width="90%" bgcolor="#000000">
       <tr>
           <th bgcolor="#c0c0c0">Cód.</th>
           <th bgcolor="#c0c0c0">Data</th>
           <th bgcolor="#c0c0c0">Hora</th>
           <th bgcolor="#c0c0c0">Nome</th>
           <th bgcolor="#c0c0c0">Tipo</th>
           <th bgcolor="#c0c0c0">Secretária</th>
       </tr>
       <?php
       while($linha=mysql_fetch_array($resposta)){
       $data=converte_data($linha["data"]);
       echo "
       <tr>
           <td bgcolor=\"#ffffff\">$linha[cod_missa]</td>
           <td bgcolor=\"#ffffff\">$data</td>
           <td bgcolor=\"#ffffff\">$linha[hora]</td>
           <td bgcolor=\"#ffffff\">$linha[nome]</td>
           <td bgcolor=\"#ffffff\">$linha[nome_tipo]</td>
           <td bgcolor=\"#ffffff\">$linha[secretaria]</td>
       </tr>
       ";
       }
       ?>
       <tr>
</table>

<?php
     }
?>

</div>
</div>
<?php
include "rodape.inc";
?>
