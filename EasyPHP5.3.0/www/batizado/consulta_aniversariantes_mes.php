<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Fun��o para validar formulario e verificar se esta entrando com dados em branco
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
            <h3>Consulta de Aniversariantes por M�s</h3>
            <br>
            <b>Pesquisa por m�s</b>
            <br>
            <form method=\"post\" action=\"consulta_aniversariantes_mes.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         <tr>
                             <td class=\"td1\">
                                 <b>M�s de pesquisa(mm):</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"mes\" size=\"2\" maxlength=\"2\" class=\"field_textbox\">
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

        $mes = "_____".$_POST[mes]."___";

        $consulta = "select cod_pessoa_jornal, nome_pessoa, cpf, rg, data_nascimento from tab_pessoa_jornal where (data_nascimento like '$mes') and (ativo = '1') and (excluido='0') order by data_nascimento asc";
        $resposta = mysql_query($consulta, $conectar) or die ("N�o foi poss�vel realizar a consulta de pessoa!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"tabela_formatada\">
              <tr>
                  <td class=\"td3\" width=\"10%\"><b>Cod.</b></td>
                  <td class=\"td3\" width=\"40%\"><b>Nome Pessoa</b></td>
                  <td class=\"td3\" width=\"15%\"><b>CPF</b></td>
                  <td class=\"td3\" width=\"15%\"><b>RG</b></td>
                  <td class=\"td3\" width=\"20%\"><b>Dia anivers�rio</b></td>
              </tr>
        </table>
        <div id=\"scroll\">
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"590\" class=\"tabela_formatada\">
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["cod_pessoa_jornal"];
                  $nome = $linha["nome_pessoa"];
                  $cpf = $linha["cpf"];
                  $rg = $linha["rg"];
                  $data_nasc = $linha["data_nascimento"];
                  $dado = explode("-",$data_nasc);
                  $dia = $dado[2];
                  echo "
                  <tr>
                      <td class=\"td2\" width=\"10%\">$codigo</td>
                      <td class=\"td2\" width=\"40%\">$nome</td>
                      <td class=\"td2\" width=\"15%\">$cpf</td>
                      <td class=\"td2\" width=\"15%\">$rg</td>
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
