<?php
    include "abreconexao.php";
    include "cabecalho.inc";
    include "menu.inc";
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Gerar Etiquetas por Estado</h3>
            <form method=\"post\" action=\"relatorio_etiquetas_estado.php\">
                  <label>Estado:</label>
                  <select name=\"estado\">
                  <option value=\"\">Selecione</option>
                  ";
                  $consulta="select distinct(ciduf) as estado from jornal_cidade order by ciduf asc";
                  $resposta=mysql_query($consulta) or die ("Não foi possível realizar consulta de cidades");
                  while ($linha=mysql_fetch_array($resposta)){
                        echo "<option value=\"$linha[estado]\">$linha[estado]</option>";
                  }
                  echo "
                  </select>
                  <br>
                  <input type=\"submit\" name=\"gerar\" value=\"Gerar Etiquetas\">
            </form>
            ";
            if (isset($_POST["gerar"])){
               echo "<a href=\"gerar_etiqueta_estado.php?estado=$_POST[estado]\" target=\"_blank\" class=\"a1\">Gerar Etiqueta</a>";
            }
            echo "
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
