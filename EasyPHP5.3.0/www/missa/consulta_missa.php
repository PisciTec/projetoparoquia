<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";
include "menu.inc";
$consulta = "select * from missa, missa_tipo where missa.cod_tipo = missa_tipo.cod_tipo";
$resposta = mysql_query($consulta) or die ("Não foi possível consultar dados");

?>
<div style="height: 450px; width: 579px;" align="center">
<table border="1" cellpadding="0" cellspacing="0" width="400">
       <tr>
           <td>Codigo</td>
           <td>Data</td>
           <td>Hora</td>
           <td>Nome</td>
           <td>Tipo</td>
       </tr>
       <?php
       while($linha=mysql_fetch_array($resposta)){
       $data=converte_data($linha["data"]);
       echo "
       <tr>
           <td>$linha[cod_missa]</td>
           <td>$data</td>
           <td>$linha[hora]</td>
           <td>$linha[nome]</td>
           <td>$linha[nome_tipo]</td>
       </tr>
       ";
       }
       ?>
       <tr>
</table>
</div>
<?php
include "rodape.inc";
?>
