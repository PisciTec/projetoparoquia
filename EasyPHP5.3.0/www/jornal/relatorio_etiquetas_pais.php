<?php
    include "abreconexao.php";
    include "cabecalho.inc";
    include "menu.inc";
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Gerar Etiquetas por Pa�s</h3>
            <form method=\"post\" action=\"relatorio_etiquetas_pais.php\">
                  <label>Pa�s:</label>
                  <select name=\"pais\">
                  <option value=\"\">Selecione</option>
                  ";
                  $consulta="select * from jornal_pais order by descricao asc";
                  $resposta=mysql_query($consulta) or die ("N�o foi poss�vel realizar consulta de pa�s");
                  while ($linha=mysql_fetch_array($resposta)){
                        echo "<option value=\"$linha[CODIGO]\">$linha[DESCRICAO]</option>";
                  }
                  echo "
                  </select>
                  <br>
                  <input type=\"submit\" name=\"gerar\" value=\"Gerar Etiquetas\">
            </form>
            ";
            if (isset($_POST["gerar"])){
               echo "<a href=\"gerar_etiqueta_pais.php?pais=$_POST[pais]\" target=\"_blank\" class=\"a1\">Gerar Etiqueta</a>";
            }
            echo "
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
