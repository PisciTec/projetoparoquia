<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";

$consulta="select * from tab_caixa order by data desc limit 0,10";
$resposta=mysql_query($consulta) or die ("N�o foi poss�vel realizar a consulta");
?>
<div style="height: 450px; width: 579px;" align="center">
<h3>Pesquisa de Lan�amentos</h3>
<form method="post" action="consulta.php">
      <label>Data Inicial:</label>
      
</form>
</div>
<?php
include "rodape.inc";
?>
