<?php
    include "cabecalho.inc";
    include "menu.inc";
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Tela de Relatórios de Dados</h3>
            <br>
            <br>
            <div id=\"mensagem_inicial\">
                  <b>Dica:</b> Clique nos botões abaixo para acessar a tela de cadastro que deseja!
            </div>
            <br>
            <div id=\"navegacao\">
                 <ul>
                     <li><a href=\"gerar_etiqueta_pdf.php\" title=\"Clique aqui para etiquetas dos dizimistas!\" target=\"_blank\">Gerar etiquetas</a></li>
                 </ul>
            </div>
            <br>
            <br>
            <h3>Gerar etiquetas personalizadas</h3>
            <form method=\"post\" action=\"relatorio.php\">
            <label>Mês:</label>
            <select name=\"mes\">
                    <option>Selecione</option>
                    <option value=\"01\">Janeiro</option>
                    <option value=\"02\">Fevereiro</option>
                    <option value=\"03\">Março</option>
                    <option value=\"04\">Abril</option>
                    <option value=\"05\">Maio</option>
                    <option value=\"06\">Junho</option>
                    <option value=\"07\">Julho</option>
                    <option value=\"08\">Agosto</option>
                    <option value=\"09\">Setembro</option>
                    <option value=\"10\">Outubro</option>
                    <option value=\"11\">Novembro</option>
                    <option value=\"12\">Dezembro</option>
            </select>
            <br>
            <input type=\"submit\" name=\"consulta\" value=\"Gerar\">
            </form>
    ";
    
      if (isset($_POST["consulta"]) and ($_POST["consulta"])){

         echo "
         <a href=\"gerar_etiqueta_casamento_pdf.php?mes=$_POST[mes]\" target=\"_blank\" class=\"a1\">Etiquetas de aniversário de casamento</a>
         &nbsp;&nbsp;
         <a href=\"gerar_etiqueta_aniversariantes_pdf.php?mes=$_POST[mes]\" target=\"_blank\" class=\"a1\">Etiquetas de aniversário</a>
         ";
      }
      echo "
        </td>
    </tr>";
    include "rodape.inc";
?>
