<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Fun��o para validar formulario e verificar se esta entrando com dados em branco
     echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Tela de Altera��o de Dados</h3>
            <br>
            <div id=\"mensagem_inicial\">
                  <b>Dica:</b> Clique nos bot�es abaixo para acessar a tela de altera��o que deseja!
            </div>
            <br>
            <div id=\"navegacao\">
                 <ul>
                     <li><a href=\"pre_alterar_contrato.php\" title=\"Clique aqui para alterar dados do contrato!\">Contrato</a></li>
                     <li><a href=\"pre_alterar_sepultamento.php\" title=\"Clique aqui para alterar dados do sepultamento!\">Sepultamento</a></li>
                     <li><a href=\"pre_alterar_obito.php\" title=\"Clique aqui para alterar dados do �bito!\">�bito</a></li>
                 </ul>
            </div>
         </td>
    </tr>
    ";
    include "rodape.inc";
?>
