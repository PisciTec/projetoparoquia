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
                       if (document.f1['opcao'].value == ''){
                          alert('Escolha um item!');
                          return false;
                       }
                       if (document.f1['opcao_nome'].value == ''){
                          alert('Digite o termo de pesquisa!');
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
            <h3>Tela de Consulta de Dados</h3>
            <br>
            <div id=\"mensagem_inicial\">
                  <b>Dica:</b> Clique nos botões abaixo para acessar a tela de cadastro que deseja!
            </div>
            <br>
            <div id=\"navegacao\">
                 <ul>
                     <li><a href=\"consulta_casamentos.php\" title=\"Clique aqui para consultar os casamentos!\">Consulta Total de Casamentos</a></li>
                     <li><a href=\"consulta_casamento_data.php\" title=\"Clique aqui para consultar os casamentos por data!\">Casamentos por Data</a></li>
                     <li><a href=\"consulta_assinatura.php\" title=\"Clique aqui para consultar as assinaturas!\">Assinaturas</a></li>
                 </ul>
            </div>
            <br>
            <br>
            <h4>Consulta Simples de Casamento</h4>
            <form method=\"post\" action=\"consulta.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">
                  <input type=\"hidden\" name=\"\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"50%\">
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
                             <td><b>Nome:</b></td>
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
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"100%\">
              <tr>
                  <td bgcolor=\"#C0C0C0\"><b>Noivo</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Noiva</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Local</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Ação</b></td>
                  
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codcasamento=$linha["codcasamento"];
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
                          <a href=\"javascript:onclick=abreConsulta('consulta_dados_casamento.php?codcasamento=$codcasamento');\" target=\"_self\" title=\"Clique aqui para consultar dados de pessoa\"><img src=\"img/icn_filtrar.gif\" width=\"16\" height=\"14\" border=\"0\"></a>
                          <a href=\"relatorio_certidao_casamento.php?codcasamento=$codcasamento\" target=\"_blank\" title=\"Clique aqui para gerar certidão de casamento\"><img src=\"img/impressora.gif\" width=\"16\" height=\"14\" border=\"0\"></a>
                          <a href=\"relatorio_lembranca_casamento.php?codcasamento=$codcasamento\" target=\"_blank\" title=\"Clique aqui para gerar a lembrança de casamento\" class=\"a1\">Lembrança</a>
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
