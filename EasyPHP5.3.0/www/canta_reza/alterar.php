<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco

    if ($_GET["acao"] == "editar") {
          $codigo = $_GET["codigo"];
          echo "
               <script language=\"JavaScript\">
                       janela = window.open(\"alterar_dados_pessoa.php?codigo=$codigo\", \"\", \"height=510, width=600, status, scroll=yes\");
               </script>
          ";
    }
    
    if ($_GET["acao"] == "excluir") {
          $codigo = $_GET["codigo"];
          echo "
               <script language=\"JavaScript\">
                       janela = window.open(\"desligamento_pessoa.php?codigo=$codigo\", \"\", \"height=510, width=600, status, scroll=yes\");
               </script>
          ";
          /*
          $delecao = "update tab_pessoa set status_habilitado='1' where cod_pessoa = '$cod_pessoa'";
          mysql_query($delecao, $conectar) or die ("Não foi possível inserir status de excluido!");
          echo "
               <script language=\"JavaScript\">
                       alert('Dados de pessoa excluido com sucesso!');
               </script>
          ";
          */
    }

    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.f1['nome'].value == ''){
                          alert('Informe o nome da pessoa que deseja alterar!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Alterações de Dados do Pessoa</h3>
            <br>
            <form method=\"post\" action=\"alterar.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">
                  <input type=\"hidden\" name=\"cod_pessoa\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">
                         <tr>
                             <td>
                                 <b>Nome Pessoa:</b>
                             </td>
                             <td>
                                 <input type=\"text\" name=\"nome\" value=\"$_POST[nome]\" size=\"40\" maxlength=\"80\" class=\"field_textbox\">
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <input type=\"submit\" name=\"alterar\" value=\"Pesquisar\" class=\"botao_ok\">
                             </td>
                         </tr>
                  </table>
     ";
     
     if (isset($_POST["alterar"])) {
        $nome = $_POST["nome"];
        $consulta = "select codigo, nome, pai, mae, endereco from canta_reza_pessoa where nome like '%$nome%'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"600\">
              <tr>
                  <td bgcolor=\"#C0C0C0\"><b>Nome Pessoa</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Mãe</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Ação</b></td>
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["codigo"];
                  $nome = $linha["nome"];
                  $mae = $linha["mae"];
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\">$nome</td>
                      <td bgcolor=\"#ffffff\">$mae</td>
                      <td bgcolor=\"#ffffff\" align=\"center\">
                          <a href=\"alterar.php?acao=editar&codigo=$codigo\" target=\"_self\" title=\"Clique aqui para alterar dados de pessoa\"><img src=\"img/icn_editar.gif\" width=\"16\" height=\"14\" border=\"0\"></a>
                          &nbsp;&nbsp;&nbsp;
                          <input type=\"button\" value=\"Excluir\" class=\"botao_ok\" onclick=\"if (confirm('Tem certeza que deseja excluir?')){ window.location.href='alterar.php?acao=excluir&codigo=$codigo';}\">
                          <a href=\"alterar.php?acao=excluir&codigo=$codigo\" target=\"_self\" title=\"Clique aqui para realizar o desligamento dos dados de pessoa\"><img src=\"img/icn_excluir.gif\" width=\"16\" height=\"14\" border=\"0\"></a>
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
