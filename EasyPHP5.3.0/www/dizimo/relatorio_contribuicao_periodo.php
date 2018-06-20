<?php
    include "abreconexao.php";
    include "funcoes.inc";

        $data_inicial = $_GET["data_inicial"];
        $data_final = $_GET["data_final"];
        $data_formatada_inicial = converte_data($data_inicial);
        $data_formatada_final = converte_data($data_final);
        $consulta = "select sum(valor) as valor from contrib where data between '$data_inicial' AND '$data_final'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de valores!");
        $linha = mysql_fetch_array($resposta);
        $valor = number_format($linha["valor"], 2, ',', '.');
        echo "
            <html>
            <head>
                  <title>CONTROLE DE DÍZIMO</title>
                  <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
            </head>
            <body>
            <h3>Relatório Resumo de Arrecadação</h3>
            <br>
             <h4>Resumo de arrecadação</h4>
             <b>Período pesquisado:</b> $data_formatada_inicial à $data_formatada_final<br>
             Valor arrecado no período foi de <b>".$valor."</b> reais
             <br>
             <h3>Lista de Contribuições</h3>
             ";
	     $consulta = "select b.nome as nome, a.data as data, a.valor as valor from contrib a inner join dizimo b where a.codigo = b.codigo
                      and (a.data between '$data_inicial' and '$data_final') order by a.data asc";
             $resposta = mysql_query($consulta) or die ("Não foi possivel consultar dados de contribuicao");
             echo "
             <center>
             <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#000000\">
                    <tr>
		                <td bgcolor=\"#c0c0c0\">Nome</td>
                        <td bgcolor=\"#c0c0c0\">Data</td>
                        <td bgcolor=\"#c0c0c0\">Valor</td>
                    </tr>
             ";
                    while ($linha = mysql_fetch_array($resposta)) {
                          $data = converte_data($linha["data"]);
                          $valor = number_format($linha["valor"], 2, ',', '.');
                          echo "
                          <tr>
		              <td bgcolor=\"#ffffff\">$linha[nome]</td>
                              <td bgcolor=\"#ffffff\">$data</td>
                              <td bgcolor=\"#ffffff\" align=\"right\">$valor</td>
                          </tr>
                          ";
                    }
             echo "
             </table>
             </center>
        </body>
        </html>
             
        ";
?>
