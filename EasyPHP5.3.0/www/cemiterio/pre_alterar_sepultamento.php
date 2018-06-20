<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco

    if ($_GET["acao"] == "excluir") {
          $cod_sepultamento = $_GET["cod_sepultamento"];
          $query = "delete from cemiterio_sepultamento where cod_sepultamento = '$cod_sepultamento'";
          mysql_query($query, $conectar) or die ("Não foi possivel excluir dados do sepultamento!");
          echo "
               <script language=\"JavaScript\">
                       alert('Dados excluídos com sucesso!');
               </script>
          ";
    }

    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.f1['opcao_nome'].value == ''){
                          alert('Informe o valor que deseja alterar!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Tela de Alteração de Dados de Sepultamento</h3>
            <br>
            <form method=\"post\" action=\"pre_alterar_sepultamento.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">

                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">
                         <tr>
                             <td><b>Opção:</b></td>
                             <td>
                                 <select size=\"1\" name=\"opcao\" class=\"field_listbox\">
                                         <option>Selecione</option>
                                         <option value=\"quadra\">Quadra</option>
                                         <option value=\"ala\">Ala</option>
                                         <option value=\"sepultura\">Sepultura</option>
                                         <option value=\"nome\">Nome</option>
                                         <option value=\"contrato\">Contrato</option>
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
        
        if ($opcao == "nome") {
             $consulta = "select cod_sepultamento, contrato, quadra, ala, sepultura, nome, data_sepultamento from cemiterio_sepultamento where $opcao like '%$opcao_nome%'";
        }
        else {
             $consulta = "select cod_sepultamento, contrato, quadra, ala, sepultura, nome, data_sepultamento from cemiterio_sepultamento where $opcao = '$opcao_nome'";
        }
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de sepultamento!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"600\">
              <tr>
                  <td bgcolor=\"#C0C0C0\"><b>Contrato</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Quadra</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Ala</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Sepultura</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Nome</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Ação</b></td>
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $cod_sepultamento = $linha["cod_sepultamento"];
                  $contrato = $linha["contrato"];
                  $quadra = $linha["quadra"];
                  $ala = $linha["ala"];
                  $sepultura = $linha["sepultura"];
                  $nome = $linha["nome"];
                  $data_sepultamento = converte_data($linha["data_sepultamento"]);
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\">$contrato</td>
                      <td bgcolor=\"#ffffff\">$quadra</td>
                      <td bgcolor=\"#ffffff\">$ala</td>
                      <td bgcolor=\"#ffffff\">$sepultura</td>
                      <td bgcolor=\"#ffffff\">$nome</td>
                      <td bgcolor=\"#ffffff\" align=\"center\">
                          <a href=\"alterar_dados_sepultamento.php?cod_sepultamento=$cod_sepultamento\" target=\"_self\" title=\"Clique aqui para alterar dados do contrato\"><img src=\"img/icn_editar.gif\" width=\"16\" height=\"14\" border=\"0\"></a>
                          &nbsp;&nbsp;&nbsp;
                          <a href=\"pre_alterar_sepultamento.php?acao=excluir&cod_sepultamento=$cod_sepultamento\" target=\"_self\" title=\"Clique aqui para excluir dados do sepultamento\"><img src=\"img/icn_excluir.gif\" width=\"16\" height=\"14\" border=\"0\"></a>
                          <input type=\"button\" value=\"Excluir\" class=\"botao_ok\" onclick=\"if (confirm('Tem certeza que deseja excluir?')){ window.location.href='pre_alterar_sepultamento.php?acao=excluir&cod_sepultamento=$cod_sepultamento';}\">
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
