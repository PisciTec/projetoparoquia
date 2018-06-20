<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Pesquisa por Período de Óbito</h3>
            <br>
            <form method=\"post\" action=\"consulta_periodo_obito.php\">

                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">
                         <tr>
                             <td><b>Data Início</b></td>
                             <td>
                                 <input type=\"text\" name=\"data_inicio\" size=\"11\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>

			<tr>
                             <td><b>Data final:</b></td>
                             <td>
                                 <input type=\"text\" name=\"data_final\" size=\"11\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
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
	$data_inicio = converte_data($_POST["data_inicio"]); 
	$data_final = converte_data($_POST["data_final"]);       
        $consulta = "select cod_obito, oblivro, obfolha, obnumero, obnome, obdata, obparoquia from cemiterio_obitos where obdata between '$data_inicio' and '$data_final'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de óbitos!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"600\">
              <tr>
                  <td bgcolor=\"#C0C0C0\"><b>Livro</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Folha</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Número</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Nome</b></td>
                  <td bgcolor=\"#C0C0C0\"><b>Data</b></td>                  
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $cod_obito = $linha["cod_obito"];
                  $livro = $linha["oblivro"];
                  $folha = $linha["obfolha"];
                  $numero = $linha["obnumero"];
                  $nome = $linha["obnome"];
                  $data = converte_data($linha["obdata"]);
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\">$livro</td>
                      <td bgcolor=\"#ffffff\">$folha</td>
                      <td bgcolor=\"#ffffff\">$numero</td>
                      <td bgcolor=\"#ffffff\">$nome</td>
                      <td bgcolor=\"#ffffff\">$data</td>                      
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
