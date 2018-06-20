<?php
    include "abreconexao.php";
    include "cabecalho.inc";
    include "menu.inc";
    
    if (isset($_POST["cadastro"])){
       $inserir="insert into tab_assinatura (nome_assinatura) values ('$_POST[nome_assinatura]')";
       mysql_query($inserir) or die ("Não foi possível inserir dados");
       echo "
       <script language=\"JavaScript\">
            alert('Dados inseridos com sucesso!');
       </script>
       ";
    }
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Cadastro de Assinatura</h3>
            <form method=\"post\" action=\"cadastra_assinatura.php\">
            <label>Nome Assinatura:</label><input type=\"text\" name=\"nome_assinatura\" size=\"50\"><br>
            <input type=\"submit\" name=\"cadastro\" value=\"Cadastrar\">
            </form>
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
