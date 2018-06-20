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
                  <b>Dica:</b> Clique nos botões abaixo para acessar a tela de cadastro que deseja!

            </div>
            <br>
            <div id=\"navegacao\">
                 <ul>
                     <li><a href=\"cadastra_contrato.php\" title=\"Clique aqui para cadastrar um contrato!\">Contrato de Sepultura</a></li>                     
                     <li><a href=\"cadastra_obito.php\" title=\"Clique aqui para cadastrar um obito!\">Óbito</a></li>
                     <li><a href=\"cadastra_sepultamento.php\" title=\"Clique aqui para cadastrar um sepultamento!\">Sepultamento</a></li>
                     <li><a href=\"cadastra_assinatura.php\" title=\"Clique aqui para cadastrar um assinate de documentos!\">Assinatura</a></li>
                 </ul>
            </div>
            
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
