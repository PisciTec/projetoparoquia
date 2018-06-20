<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['mes'].value == ''){
                          alert('Informe mes de pesquisa!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";
    
    echo "
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Consulta por data de nascimento</h3>
            <br>
            <b>Pesquisa por data</b>
            <br>
            <form method=\"post\" action=\"consulta_data_nascimento.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         <tr>
                             <td class=\"td1\">
                                 <b>Data nascimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"nascto\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td2\" colspan=\"2\">
                                 <input type=\"submit\" value=\"Consultar\" name=\"consulta\" class=\"botao_ok\">
                             </td>
                         </tr>
                   </table>
            </form>
            <br>
    ";
      if (isset($_POST["consulta"]) and ($_POST["consulta"])) {

        $nascto = converte_data($_POST["nascto"]);

        $consulta = "select codigo, nome, mae, nascto, endereco from dizimo where (nascto = '$nascto') and (motivo = '1') order by nascto asc";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <br>
        Click na impressora para gerar relatório <a href=\"relatorio_data_nascimento.php?data=$nascto\" target=\"_blank\"><img src=\"img/impressora.gif\" width=\"40\" height=\"30\" border=\"0\"></a>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\" width=\"40%\"><b>Nome Pessoa</b></td>
                  <td class=\"td3\" width=\"40%\"><b>Mãe</b></td>
                  <td class=\"td3\" width=\"20%\"><b>Dia aniversário</b></td>
              </tr>
        </table>
        <div id=\"scroll\">
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"590\" class=\"tabela_formatada\">
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["codigo"];
                  $nome = $linha["nome"];
                  $mae = $linha["mae"];
                  $endereco = $linha["nascto"];
                  $dado = explode("-",$endereco);
                  $dia = $dado[2];
                  echo "
                  <tr>
                      <td class=\"td2\" width=\"40%\">$nome</td>
                      <td class=\"td2\" width=\"40%\">$mae</td>
                      <td bgcolor=\"#ffffff\" width=\"20%\" align=\"center\">$dia</td>
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
