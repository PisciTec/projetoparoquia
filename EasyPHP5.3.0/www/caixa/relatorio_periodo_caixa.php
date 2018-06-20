<?php
include "abreconexao.php";
include "funcoes.inc";

$data_inicial=$_GET["data_inicial"];
$data_final = $_GET["data_final"];
$consulta="select * from tab_caixa where data between ('$data_inicial') and ('$data_final') order by data desc";
$resposta=mysql_query($consulta) or die ("Não foi possível realizar a consulta");
?>


<h4>Lançamentos Encontrados no Período</h4>
     <table border="0" cellpadding="0" cellspacing="1" bgcolor="#000000" width="90%">
            <tr>
                <th bgcolor="#c0c0c0">Data</th>
                <th bgcolor="#c0c0c0">Dizimo</th>
                <th bgcolor="#c0c0c0">Canta e Reza</th>
                <th bgcolor="#c0c0c0">Batisterio</th>
                <th bgcolor="#c0c0c0">Sepultamento</th>
                <th bgcolor="#c0c0c0">Batismo</th>
                <th bgcolor="#c0c0c0">Casamento</th>
                <th bgcolor="#c0c0c0">Terreno Cemitério</th>
		        <th bgcolor="#c0c0c0">Missas</th>
                <th bgcolor="#c0c0c0">Total</th>
            </tr>
            <?php
            $dizimo_total = 0;
            $canta_reza_total = 0;
            $batisterio_total = 0;
            $sepultamento_total = 0;
            $batismo_total = 0;
            $casamento_total = 0;
            $missas_total = 0;
            $terreno_cemiterio_total = 0;
            while ($linha=mysql_fetch_array($resposta)){
                  $dizimo_total = $dizimo_total + $linha["dizimo"];
                  $canta_reza_total = $canta_reza_total + $linha["canta_reza"];
                  $batisterio_total = $batisterio_total + $linha["batisterio"];
                  $sepultamento_total = $sepultamento_total + $linha["sepultamento"];
                  $batismo_total = $batismo_total + $linha["batismo"];
                  $casamento_total = $casamento_total + $linha["casamento"];
                  $missas_total = $missas_total + $linha["missas"];
                  $terreno_cemiterio_total = $terreno_cemiterio_total + $linha["terreno_cemiterio"];
                  $data=converte_data($linha["data"]);
                  $data=converte_data($linha["data"]);
                  $dizimo=str_replace(".",",",$linha["dizimo"]);
                  $canta_reza=str_replace(".",",",$linha["canta_reza"]);
                  $batisterio=str_replace(".",",",$linha["batisterio"]);
                  $sepultamento=str_replace(".",",",$linha["sepultamento"]);
                  $batismo=str_replace(".",",",$linha["batismo"]);
                  $casamento=str_replace(".",",",$linha["casamento"]);
		          $missas=str_replace(".",",",$linha["missas"]);
                  $terreno_cemiterio=str_replace(".",",",$linha["terreno_cemiterio"]);
                  $total= number_format(str_replace(".",",",$linha["dizimo"]+$linha["canta_reza"]+$linha["batisterio"]+$linha["sepultamento"]+$linha["batismo"]+$linha["casamento"]+$linha["terreno_cemiterio"]+$linha["missas"]),2,',','.');
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\" align=\"right\">$data</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$dizimo</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$canta_reza</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$batisterio</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$sepultamento</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$batismo</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$casamento</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$terreno_cemiterio</td>
		              <td bgcolor=\"#ffffff\" align=\"right\">$missas</td>
                      <td bgcolor=\"#ffffff\" align=\"right\">$total</td>
                  </tr>
                  ";
            }
            $dizimo_total1 = number_format($dizimo_total,2,',','.');
            $canta_reza_total1 = number_format($canta_reza_total,2,',','.');
            $batisterio_total1 = number_format($batisterio_total,2,',','.');
            $sepultamento_total1 = number_format($sepultamento_total,2,',','.');
            $batismo_total1 = number_format($batismo_total,2,',','.');
            $casamento_total1 = number_format($casamento_total,2,',','.');
            $missas_total1 = number_format($missas_total,2,',','.');
            $terreno_cemiterio_total1 = number_format($terreno_cemiterio_total,2,',','.');
            $total1 = number_format(($dizimo_total + $canta_reza_total + $batisterio_total + $sepultamento_total + $batismo_total + $casamento_total + $missas_total + $terreno_cemiterio_total),2,',','.');
            echo "
            <td bgcolor=\"#ffffff\" align=\"center\">Totais</td>
            <td bgcolor=\"#ffffff\" align=\"right\"><b>$dizimo_total1</b></td>
            <td bgcolor=\"#ffffff\" align=\"right\"><b>$canta_reza_total1</b></td>
            <td bgcolor=\"#ffffff\" align=\"right\"><b>$batisterio_total1</b></td>
            <td bgcolor=\"#ffffff\" align=\"right\"><b>$sepultamento_total1</b></td>
            <td bgcolor=\"#ffffff\" align=\"right\"><b>$batismo_total1</b></td>
            <td bgcolor=\"#ffffff\" align=\"right\"><b>$casamento_total1</b></td>
            <td bgcolor=\"#ffffff\" align=\"right\"><b>$terreno_cemiterio_total1</b></td>
		    <td bgcolor=\"#ffffff\" align=\"right\"><b>$missas_total1</b></td>
            <td bgcolor=\"#ffffff\" align=\"right\"><b>$total1</b></td>
            ";
            ?>
     </table>


