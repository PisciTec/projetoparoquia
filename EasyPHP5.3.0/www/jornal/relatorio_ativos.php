<?php
    include "abreconexao.php";
    
    echo "
         <h3>Relat�rio de Clientes Ativos</h3>
    ";
        $consulta = "select codcliente, nome, endereco, cep from jornal_cliente where ativo='1'";
        $resposta = mysql_query($consulta, $conectar) or die ("N�o foi poss�vel realizar a consulta de cliente!");
        $total = mysql_num_rows($resposta);
        echo "
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"600\" bgcolor=\"#000000\">
               <tr>
                   <th bgcolor=\"#c0c0c0\">Cod.</th>
                   <th bgcolor=\"#c0c0c0\">Nome Cliente</th>
                   <th bgcolor=\"#c0c0c0\">Endere�o</th>
                   <th bgcolor=\"#c0c0c0\">CEP</th>
               </tr>
        ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codigo = $linha["codcliente"];
                  $nome = $linha["nome"];
                  $endereco = $linha["endereco"];
                  $cep = $linha["cep"];
                  echo "
                  <tr>
                      <td bgcolor=\"#ffffff\">$codigo</td>
                      <td bgcolor=\"#ffffff\">$nome</td>
                      <td bgcolor=\"#ffffff\">$endereco</td>
                      <td bgcolor=\"#ffffff\">$cep</td>
                  </tr>
                  ";
          }
          echo "
        </table>
    ";
?>
