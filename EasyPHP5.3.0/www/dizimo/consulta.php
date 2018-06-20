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
                     <li><a href=\"consulta_pessoas.php\" title=\"Clique aqui para consultar todas as pessoas cadastradas!\">Total Dizimistas</a></li>
                     <li><a href=\"consulta_aniversariantes_casamento.php\" title=\"Clique aqui para consultar os aniversariantes de casamento!\">Anivers. Casamento</a></li>
                     <li><a href=\"consulta_aniversariantes_mes.php\" title=\"Clique aqui para consultar os aniversariantes do mês!\">Anivers. Mês</a></li>
                     <li><a href=\"consulta_contribuicao_periodo.php\" title=\"Clique aqui para consultar as contribuições do período!\">Contribuição Período</a></li>
                     <li><a href=\"consulta_data_nascimento.php\" title=\"Clique aqui para consultar por data de nascimento!\">Data de Nascimento</a></li>
                 </ul>
            </div>
            <br>
            <div id=\"navegacao\">
                 <ul>
                     <li><a href=\"consulta_dizimistas_codigo.php\" title=\"Clique aqui para consultar dizimistas pelo código!\">Dizimistas pelo Código</a></li>
                 </ul>
            </div>
            <br>
            <br>
            <h4>Consulta Simples de pessoa</h4>
            <form method=\"post\" action=\"consulta.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">
                  <input type=\"hidden\" name=\"cod_pessoa\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">
                         <tr>
                             <td>
                                 <b>Nome Pessoa:</b>
                             </td>
                             <td>
                                 <input type=\"text\" name=\"nome\" size=\"40\" maxlength=\"80\" class=\"field_textbox\">
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
        $consulta = "select codigo, nome, mae from dizimo where nome like '%$nome%' and motivo = '1'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "

        <b>Resultados encontrado: $total</b>
        <div id=\"scroll\"
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"100%\">
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
                          <a href=\"javascript:onclick=abreConsulta('consulta_dados_pessoa.php?codigo=$codigo');\" target=\"_self\" title=\"Clique aqui para consultar dados de pessoa\"><img src=\"img/icn_filtrar.gif\" width=\"16\" height=\"14\" border=\"0\"></a><br>
                          <a href=\"relatorio_contribuicao.php?codigo=$codigo&nome=$nome\" target=\"_blank\" class=\"a1\">Contribuições</a><br>
                          <a href=\"documento_dizimo.php?codigo=$codigo&nome=$nome\" target=\"_blank\" class=\"a1\">Documento Dízimo</a>
                      </td>
                  </tr>
                  ";
          }
          echo "
        </table>
        </div>
          ";
     }
     echo "
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
