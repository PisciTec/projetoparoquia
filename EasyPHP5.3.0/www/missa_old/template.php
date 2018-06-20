<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";

if (isset($_POST["cadastro"]) and $_POST["cadastro"]){
$inserir = "insert into canta_reza_contribuicao (fk_cod_contribuinte, carne_numero, mes, ano, data_pagamento, valor) values ('$_POST[fk_cod_contribuinte]', '$_POST[carne_numero]', '$_POST[mes]', '$_POST[ano]', '$_POST[data_pagamento]', '$_POST[valor]')";
mysql_query($inserir) or die ("Não foi possível cadastrar dados");
echo "
       <script language=\"JavaScript\">
            alert('Dados inseridos com sucesso!');
       </script>
";
}
?>
<div style="height: 450px; width: 579px;" align="center">
<form method="POST" action="cadastra_contribuinte.php">
<table border="0" cellpadding="0" cellspacing="0" width="400">

</table>
</form>
</div>
<?php
include "rodape.inc";
?>
