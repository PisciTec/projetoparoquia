<?php
include "abreconexao.php";
include "funcoes.inc";

if (isset($_POST["cadastro"]) and $_POST["cadastro"]) {
   $nome = $_POST["nome"];
   $data = converte_data($_POST["data"]);
   $valor = str_replace(",", ".", $_POST["valor"]);
   //number_format(, 2, '.','');

   $cadastro = "insert into pagamento (nome, data, valor) values ('$nome', '$data', '$valor')";
   mysql_query($cadastro) or die ("Não foi possível cadastrar pagamento");
   echo "
       <script language=\"JavaScript\">
             window.alert('Pagamento cadastrado com sucesso');
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
               <input type="button" value="Consulta por Período" class="botao" onclick="window.location.href='consulta_periodo.php';">
               <h3>Cadastro de Pagamento</h3>
               <form action="index.php" method="post">
                     <label>Nome:</label>
                     <input type="text" name="nome" size="50" maxlenght="70" class="campos">
                     <br>
                     <label>Data:</label>
                     <input type="text" name="data" value="<?php echo date("d/m/Y"); ?>" size="13" maxlenght="10" class="campos" tipo="numerico" mascara="##/##/####">
                     <br>
                     <label>Valor:</label>
                     <input type="text" name="valor" size="10" class="campos">
                     <br>
                     <input type="submit" name="cadastro" value="Salvar" class="botao">
                     &nbsp;
                     <input type="reset" value="Limpar campos" class="botao">
               </form>
               <br>
               <h3>Lista dos Últimos Pagamentos</h3>
               <div id="scroll_menor">
                    <table border="0" cellpadding="1" cellspacing="1" class="table_formatada" width="90%">
                           <tr>
                               <td bgcolor="#c0c0c0" width="80%">Nome</td>
                               <td bgcolor="#c0c0c0" width="10%">Data</td>
                               <td bgcolor="#c0c0c0" width="10%">Valor</td>
                           </tr>
                           <?php
                           $consulta = "select * from pagamento order by cod_pagamento desc limit 0, 50";
                           $resposta = mysql_query($consulta)  or die ("Não foi possível realizar consulta de pagemento");
                           while ($linha = mysql_fetch_array($resposta)) {
                                 $data = converte_data($linha["data"]);
                                 $valor = number_format($linha["valor"], 2, ',','');
                                 echo "
                                      <tr>
                                          <td bgcolor=\"#ffffff\">$linha[nome]</td>
                                          <td bgcolor=\"#ffffff\">$data</td>
                                          <td bgcolor=\"#ffffff\" align=\"right\">$valor</td>
                                      </tr>
                                 ";
                           }
                           ?>
                    </table>
               </div>
           </td>
       </tr>
       <tr>
           <td bgcolor="#c0c0c0" height="30" align="center">
               Canta e Reza.
           </td>
       </tr>
</table>

</body>

</html>


