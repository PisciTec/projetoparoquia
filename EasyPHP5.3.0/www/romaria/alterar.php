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
                       janela = window.open(\"alterar_dados_romaria.php?codigo=$codigo\", \"\", \"height=510, width=600, status, scroll=yes\");
               </script>
          ";
    }

    if ($_GET["acao"] == "excluir") {
          $codigo = $_GET["codigo"];
          $query = "delete from tab_romaria where cod_romaria = '$codigo'";
          mysql_query($query, $conectar) or die ("Não foi possível excluir dados de romaria");
           echo "
               <script language=\"JavaScript\">
                       alert('Dados excluídos com sucesso!');
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
                       if (document.f1['fretante'].value == ''){
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
            <h3>Alterações de Dados de Romarias</h3>
            <br>
            <form method=\"post\" action=\"alterar.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">

                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">
                         <tr>
                             <td>
                                 <b>Fretante:</b>
                             </td>
                             <td>
                                 <input type=\"text\" name=\"nome\" value=\"\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
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
        $fretante = $_POST["fretante"];
        $consulta = "select cod_romaria, fretante, endereco, cidade from tab_romaria where fretante like '%$fretante%'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de romarias!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"600\">
              <tr>
                  <td bgcolor=\"#C0C0C0\" width=\"10%\"><b>Cod.</b></td>
                  <td bgcolor=\"#C0C0C0\" width=\"40%\"><b>Fretante</b></td>
                  <td bgcolor=\"#C0C0C0\" width=\"10%\"><b>Endereço</b></td>
                  <td bgcolor=\"#C0C0C0\" width=\"10%\"><b>Cidade</b></td>
                  <td bgcolor=\"#C0C0C0\" width=\"30%\" align=\"center\"><b>Ação</b></td>
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["cod_romaria"];
                  $fretante = $linha["fretante"];
                  $endereco = $linha["endereco"];
                  $cidade = $linha["cidade"];
                  echo "
                  <tr>
                       <td bgcolor=\"#ffffff\">$codigo</td>
                      <td bgcolor=\"#ffffff\">$fretante</td>
                      <td bgcolor=\"#ffffff\">$endereco</td>
                      <td bgcolor=\"#ffffff\">$cidade</td>
                      <td bgcolor=\"#ffffff\" align=\"center\">
                          <a href=\"alterar.php?acao=editar&codigo=$codigo\" target=\"_self\" title=\"Clique aqui para alterar dados das romarias\"><img src=\"img/icn_editar.gif\" width=\"16\" height=\"14\" border=\"0\"></a>
                          &nbsp;&nbsp;&nbsp;
                          <input type=\"button\" value=\"Excluir\" class=\"botao_ok\" onclick=\"if (confirm('Tem certeza que deseja excluir?')){ window.location.href='alterar.php?acao=excluir&codigo=$codigo';}\">

                          &nbsp;&nbsp;&nbsp;
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
