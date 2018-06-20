<?php
    include "abreconexao.php";
    include "cabecalho.inc";
    include "menu.inc";
    
    if (isset($_GET["acao"]) and $_GET["acao"] == "deletar"){
       $deletar = "delete from tab_assinatura where cod_assinatura = '$_GET[cod_assinatura]'";
       mysql_query($deletar) or die ("Não foi possivel deletar esta assinatura");
       echo "
       <script language=\"JavaScript\">
            alert('Assinatura excluida com sucesso!');
       </script>
       ";
    }
    
    $consulta = "select * from tab_assinatura";
    $resposta = mysql_query($consulta) or die ("Não foi possível realizar a consulta de assinaturas");
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
        <h3>Consulta de Assinaturas</h3>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#000000\">
               <tr>
                   <th bgcolor=\"#c0c0c0\">Assinatura</th>
                   <th bgcolor=\"#c0c0c0\">Ação</th>
               </tr>
    ";
               while ($linha = mysql_fetch_array($resposta)){
                     $cod_assinatura = $linha["cod_assinatura"];
                     $nome_assinatura = $linha["nome_assinatura"];
                     echo "
                          <tr>
                              <td bgcolor=\"#ffffff\">$nome_assinatura</td>
                              <td bgcolor=\"#ffffff\"><a href=\"consulta_assinatura.php?acao=deletar&cod_assinatura=$cod_assinatura\" target=\"_self\"><img src=\"img/icn_excluir.gif\" width=\"16\" height=\"15\" border=\"0\"></td>
                          </tr>
                     ";
               }
    echo "
         </table>
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
