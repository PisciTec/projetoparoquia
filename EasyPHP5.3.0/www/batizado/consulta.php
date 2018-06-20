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
            <h3>Tela de Consulta de Dados</h3>
            <br>
            <div id=\"mensagem_inicial\">
                  <b>Dica:</b> Clique nos botões abaixo para acessar a tela de cadastro que deseja!
            </div>
            <br>
            <div id=\"navegacao\">
                 <ul>
                     <li><a href=\"consulta_batizado.php\" title=\"Clique aqui para consultar os batizados!\">Consulta Total de Batizados</a></li>
                     <li><a href=\"consulta_batizado_data.php\" title=\"Clique aqui para consultar os batizados por data!\">Batizados por Data</a></li>
                     <li><a href=\"consulta_batizado_data_nascimento.php\" title=\"Clique aqui para consultar os batizados por data de nascimento!\">Batizados por Data de Nascimento</a></li>
                 </ul>
            </div>
            <br>
	        <div id=\"navegacao\">
                 <ul>                
                     <li><a href=\"consulta_batizado_livro_folha_numero.php\" title=\"Clique aqui para consultar o batizado por livro, folha e número!\">Batizados por Livro, Folha e Número</a></li>
                     <li><a href=\"consulta_assinatura.php\" title=\"Clique aqui para consultar as assinaturas!\">Assinaturas</a></li>
		             <li><a href=\"gerar_certidao_negativa.php\" target=\"_blank\" title=\"Clique aqui para gerar uma certidão negativa!\">Certidão Negativa</a></li>
                 </ul>
            </div>
            <br>
            <br>
            <h4>Consulta Simples de Batizado</h4>
            <form method=\"post\" action=\"consulta.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">
                  <input type=\"hidden\" name=\"\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"50%\">
                         <tr>
                             <td><b>Opção:</b></td>
                             <td>
                                 <select size=\"1\" name=\"opcao\" class=\"field_listbox\">
                                         <option>Selecione</option>
                                         <option value=\"batnome\">Nome do Batizado</option>
                                         <option value=\"batmae\">Mãe</option>
                                         <option value=\"batpai\">Pai</option>
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
        $consulta = "select codbatismo, batnumero,batnome, batpai, batmae from batismo where $opcao like '%$opcao_nome%'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de batizado!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"600\">
              <tr>
                  <td bgcolor=\"#C0C0C0\"><b>Batizado</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Pai</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Mãe</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Ação</b></td>
                  
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codbatismo = $linha["codbatismo"];
                  $batnumero = $linha["batnumero"];
                  $batnome = $linha["batnome"];
                  $batpai = $linha["batpai"];
                  $batmae = $linha["batmae"];
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\">$batnome</td>
                      <td bgcolor=\"#ffffff\">$batpai</td>
                      <td bgcolor=\"#ffffff\">$batmae</td>
                      <td bgcolor=\"#ffffff\" align=\"center\">
                          <a href=\"javascript:onclick=abreConsulta('consulta_dados_batizado.php?codbatismo=$codbatismo');\" target=\"_self\" title=\"Clique aqui para consultar dados do batizado\"><img src=\"img/icn_filtrar.gif\" width=\"16\" height=\"14\" border=\"0\"></a>
                          <a href=\"relatorio_certidao_batizado.php?codbatismo=$codbatismo\" target=\"_blank\" title=\"Clique aqui para gerar certidão de batismo\"><img src=\"img/impressora.gif\" width=\"16\" height=\"14\" border=\"0\"></a>
                          <a href=\"relatorio_lembranca_batizado.php?codbatismo=$codbatismo\" target=\"_blank\" title=\"Clique aqui para gerar certidão de batismo\" class=\"a1\">Lembrança</a>
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
