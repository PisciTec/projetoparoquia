<?php
include "abreconexao.php";
include "funcoes.inc";

?>
<h1>Controle de Missas</h1>
<h3>Lista de Missas no Período</h3>
<br>
<div id="scroll_menor">
<?php
        $data_inicial = converte_data($_GET["data_inicial"]);
        $data_final = converte_data($_GET["data_final"]);
        echo "
             <b>Período da Pesquisa:</b> $data_inicial à $data_final
             <br>
        ";
        $data_inicial = $_GET["data_inicial"];
        $data_final = $_GET["data_final"];
        $consulta = "select * from missa, missa_tipo where missa.cod_tipo = missa_tipo.cod_tipo and (data between '$data_inicial' and '$data_final') ";
        $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados");
        $total = mysql_num_rows($resposta);
        echo "<b>Total de Missas:</b> $total<br>";
        $consulta_secretaria = "select count(secretaria) as total, secretaria from missa a where (data between '$data_inicial' and '$data_final')
                                group by secretaria order by total desc";
        $resposta_secretaria = mysql_query($consulta_secretaria);
        

?>

<table border="0" cellpadding="1" cellspacing="1" width="20%" bgcolor="#000000">
       <tr>
           <th bgcolor="#c0c0c0">Secretária</th>
           <th bgcolor="#c0c0c0">Total</th>
       </tr>
       <?php
       while($linha=mysql_fetch_array($resposta_secretaria)){
       echo "
       <tr>
           <td bgcolor=\"#ffffff\">$linha[secretaria]</td>
           <td bgcolor=\"#ffffff\">$linha[total]</td>
       </tr>
       ";
       }
       ?>
       <tr>
</table>
<br>
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
