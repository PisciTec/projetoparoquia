<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco

    if (isset($_GET["acao"]) & $_GET["acao"] == "editar") {
          $codbatismo = $_GET["codbatismo"];
          echo "
               <script language=\"JavaScript\">
                       janela = window.open(\"alterar_dados_batizado.php?codbatismo=$codbatismo\", \"\", \"height=510, width=600, status, scroll=yes\");
               </script>
          ";
    }
    
    if (isset($_GET["acao"]) & $_GET["acao"] == "excluir") {
          $codbatismo = $_GET["codbatismo"];
          $query = "delete from batismo where codbatismo = '$codbatismo'";
          mysql_query($query, $conectar) or die ("Não foi possivel excluir dados de batismo!");
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
                       if (document.f1['batnascto'].value == ''){
                          alert('Informe a data de pesquisa!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Alterações de Dados do Batizado por Data de Nascimento</h3>
            <br>
            <form method=\"post\" action=\"alterar_batizado_data.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">

                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                         <tr>
                             <td><b>Datade Nascimento:</b></td>
                             <td><input type=\"text\" name=\"batnascto\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\"></td>
                         </tr>

                         <tr>
                             <td>
                                 <input type=\"submit\" name=\"pesquisa\" value=\"Pesquisar\" class=\"botao_ok\">
                             </td>
                         </tr>
                  </table>
     ";
     
     if (isset($_POST["pesquisa"])) {
        $batnascto = converte_data($_POST["batnascto"]);
        $consulta = "select codbatismo, batnumero,batnome, batmae, batlocal from batismo where batnascto = '$batnascto'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de batismo!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"600\">
              <tr>
                  <td bgcolor=\"#C0C0C0\"><b>Batizado</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Mãe</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Local</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Ação</b></td>

              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codbatismo = $linha["codbatismo"];
                  $batnumero = $linha["batnumero"];
                  $batnome = $linha["batnome"];
                  $batmae = $linha["batmae"];
                  $batlocal = $linha["batlocal"];
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\">$batnome</td>
                      <td bgcolor=\"#ffffff\">$batmae</td>
                      <td bgcolor=\"#ffffff\">$batlocal</td>
                      <td bgcolor=\"#ffffff\" align=\"center\">
                          <a href=\"alterar_batizado_data.php?acao=editar&codbatismo=$codbatismo\" target=\"_self\" title=\"Clique aqui para alterar dados de batismo\"><img src=\"img/icn_editar.gif\" width=\"16\" height=\"14\" border=\"0\"></a>
                          &nbsp;&nbsp;&nbsp;
			              <input type=\"button\" value=\"Excluir\" class=\"botao_ok\" onclick=\"if (confirm('Tem certeza que deseja excluir?')){ window.location.href='alterar_batizado_data.php?acao=excluir&codbatismo=$codbatismo';}\">
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
