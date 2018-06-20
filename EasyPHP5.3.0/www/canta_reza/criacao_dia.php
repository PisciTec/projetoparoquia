<?php
include "abreconexao.php";

$consulta="select codigo, datacasa from dizimo";
$resposta=mysql_query($consulta) or die ("Não foi possível realizar consulta de data");

while ($linha=mysql_fetch_array($resposta)){
      $data=explode("-",$linha["datacasa"]);
      $dia_casamento=$data[2];
      $codigo=$linha["codigo"];
      $atualiza="update dizimo set DIA_CASAMENTO='$dia_casamento' where CODIGO='$codigo'";
      mysql_query($atualiza);
}
echo "Realizado com sucesso";

?>
