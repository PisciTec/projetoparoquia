<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Fun��o para validar formulario e verificar se esta entrando com dados em branco
     $cod_pessoa = $_POST["cod_pessoa"];
     echo "
           <script language=\"JavaScript\">
                 function validaFormulario() {
                       if (document.f1['codigo'].value == ''){
                          alert('Informe o c�digo do dizimista!');
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
            <h3>Consulta pelo C�digo do Dizimista</h3>
            <form method=\"post\" action=\"consulta_dizimistas_codigo.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                         <tr>
                             <td>
                                 <b>C�digo:</b>
                             </td>
                             <td>
                                 <input type=\"text\" name=\"codigo\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
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
        $codigo = $_POST["codigo"];
        $consulta = "select codigo, nome, mae from dizimo where codigo = '$codigo' and motivo = '1'";
        $resposta = mysql_query($consulta, $conectar) or die ("N�o foi poss�vel realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "

        <b>Resultados encontrado: $total</b>
        <div id=\"scroll\"
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"100%\">
              <tr>
                  <td bgcolor=\"#C0C0C0\"><b>Nome Pessoa</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>M�e</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>A��o</b></td>
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
                          <a href=\"relatorio_contribuicao.php?codigo=$codigo&nome=$nome\" target=\"_blank\" class=\"a1\">Contribui��es</a><br>
                          <a href=\"documento_dizimo.php?codigo=$codigo&nome=$nome\" target=\"_blank\" class=\"a1\">Documento D�zimo</a>
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
