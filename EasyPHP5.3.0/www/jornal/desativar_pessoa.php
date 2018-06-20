<?php
    include "abreconexao.php";
    include "funcoes.inc";

    echo"
    <html>
          <head>
                <title>Jornal</title>
                <link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\">
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
          </head>
      ";
           $atualiza = "update tab_pessoa_jornal set ativo='0' where cod_pessoa_jornal = '$_GET[codigo]'";
           mysql_query($atualiza, $conectar) or die ("Não foi possivel atualizar dados de pessoa!");
           echo "
           <script language=\"JavaScript\">
                  alert('Dados atualizados co sucesso!');
                  opener.focus();
                  close();
           </script>
     </html>
    ";
?>
