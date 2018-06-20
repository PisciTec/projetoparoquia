<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
     $cod_pessoa = $_POST["cod_pessoa"];
     echo "
           <script language=\"JavaScript\">
                 function validaFormulario() {
                       if (document.f1['nome'].value == ''){
                          alert('Informe o nome da pessoa que deseja alterar!');
                          return false;
                       }
                       return true;
                 }
                 function abreConsulta(endereco){
                         window.open(endereco, \"\", \"height=510, width=600, status\");
                 }
         </script>
    ";

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Tela de Cadastro de Contribuição</h3>
            <br>
            <form method=\"post\" action=\"cadastra_contribuicao.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">
                  <input type=\"hidden\" name=\"cod_pessoa\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         <tr>
                             <td class=\"td1\">
                                 <b>Nome Pessoa:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"nome\" size=\"40\" maxlength=\"80\" class=\"field_textbox\">
                             </td>
                         </tr>
                         <tr>
                             <td class=\"td2\" colspan=\"2\">
                                 <input type=\"submit\" name=\"alterar\" value=\"Pesquisar\" class=\"botao_ok\">
                             </td>
                         </tr>
                  </table>
     ";
     
     if (isset($_POST["alterar"])) {
        $nome = $_POST["nome"];
        $consulta = "select codigo, nome, mae from dizimo where nome like '%$nome%' and motivo = '1'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado:</b> $total
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"600\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td1\"><b>Nome Pessoa</b></td>
                  <td class=\"td1\"><b>Mãe</b></td>
                  <td class=\"td1\"><b>Ação</b></td>
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["codigo"];
                  $nome = $linha["nome"];
                  $mae = $linha["mae"];
                  echo "
                  <tr>
                      <td class=\"td2\">$nome</td>
                      <td class=\"td2\">$mae</td>
                      <td class=\"td2\" align=\"center\">
                          <a href=\"javascript:onclick=abreConsulta('confirma_contribuicao.php?codigo=$codigo');\" target=\"_self\" title=\"Clique aqui para confirmar pagamento de contribuição\"><img src=\"img/icn_pagar.gif\" width=\"25\" height=\"23\" border=\"0\"></a>
                      </td>
                  </tr>
                  ";
          }
          echo "
        </table>
          ";
     }
     echo "
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
