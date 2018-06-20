<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['batlivro'].value == ''){
                          alert('Digite o número do livro!');
                          return false;
                       }
	if (document.form_cadastro['batfolha'].value == ''){
                          alert('Digite o número da folha!');
                          return false;
                       }
	if (document.form_cadastro['batnumero'].value == ''){
                          alert('Digite o número do batizado!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";
    
    echo "
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Consulta de Batizado por Data</h3>
            <br>
            <b>Pesquisa por mês</b>
            <br>
            <form method=\"post\" action=\"consulta_batizado_livro_folha_numero.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         <tr>
                             <td class=\"td1\">
                                 <b>Livro:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batlivro\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>
	
	    <tr>
                             <td class=\"td1\">
                                 <b>Folha:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batfolha\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>
	
	   <tr>
                             <td class=\"td1\">
                                 <b>Número:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"batnumero\" value=\"\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
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

        $batdata = converte_data($_POST["batdata"]);

        $consulta = "select codbatismo, batnumero, batlivro, batfolha, batnome, batnascto, batparoq, batlocal, batmae, batpai, batpadrin, batmadrin, batceleb, batdata from batismo where (batlivro = '$_POST[batlivro]') and (batfolha = '$_POST[batfolha]') and (batnumero = '$_POST[batnumero]') order by batnome, batmae asc";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de batizado!");
        $total = mysql_num_rows($resposta);
	$linha = mysql_fetch_array($resposta);
	$codbatismo = $linha["codbatismo"];
        $batnumero = $linha["batnumero"];
        $batlivro = $linha["batlivro"];
        $batfolha = $linha["batfolha"];
        $batnome = $linha["batnome"];
        $batnascto = converte_data($linha["batnascto"]);
        $batparoq = $linha["batparoq"];
	$batdata = converte_data($linha["batdata"]);
        $batlocal = $linha["batlocal"];
        $batmae = $linha["batmae"];
        $batpai = $linha["batpai"];
        $batpadrin = $linha["batpadrin"];
        $batmadrin = $linha["batmadrin"];
        $batceleb = $linha["batceleb"];
        echo "
	<h3>Retorno da consulta</h3>
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" width=\"600\" class=\"tabela_formatada\">
        <tr>
                  <td class=\"td3\" ><b>Livro</b></td>
       		  <td class=\"td2\" >$batlivro</td>
	</tr>
	<tr>
                  <td class=\"td3\" ><b>Folha</b></td>
                  <td class=\"td2\" >$batfolha</td>
	</tr>
	<tr>
		  <td class=\"td3\" ><b>Numero</b></td>
                  <td class=\"td2\" >$batnumero</td>
	</tr>
	<tr>
                  <td class=\"td3\" ><b>Data de Batizado</b></td>
                  <td class=\"td2\" >$batdata</td>
        </tr>
	<tr>
                  <td class=\"td3\" ><b>Local</b></td>
                  <td class=\"td2\" >$batlocal</td>
        </tr>
	<tr>
                  <td class=\"td3\" ><b>Nome</b></td>
                  <td class=\"td2\" >$batnome</td>
        </tr>
	<tr>
                  <td class=\"td3\" ><b>Data de Nascimento</b></td>
                  <td class=\"td2\" >$batnascto</td>
        </tr>
	<tr>
                  <td class=\"td3\" ><b>Paróquia</b></td>
                  <td class=\"td2\" >$batparoq</td>
	</tr>
	<tr>
                  <td class=\"td3\" ><b>Pai</b></td>
                  <td class=\"td2\" >$batpai</td>
	</tr>
        <tr>
                  <td class=\"td3\" ><b>Mãe</b></td>
                  <td class=\"td2\" >$batmae</td>
        </tr>
        <tr>
                  <td class=\"td3\" ><b>Padrinho</b></td>
                  <td class=\"td2\" >$batpadrin</td>
        </tr>
        <tr>
                  <td class=\"td3\" ><b>Madrinha</b></td>
                  <td class=\"td2\" >$batmadrin</td>
        </tr>
        <tr>
                  <td class=\"td3\" ><b>Celebrante</b></td>
                  <td class=\"td2\" >$batceleb</td>
			
              </tr>
        </table>
        ";
        }
        echo "
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
