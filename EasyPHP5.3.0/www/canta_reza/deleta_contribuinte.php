<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";
include "menu.inc";

$deleta = "delete from canta_reza_contribuinte where cod_contribuinte='$_GET[cod_contribuinte]'";
mysql_query($deleta) or die ("N�o foi poss�vel excluir dados do contribuinte");
echo "
       <script language=\"JavaScript\">
            alert('Dados exclu�dos com sucesso!');
       </script>
";

?>
<div style="height: 400px; width: 579px;" align="center">

</div>
<?php
include "rodape.inc";
?>
