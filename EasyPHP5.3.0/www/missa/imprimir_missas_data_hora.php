<?php
include "abreconexao.php";
include "funcoes.inc";

?>
<img src="img/logo_relatorio_missa.jpg" border="0" width="750px" height="85px">
<br>
<div id="scroll_menor">
<?php
        $data = converte_data($_GET["data"]);	
        $hora = $_GET["hora"];
        echo "
             <b>Data:</b> $data <br><b>Hora:</b> $hora
             <br>
        ";
        $data = $_GET["data"];
        $hora = $_GET["hora"];
	$cont = 0;

        $consulta_tipo = "select * from missa_tipo order by sequencia asc";
        $resposta_tipo = mysql_query($consulta_tipo) or die ("Não foi possivel consultar o tipo");
        
        while ($linha_tipo = mysql_fetch_array($resposta_tipo)) {
              echo "<h3>$linha_tipo[nome_tipo]</h3>";
              $cod_tipo = $linha_tipo["cod_tipo"];
              $consulta = "select * from missa a inner join missa_tipo b where a.cod_tipo = b.cod_tipo and a.data = '$data' and a.hora = '$hora'
                          and b.cod_tipo = '$cod_tipo' order by a.nome asc";
              $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados");

?>
              <table border="0" cellpadding="1" cellspacing="1" width="90%" bgcolor="#000000">
              
<?php

	      while($linha=mysql_fetch_array($resposta)){
	      $cont++;              
              echo "
              <tr>                  
                  <td bgcolor=\"#ffffff\">$linha[nome]</td>
              </tr>
              ";
              }
?>
              <tr>
              </table>
              <hr>
              <br>
<?php
        }	
	echo "<br><b>Total:</b> ";
	echo $cont;
?>
