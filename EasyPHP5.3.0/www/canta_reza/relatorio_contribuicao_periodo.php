<?php
    include "abreconexao.php";
    include "funcoes.inc";

        $data_inicial = $_GET[data_inicial];
        $data_final = $_GET[data_final];
        $data_formatada_inicial = converte_data($data_inicial);
        $data_formatada_final = converte_data($data_final);
        $consulta = "select sum(valor) as valor from canta_reza_pagamento where data between '$data_inicial' AND '$data_final'";
        $resposta = mysql_query($consulta, $conectar) or die ("N�o foi poss�vel realizar a consulta de valores!");
        $linha = mysql_fetch_array($resposta);
        $valor = $linha["valor"];
        echo "
            <html>
            <head>
                  <title>SISTEMA CANTA E REZA</title>
                  <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
            </head>
            <body>
            <h3>Relat�rio Aniversariantes por M�s</h3>
            <br>
             <h4>Resumo de arrecada��o</h4>
             <b>Per�odo pesquisado:</b> $data_formatada_inicial � $data_formatada_final<br>
             Valor arrecado no per�odo foi de <b>".$valor."</b> reais
        </body>
        </html>
             
        ";
?>
