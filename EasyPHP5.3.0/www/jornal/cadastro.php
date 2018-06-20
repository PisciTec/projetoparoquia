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
                     <li><a href=\"cadastra_cliente.php\" title=\"Clique aqui para cadastrar um cliente!\">Cliente</a></li>
                     <li><a href=\"cadastra_cidade.php\" title=\"Clique aqui para cadastrar uma cidade!\">Cidade</a></li>
                     <li><a href=\"cadastra_pais.php\" title=\"Clique aqui para cadastrar um pais!\">País</a></li>
                     <li><a href=\"cadastra_correspondencia.php\" title=\"Clique aqui para cadastrar o motivo da correspondência!\">Motivo da Correspondência</a></li>
                 </ul>
            </div>
            
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
