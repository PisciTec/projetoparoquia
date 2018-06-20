<?php
include "abreconexao.php";
$atualiza = "update comunidade_usuario set status_usuario = 'deslogado' where nome_usuario = 'admin'";
mysql_query($atualiza) or die ("Não foi possível atualizar dados do usuário");
echo "
       <script language=\"JavaScript\">
            window.alert('Você esta saindo do sistema');
            window.location.href='index.php';
       </script>
       ";

?>
