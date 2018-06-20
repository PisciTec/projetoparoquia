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
            <h3>Tela de Consulta de Dados do Contrato</h3>
            <br>
            <form method=\"post\" action=\"pre_consulta_contrato.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">

                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">
                         <tr>
                             <td><b>Opção:</b></td>
                             <td>
                                 <select size=\"1\" name=\"opcao\" class=\"field_listbox\">
                                         <option>Selecione</option>
                                         <option value=\"quadra\">Quadra</option>
					 <option value=\"contrato\">Contrato</option>
                                         <option value=\"ala\">Ala</option>
                                         <option value=\"sepultura\">Sepultura</option>
                                         <option value=\"titular\">Titular</option>
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
        
        if ($opcao == "titular") {
             $consulta = "select contrato, quadra, ala, sepultura, titular from cemiterio_contrato where $opcao like '%$opcao_nome%'";
        }
        else {
             $consulta = "select contrato, quadra, ala, sepultura, titular from cemiterio_contrato where $opcao = '$opcao_nome'";
        }
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de contrato!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"600\">
              <tr>
                  <td bgcolor=\"#C0C0C0\"><b>Contrato</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Quadra</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Ala</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Sepultura</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Titular</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Ação</b></td>
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $contrato = $linha["contrato"];
                  $quadra = $linha["quadra"];
                  $ala = $linha["ala"];
                  $sepultura = $linha["sepultura"];
                  $titular = $linha["titular"];
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\">$contrato</td>
                      <td bgcolor=\"#ffffff\">$quadra</td>
                      <td bgcolor=\"#ffffff\">$ala</td>
                      <td bgcolor=\"#ffffff\">$sepultura</td>
                      <td bgcolor=\"#ffffff\">$titular</td>
                      <td bgcolor=\"#ffffff\" align=\"center\">
                          <a href=\"dados_contrato.php?contrato=$contrato\" target=\"_self\" class=\"a1\" title=\"Clique aqui para alterar dados do contrato\">Detalhar</a><br>
			  <a href=\"contrato_cemiterio.php?contrato=$contrato\" target=\"_blank\" class=\"a1\" title=\"Clique aqui para imprimir contrato\">Contrato</a>
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
