<?php
include "abreconexao.php";
$atualiza = "update comunidade_usuario set status_usuario = 'deslogado' where nome_usuario = 'admin'";
mysql_query($atualiza) or die ("N�o foi poss�vel atualizar dados do usu�rio");
echo "
       <script language=\"JavaScript\">
            window.alert('Voc� esta saindo do sistema');
            window.location.href='index.php';
       </script>
       ";

?>
