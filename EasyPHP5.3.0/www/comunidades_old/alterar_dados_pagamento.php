<?php
include "abreconexao.php";
include "funcoes.inc";

// Verificação de usuário logado!
$consulta_logado = "select * from comunidade_usuario where nome_usuario = 'admin' and status_usuario = 'logado'";
$resposta = mysql_query($consulta_logado) or die ("Não foi possível consultar dados de logado!");
$num = mysql_num_rows($resposta);

if ($num == 0) {
   echo "
           <script language=\"JavaScript\">
                   window.alert('Você não esta logado no sistema!');
                   window.location.href='index.php';
           </script>
   ";
}
// ###############################

if (isset($_POST["cadastro"]) and $_POST["cadastro"]) {
   $cod_pagamento = $_POST["cod_pagamento"];
   $nome = $_POST["nome"];
   $data = converte_data($_POST["data"]);
   $valor = str_replace(",", ".", $_POST["valor"]);
   
   $atualiza = "update pagamento set nome = '$nome', data = '$data', valor = '$valor' where cod_pagamento = '$cod_pagamento'";
   mysql_query($atualiza) or die ("Não foi possível atualizar pagamento");
   echo "
       <script language=\"JavaScript\">
             window.alert('Pagamento atualizado com sucesso');
             window.location.href='consulta_periodo.php';
       </script>
   ";
}
?>

<html>
<head>
<title>Controle de Pagamentos</title>
<link rel="stylesheet" type="text/css" href="estilo_novo.css">
<script language="JavaScript" src="js/funcao_mascara.js" type="text/javascript"></script>
<head>

<body onLoad="Mascaras.carregar();">

<table border="0" cellpadding="1" cellspacing="1" class="table_formatada" width="700" height="600">
       <tr>
           <td bgcolor="#c0c0c0" height="70" align="center">
               <h2>Controle de Pagamentos</h2>
           </td>
       </tr>
       <tr>
           <td bgcolor="#ffffff" height="500" valign="top">
               <h3>Alteração de Dados de Pagamento</h3>
               <?php
               $cod_pagamento = $_GET["cod_pagamento"];
               $consulta = "select * from pagamento where cod_pagamento = '$cod_pagamento'";
               $resposta = mysql_query($consulta) or die ("Não foi possível consultar pagamento");
               $linha = mysql_fetch_array($resposta);
               $nome = $linha["nome"];
               $data = converte_data($linha["data"]);
               $valor = number_format($linha["valor"], 2, ',','');
               ?>
               <form action="alterar_dados_pagamento.php" method="post">
                     <input type="hidden" name="cod_pagamento" value="<?php echo $cod_pagamento; ?>">
                     <label>Nome:</label>
                     <input type="text" name="nome" value="<?php echo $nome; ?>" size="50" maxlenght="70" class="campos">
                     <br>
                     <label>Data:</label>
                     <input type="text" name="data" value="<?php echo $data; ?>" size="13" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####">
                     <br>
                     <label>Valor:</label>
                     <input type="text" name="valor" value="<?php echo $valor; ?>" size="10" class="campos">
                     <br>
                     <input type="submit" name="cadastro" value="Salvar" class="botao">
                     &nbsp;
                     <input type="button" value="Cancelar" class="botao" onclick="window.location.href='consulta_periodo.php';">
               </form>
           </td>
       </tr>
       <tr>
           <td bgcolor="#c0c0c0" height="30" align="center">
               COMUNIDADES.
           </td>
       </tr>
</table>

</body>

</html>


