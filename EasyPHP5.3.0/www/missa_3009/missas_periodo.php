<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";

?>
<div style="height: 450px; width: 751px; background-color: #e8ebec;" align="center">
<h3>Período da Pesquisa</h3>
<form action="missas_periodo.php" method="post">
    <label>Período:</label>
    <input type="text" name="data_inicial" size="15" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####">
    &nbsp;
    a
    &nbsp;
    <input type="text" name="data_final" size="15" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####">
    <br>
    <input type="submit" name="pesquisa" value="Pesquisar" class="botao_ok">
    &nbsp;
    <input type="button" name="retornar" value="Voltar para Principal" class="botao_ok" onclick="window.location.href='principal.php';">
</form>

<h3>Lista de Missas no Período</h3>
<br>
<div id="scroll_menor">
<?php
     if (isset($_POST["pesquisa"])) {
        $data_inicial = converte_data($_POST["data_inicial"]);
        $data_final = converte_data($_POST["data_final"]);
        $consulta = "select * from missa, missa_tipo where missa.cod_tipo = missa_tipo.cod_tipo and (data between '$data_inicial' and '$data_final') ";
        $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados");

        echo "
             Clique aqui para imprimir -->
             <a href=\"imprimir_missas_periodo.php?data_inicial=$data_inicial&data_final=$data_final\" target=\"_blank\">
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
