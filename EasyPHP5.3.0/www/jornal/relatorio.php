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
                     <li><a href=\"gerar_etiqueta_pdf.php\" title=\"Clique aqui para gerar as etiquetas!\" target=\"_blank\">Gerar Etiquetas</a></li>
                     <li><a href=\"relatorio_ativos.php\" title=\"Clique aqui para gerar o relatório de pessoas ativas!\" target=\"_blank\">Clientes Ativos</a></li>
                     <li><a href=\"relatorio_etiquetas_estado.php\" title=\"Clique aqui para gerar as etiquetas por estado!\" target=\"_self\">Etiquetas por Estado</a></li>
                     <li><a href=\"relatorio_etiquetas_pais.php\" title=\"Clique aqui para gerar as etiquetas por pais!\" target=\"_self\">Etiquetas por País</a></li>
                 </ul>
            </div>
            
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
