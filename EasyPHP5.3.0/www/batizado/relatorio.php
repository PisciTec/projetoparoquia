<?php
    include "cabecalho.inc";
    include "menu.inc";
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Tela de Relatórios de Dados</h3>
            <br>
            <br>
            <div id=\"mensagem_inicial\">
                  <b>Dica:</b> Clique nos botões abaixo para acessar a tela de cadastro que deseja!
            </div>
            <br>
            <div id=\"navegacao\">
                 <ul>
                     <li><a href=\"relatorio_gerar_lembranca.php\" title=\"Clique aqui para gerar a lembrança de casamento!\" target=\"_blank\">Gerar lembrança</a></li>
                 </ul>
            </div>
            
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
