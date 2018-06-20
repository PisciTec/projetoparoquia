<?php
    include "abreconexao.php";
    echo"
    <html>
          <head>
                <title>CONTROLE DE DÍZIMO</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <script language=\"JavaScript\" src=\"js/funcao_mascara.js\" type=\"text/javascript\"></script>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
                
                <script language=\"JavaScript\">
                         function enviaDados(dados, codigo) {
                                  var nome_pessoa = dados;
                                  var cod_pessoa = codigo;
                                  opener.document.f1.nome_dizimista.value = nome_pessoa;
                                  opener.document.f1.cod_pessoa.value = cod_pessoa;
                                  opener.focus();
                                  close();
                         }
                </script>
                
          </head>

          <body>
                <table width=\"600\" height=\"400\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                       <tr>
                           <td bordercolor=\"#CCCCCC\" height=\"78\">
                               <h3>Busca Nome de Dizimistas</h3>
                           </td>
                       </tr>

                       <tr>
                           <td valign=\"top\" align=\"center\">
                               ";
                                    if (isset($_POST["consulta"])) {
                                       $nome_pessoa = $_POST["nome_pessoa"];
                                       $consulta = "select cod_pessoa, nome_pessoa, cpf, rg from tab_pessoa where nome_pessoa like '%$nome_pessoa%' and status_habilitado = '0'";
                                       $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
                                       $total = mysql_num_rows($resposta);
                                       echo "
                                       <b>Resultados encontrado: $total</b>
                                       <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"600\">
                                              <tr>
                                              <td bgcolor=\"#C0C0C0\"><b>Nome Pessoa</b></td>
                                              <td bgcolor=\"#C0C0C0\"><b>CPF</b></td>
                                              <td bgcolor=\"#C0C0C0\"><b>RG</b></td>
                                              <td bgcolor=\"#C0C0C0\"><b>Ação</b></td>
                                       </tr>
                                       ";
                                       while ($linha = mysql_fetch_array($resposta)) {
                                             $cod_pessoa = $linha["cod_pessoa"];
                                             $nome_pessoa = $linha["nome_pessoa"];
                                             $cpf = $linha["cpf"];
                                             $rg = $linha["rg"];
                                             echo "
                                             <tr>
                                                 <td bgcolor=\"#ffffff\">$nome_pessoa</td>
                                                 <td bgcolor=\"#ffffff\">$cpf</td>
                                                 <td bgcolor=\"#ffffff\">$rg</td>
                                                 <td bgcolor=\"#ffffff\">
                                                           <input type=\"button\" value=\"Enviar\" class=\"botao_ok\" onclick=\"enviaDados('$nome_pessoa', '$cod_pessoa');\">
                                                 </td>
                                             </tr>
                                             ";
                                       }
                                       echo "
                                       </table>
                                       ";
                                    }
                               echo "
                               <form method=\"POST\" action=\"busca_nome.php\" name=\"f2\">
                               <br>
                               <b>Digite o nome:</b> <input type=\"text\" name=\"nome_pessoa\" size=\"40\" maxlength=\"80\" class=\"field_textbox\">
                               <input type=\"submit\" name=\"consulta\" value=\"Buscar\" class=\"botao_ok\">
                               </form>
                           </td>
                       </tr>
                </table>
             </body>
    </html>
    ";
?>
