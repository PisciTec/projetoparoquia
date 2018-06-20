<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco

    if ($_GET["acao"] == "editar") {
          $codcasamento = $_GET["codcasamento"];
          echo "
               <script language=\"JavaScript\">
                       janela = window.open(\"alterar_dados_casamento.php?codcasamento=$codcasamento\", \"\", \"height=510, width=600, status, scroll=yes\");
               </script>
          ";
    }
    
    if ($_GET["acao"] == "excluir") {
          $codcasamento = $_GET["codcasamento"];
          $query = "delete from casamen where codcasamento = '$codcasamento'";
          mysql_query($query, $conectar) or die ("Não foi possivel excluir dados de casamento!");
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
                       if (document.f1['opcao_nome'].value == ''){
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
            <h3>Alterações de Dados do Casamento</h3>
            <br>
            <form method=\"post\" action=\"alterar.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">

                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">
                         <tr>
                             <td><b>Opção:</b></td>
                             <td>
                                 <select size=\"1\" name=\"opcao\" class=\"field_listbox\">
                                         <option>Selecione</option>
                                         <option value=\"casnomee\">Noivo</option>
                                         <option value=\"casnomea\">Noiva</option>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td><b>Valor:</b></td>
                             <td>
                                 <input type=\"text\" name=\"opcao_nome\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td>
                                 <input type=\"submit\" name=\"pesquisa\" value=\"Pesquisar\" class=\"botao_ok\">
                             </td>
                         </tr>
                  </table>
     ";
     
     if (isset($_POST["pesquisa"])) {
        $opcao = $_POST["opcao"];
        $opcao_nome = $_POST["opcao_nome"];
        $consulta = "select codcasamento, casnumero,casnomee, casnomea, caslocal from casamen where $opcao like '%$opcao_nome%'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"600\">
              <tr>
                  <td bgcolor=\"#C0C0C0\"><b>Noivo</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Noiva</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Local</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Ação</b></td>

              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codcasamento = $linha["codcasamento"];
                  $casnumero = $linha["casnumero"];
                  $casnomee = $linha["casnomee"];
                  $casnomea = $linha["casnomea"];
                  $caslocal = $linha["caslocal"];
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\">$casnomee</td>
                      <td bgcolor=\"#ffffff\">$casnomea</td>
                      <td bgcolor=\"#ffffff\">$caslocal</td>
                      <td bgcolor=\"#ffffff\" align=\"center\">
                          <a href=\"alterar.php?acao=editar&codcasamento=$codcasamento\" target=\"_self\" title=\"Clique aqui para alterar dados de pessoa\"><img src=\"img/icn_editar.gif\" width=\"16\" height=\"14\" border=\"0\"></a>
                          &nbsp;&nbsp;&nbsp;
                          <input type=\"button\" value=\"Excluir\" class=\"botao_ok\" onclick=\"if (confirm('Tem certeza que deseja excluir?')){ window.location.href='alterar.php?acao=excluir&codcasamento=$codcasamento';}\">
			  
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
