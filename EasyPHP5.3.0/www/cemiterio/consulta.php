<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Tela de Consulta de Dados</h3>
            <br>
            <div id=\"mensagem_inicial\">
                  <b>Dica:</b> Clique nos botões abaixo para acessar a tela de cadastro que deseja!
            </div>
            <br>
            <div id=\"navegacao\">
                 <ul>
                     <li><a href=\"pre_consulta_contrato.php\" title=\"Clique aqui para consultar dados do contrato!\">Contrato</a></li>
                     <li><a href=\"pre_consulta_sepultamento.php\" title=\"Clique aqui para consultar dados do sepultamento!\">Sepultamento</a></li>
                     <li><a href=\"pre_consulta_obito.php\" title=\"Clique aqui para consultar dados do óbito!\">Óbito</a></li>
		             <li><a href=\"consulta_periodo_obito.php\" title=\"Clique aqui para consultar por período dos óbitos!\">Óbito por Período</a></li>
		             <li><a href=\"consulta_assinatura.php\" title=\"Clique aqui para consultar assinaturas!\">Assinatura</a></li>
                 </ul>
            </div>

        </td>
    </tr>
    ";
    include "rodape.inc";
?>
