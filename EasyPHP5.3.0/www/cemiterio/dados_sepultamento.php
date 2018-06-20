<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";
       
    $cod_sepultamento = $_GET["cod_sepultamento"];
    $consulta = "select * from cemiterio_sepultamento where cod_sepultamento='$cod_sepultamento'";
    $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados do sepultamento");
    $linha = mysql_fetch_array($resposta);

    $contrato = $linha["CONTRATO"];
    $quadra = $linha["QUADRA"];
    $ala = $linha["ALA"];
    $sepultura = $linha["SEPULTURA"];
    $nome = $linha["NOME"];
    $data_sepultamento = converte_data($linha["DATA_SEPULTAMENTO"]);
    
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Detalhes do Sepultamento</h3>
            <br>                 
                  <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" class=\"tabela_formatada\">
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Cod. Sepultamento:</b>
                             </td>
                             <td class=\"td2\">
                                 $cod_sepultamento
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Contrato:</b>
                             </td>
                             <td class=\"td2\">
                                 $contrato
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Quadra:</b>
                             </td>
                             <td class=\"td2\">
                                 $quadra
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Ala:</b>
                             </td>
                             <td class=\"td2\">
                                 $ala
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Sepultura:</b>
                             </td>
                             <td class=\"td2\">
                                 $sepultura
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Nome:</b>
                             </td>
                             <td class=\"td2\">
                                 $nome
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Falecimento:</b>
                             </td>
                             <td class=\"td2\">
                                 $data_sepultamento
                             </td>
                         </tr>                       
                   </table>           
        </td>
    </tr>
    ";  
    include "rodape.inc";
?>
