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
                     <li><a href=\"consulta_romarias.php\" title=\"Clique aqui para consultar todas as pessoas cadastradas!\">Consulta a todas as romarias</a></li>
                 </ul>
            </div>
            <br>
            <br>
            <h4>Consulta Simples de Romaria</h4>
            <form method=\"post\" action=\"consulta.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">
                  <input type=\"hidden\" name=\"cod_pessoa\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">
                         <tr>
                             <td>
                                 <b>Fretante:</b>
                             </td>
                             <td>
                                 <input type=\"text\" name=\"fretante\" size=\"30\" maxlength=\"50\" class=\"field_textbox\">
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
        $nome_fretante = $_POST["fretante"];
        $consulta = "select * from tab_romaria where fretante like '%$fretante%'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de fretante!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"600\">
              <tr>
                  <td bgcolor=\"#C0C0C0\"><b>Fretante</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Cidade</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Estado</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Paroquia</b></td>
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $cod_romaria = $linha["cod_romaria"];
                  $fretante = $linha["fretante"];
                  $cidade = $linha["cidade"];
                  $estado = $linha["estado"];
                  $paroquias = $linha["paroquias"];
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\">$fretante</td>
                      <td bgcolor=\"#ffffff\">$cidade</td>
                      <td bgcolor=\"#ffffff\">$estado</td>
                      <td bgcolor=\"#ffffff\">$paroquias</td>
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
