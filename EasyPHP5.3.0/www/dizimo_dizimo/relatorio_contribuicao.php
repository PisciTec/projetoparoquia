<?php
    include "abreconexao.php";
    include "funcoes.inc";
    
    $mes[1] = "Janeiro";
    $mes[2] = "Fevereiro";
    $mes[3] = "Março";
    $mes[4] = "Abril";
    $mes[5] = "Maio";
    $mes[6] = "Junho";
    $mes[7] = "Julho";
    $mes[8] = "Agosto";
    $mes[9] = "Setembro";
    $mes[10] = "Outubro";
    $mes[11] = "Novembro";
    $mes[12] = "Dezembro";
    
    if (isset($_GET["acao"]) and $_GET["acao"]== "deletar"){
       $deletar="delete from contrib where cod_contrib='$_GET[cod_contrib]'";
       mysql_query($deletar) or die ("Não foi possível excluir contribuição");
       echo "
          <script language=\"JavaScript\">
                 alert('Contribuição excluída com sucesso!');
          </script>
       ";
    }

    // Função para validar formulario e verificar se esta entrando com dados em branco

    echo"
            <html>
            <head>
                  <title>CONTROLE DE DÍZIMO</title>
                  <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
            </head>
            <body>
            <h3>Contribuições realizadas</h3>
            <center>
            <b>Dizimista:</b>$_GET[nome]
            <br>
                                     <table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" class=\"tabela_formatada\">
                                            <tr>
                                                <td class=\"td3\">Mês</td>
                                                <td class=\"td3\">Ano</td>
                                                <td class=\"td3\">Data</td>
                                                <td class=\"td3\">Valor</td>
                                                <td class=\"td3\">Ação</td>
                                            </tr>
                                     ";
                                              $codigo = $_GET["codigo"];
                                              $consulta_pagamento = "select A.cod_contrib, A.ANO, A.MES, A.VALOR, A.DATA from contrib A inner join dizimo B where A.CODIGO = B.CODIGO and B.CODIGO = $codigo order by A.DATA desc";
                                              $resposta_pagamento = mysql_query($consulta_pagamento, $conectar) or die ("Não foi possivel consultar dados de pagamento!");
                                              while ($linha = mysql_fetch_array($resposta_pagamento)) {
                                                    $cod_contrib=$linha["cod_contrib"];
                                                    $data = converte_data($linha["DATA"]);
                                                    $valor = $linha["VALOR"];
                                                    $ano = $linha["ANO"];
                                                    $mes1 = $linha["MES"];
                                                    echo "
                                                    <tr>
                                                        <td class=\"td2\">$mes[$mes1]</td>
                                                        <td class=\"td2\">$ano</td>
                                                        <td class=\"td2\">$data</td>
                                                        <td class=\"td2\">$valor</td>
                                                        <td class=\"td2\"><a href=\"relatorio_contribuicao.php?codigo=$codigo&cod_contrib=$cod_contrib&acao=deletar\" target=\"_self\"><img src=\"img/icn_excluir.gif\" width=\"16\" height=\"15\" border=\"0\"></td>
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
