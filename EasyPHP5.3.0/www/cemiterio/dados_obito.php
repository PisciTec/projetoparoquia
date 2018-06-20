<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";    
   
    $cod_obito = $_GET["cod_obito"];
    $consulta = "select * from cemiterio_obitos where cod_obito='$cod_obito'";
    $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados do obito");
    $linha = mysql_fetch_array($resposta);

    $livro = $linha["OBLIVRO"];
    $folha = $linha["OBFOLHA"];
    $numero = $linha["OBNUMERO"];
    $nome = $linha["OBNOME"];
    $data = converte_data($linha["OBDATA"]);
    $local = $linha["OBLOCAL"];
    $paroquia = $linha["OBPAROQUIA"];
    $idade = $linha["OBIDADE"];
    $natura = $linha["OBNATURA"];
    $resid = $linha["OBRESID"];
    $pai = $linha["OBPAI"];
    $mae = $linha["OBMAE"];
    $conjuge = $linha["OBCASADO"];
    $sepult = $linha["OBSEPULT"];
    
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Detalhes do Óbito</h3>
            <br>           
                  <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" class=\"tabela_formatada\">
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Cod. Óbito:</b>
                             </td>
                             <td class=\"td2\">
                                 $cod_obito
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Livro:</b>
                             </td>
                             <td class=\"td2\">
                                 $livro
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Folha:</b>
                             </td>
                             <td class=\"td2\">
                                $folha
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Número:</b>
                             </td>
                             <td class=\"td2\">
                                 $numero
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
                                 <b>Data:</b>
                             </td>
                             <td class=\"td2\">
                                 $data
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Local:</b>
                             </td>
                             <td class=\"td2\">
                                 $local
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Paroquia:</b>
                             </td>
                             <td class=\"td2\">
                                 $paroquia
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Idade:</b>
                             </td>
                             <td class=\"td2\">
                                 $idade
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Natural de:</b>
                             </td>
                             <td class=\"td2\">
                                $natura
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Residente em:</b>
                             </td>
                             <td class=\"td2\">
                                $resid
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Pai:</b>
                             </td>
                             <td class=\"td2\">
                                 $pai
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Mãe:</b>
                             </td>
                             <td class=\"td2\">
                                 $mae
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Casado com:</b>
                             </td>
                             <td class=\"td2\">
                                 $conjuge
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Sepultado no cemitério de:</b>
                             </td>
                             <td class=\"td2\">
                                 $sepult
                             </td>
                         </tr>                      
                  </table>            
        </td>
    </tr>
    ";    
    include "rodape.inc";
?>
