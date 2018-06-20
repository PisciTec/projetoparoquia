<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";
   
    $contrato = $_GET["contrato"];
    $consulta = "select * from cemiterio_contrato where contrato='$contrato'";
    $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados do contrato");
    $linha = mysql_fetch_array($resposta);

    $quadra = $linha["QUADRA"];
    $ala = $linha["ALA"];
    $sepultura = $linha["SEPULTURA"];
    $titular = $linha["TITULAR"];
    $endereco = $linha["ENDERECO"];
    $bairro = $linha["BAIRRO"];
    $cidade = $linha["CIDADE"];
    $estado = $linha["ESTADO"];
    $cep = $linha["CEP"];
    $fone = $linha["FONE"];
    $inicio = converte_data($linha["INICIO"]);
    $termino = converte_data($linha["TERMINO"]);
    $valor = $linha["VALOR"];
    $datarec = $linha["DATAREC"];
    $obs = $linha["OBS"];
    
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Detalhes do Contrato</h3>
            <br>           
                  <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" class=\"tabela_formatada\">
                         
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
                                 <b>Titular:</b>
                             </td>
                             <td class=\"td2\">
                                 $titular
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Endereço:</b>
                             </td>
                             <td class=\"td2\">
                                 $endereco
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Bairro:</b>
                             </td>
                             <td class=\"td2\">
                                 $bairro
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Cidade:</b>
                             </td>
                             <td class=\"td2\">
                                 $cidade
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Estado:</b>
                             </td>
                             <td class=\"td2\">
                                 $estado
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Cep:</b>
                             </td>
                             <td class=\"td2\">
                                 $cep
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Telefone:</b>
                             </td>
                             <td class=\"td2\">
                                 $fone
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Início:</b>
                             </td>
                             <td class=\"td2\">
                                 $inicio
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Término:</b>
                             </td>
                             <td class=\"td2\">
                                 $termino
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Valor R$:</b>
                             </td>
                             <td class=\"td2\">
                                 $valor
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Recebimento:</b>
                             </td>
                             <td class=\"td2\">
                                 $datarec
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Obs:</b>
                             </td>
                             <td class=\"td2\">
                                 $obs
                             </td>
                         </tr>                       
                   </table>            
        </td>
    </tr>
    ";   
    include "rodape.inc";
?>
