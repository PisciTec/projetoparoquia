<?php
    include "cabecalho.inc";
    include "menu.inc";
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Tela de Cadastro de Dados</h3>
            <br>
            <br>
            <div id=\"mensagem_inicial\">
                  <b>Dica:</b> Clique nos bot�es abaixo para acessar a tela de cadastro que deseja!

            </div>
            <br>
            <div id=\"navegacao\">
                 <ul>
                     <li><a href=\"cadastra_batizado.php\" title=\"Clique aqui para cadastrar um batizado!\">Batizado</a></li>
                     <li><a href=\"cadastra_assinatura.php\" title=\"Clique aqui para cadastrar um assinante!\">Assinatura</a></li>
                 </ul>
            </div>
            
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
