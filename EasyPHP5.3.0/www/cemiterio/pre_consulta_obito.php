<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco

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
            <h3>Tela de Consulta de Dados de Óbito</h3>
            <br>
            <form method=\"post\" action=\"pre_consulta_obito.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">

                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">
                         <tr>
                             <td><b>Opção:</b></td>
                             <td>
                                 <select size=\"1\" name=\"opcao\" class=\"field_listbox\">
                                         <option>Selecione</option>
                                         <option value=\"oblivro\">Livro</option>
                                         <option value=\"obfolha\">Folha</option>
                                         <option value=\"obnumero\">Número</option>
                                         <option value=\"obnome\">Nome</option>
                                         <option value=\"obpai\">Pai</option>
                                         <option value=\"obmae\">Mãe</option>
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
        
        if ($opcao == "obnome" || $opcao == "obpai" || $opcao == "obmae") {
             $consulta = "select cod_obito, oblivro, obfolha, obnumero, obnome, obdata, obparoquia from cemiterio_obitos where $opcao like '%$opcao_nome%'";
        }
        else {
             $consulta = "select cod_obito, oblivro, obfolha, obnumero, obnome, obdata, obparoquia from cemiterio_obitos where $opcao = '$opcao_nome'";
        }
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de óbitos!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"600\">
              <tr>
                  <td bgcolor=\"#C0C0C0\"><b>Livro</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Folha</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Número</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Nome</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Data</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Ação</b></td>
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $cod_obito = $linha["cod_obito"];
                  $livro = $linha["oblivro"];
                  $folha = $linha["obfolha"];
                  $numero = $linha["obnumero"];
                  $nome = $linha["obnome"];
                  $data = converte_data($linha["obdata"]);
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\">$livro</td>
                      <td bgcolor=\"#ffffff\">$folha</td>
                      <td bgcolor=\"#ffffff\">$numero</td>
                      <td bgcolor=\"#ffffff\">$nome</td>
                      <td bgcolor=\"#ffffff\">$data</td>
                      <td bgcolor=\"#ffffff\" align=\"center\">
                          <a href=\"dados_obito.php?cod_obito=$cod_obito\" target=\"_self\" class=\"a1\" title=\"Clique aqui para consultar dados do óbito\">Detalhar</a><br>
		 	              <a href=\"certidao_obito.php?cod_obito=$cod_obito\" target=\"_blank\" class=\"a1\" title=\"Clique aqui para gerar a certidão de óbito\">Imprimir Certidão</a><br>
						  <a href=\"guia_sepultamento.php?cod_obito=$cod_obito\" target=\"_blank\" class=\"a1\" title=\"Clique aqui para gerar a guia de sepultamento\">Gerar Guia</a><br>
						  <a href=\"guia_sepultamento_segunda_via.php?cod_obito=$cod_obito\" target=\"_blank\" class=\"a1\" title=\"Clique aqui para gerar a 2 via da guia de sepultamento\">2ª via da Guia</a>
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
