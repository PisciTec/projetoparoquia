<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
     if (isset($_POST["cod_pessoa"])) {
        $cod_pessoa = $_POST["cod_pessoa"];
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
                     <li><a href=\"consulta_clientes.php\" title=\"Clique aqui para consultar todas os clientes cadastrados!\">Consulta Total de Clientes</a></li>
                     <li><a href=\"consulta_aniversariantes_mes.php\" title=\"Clique aqui para consultar os aniversariantes do mês!\">Aniversariantes por mês</a></li>
                 </ul>
            </div>
            <br>
            <br>
            <h4>Consulta Simples de Cliente</h4>
            <form method=\"post\" action=\"consulta.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">

                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">
                         <tr>
                             <td>
                                 <b>Nome Cliente:</b>
                             </td>
                             <td>
                                 <input type=\"text\" name=\"nome\" size=\"30\" maxlength=\"40\" class=\"field_textbox\">
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
        $consulta = "select * from jornal_cliente where nome like '%$nome%'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta do cliente!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"600\">
              <tr>
                  <td bgcolor=\"#C0C0C0\"><b>Nome Cliente</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>CPF</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>RG</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Ação</b></td>
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codcliente = $linha["CODCLIENTE"];
                  $nome = $linha["NOME"];
                  $cgccpf = $linha["CGCCPF"];
                  $cgfrg = $linha["CGFRG"];
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\">$nome</td>
                      <td bgcolor=\"#ffffff\">$cgccpf</td>
                      <td bgcolor=\"#ffffff\">$cgfrg</td>
                      <td bgcolor=\"#ffffff\" align=\"center\">
                          <a href=\"javascript:onclick=abreConsulta('consulta_dados_cliente.php?codcliente=$codcliente');\" target=\"_self\" title=\"Clique aqui para consultar dados do cliente\"><img src=\"img/icn_filtrar.gif\" width=\"16\" height=\"14\" border=\"0\"></a>
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
