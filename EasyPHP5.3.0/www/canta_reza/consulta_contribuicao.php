<?php
include "abreconexao.php";
include "funcoes.inc";
include "cabecalho.inc";
include "menu.inc";

if (isset($_POST["consulta"])){
   $data_inicio=converte_data($_POST["data_inicio"]);
   $data_final=converte_data($_POST["data_final"]);
   $consulta="select a.cod_contribuicao, a.mes, a.ano, b.nome from canta_reza_contribuicao a, canta_reza_contribuinte b where b.cod_contribuinte=a.fk_cod_contribuinte and (a.data_pagamento between '$data_inicio' and '$data_final')";
   $resposta=mysql_query($consulta) or die ("Não foi possível realizar a consulta");
   $mostra=true;
}

if (isset($_GET["acao"]) and $_GET["acao"]=='deletar'){
   $deletar="delete from canta_reza_contribuicao where cod_contribuicao = '$_GET[cod_contribuicao]'";
   mysql_query($deletar);
   echo "
       <script language=\"JavaScript\">
            alert('Contribuicao deletada com sucesso!');
       </script>
       ";
}
?>
<div style="height: 400px; width: 579px;" align="center">
<form method="POST" action="consulta_contribuicao.php">
<table border="0" cellpadding="0" cellspacing="0" width="400">
       <caption>Período da Pesquisa</caption>
       <tr>
           <td><label>Data Início(dd/mm/aaaa):</label></td>
           <td><input type="text" name="data_inicio" size="10" class="campos"></td>
       </tr>
       <tr>
           <td><label>Data Final(dd/mm/aaaa):</label></td>
           <td><input type="text" name="data_final" size="10" class="campos"></td>
       </tr>
</table>
        <input type="submit" name="consulta" value="Consultar" class="botao_ok">
</form>

<?php
if (isset($mostra)){
     echo "
          <table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" width=\"400\" class=\"tabela_formatada\">
          <caption>Lista de contribuições no período</caption>
          <tr>
              <th class=\"td1\">Contribuinte</th>
              <th class=\"td1\">Mês</th>
              <th class=\"td1\">Ano</th>
              <th class=\"td1\">Ação</th>
          </tr>
     ";
     while ($linha=mysql_fetch_array($resposta)){
          $cod_contribuicao=$linha["cod_contribuicao"];
          $nome=$linha["nome"];
          $mes=$linha["mes"];
          $ano=$linha["ano"];
          
          echo "
           <tr>
               <td class=\"td2\">$nome</td>
               <td class=\"td2\">$mes</td>
               <td class=\"td2\">$ano</td>
               <td class=\"td3\" align=\"center\">
                   <a href=\"consulta_contribuicao.php?acao=deletar&cod_contribuicao=$cod_contribuicao\"><img src=\"img/icn_excluir.gif\" width=\"16\" height=\"15\" border=\"0\"></a>
               </td>
           </tr>
          ";
     }
     echo "</table>";
}
?>
</div>
<?php
include "rodape.inc";
?>
