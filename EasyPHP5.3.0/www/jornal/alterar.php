<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";
    
    $data_hoje = date("Y-m-d");

    // Função para validar formulario e verificar se esta entrando com dados em branco

    if (isset($_GET["acao"]) and $_GET["acao"] == "editar") {
          $codigo = $_GET["codigo"];
          echo "
               <script language=\"JavaScript\">
                       janela = window.open(\"alterar_dados_cliente.php?codigo=$codigo\", \"\", \"height=510, width=600, status, scroll=yes\");
               </script>
          ";
    }
    
    if (isset($_GET["acao"]) and $_GET["acao"] == "ativar") {
          $codigo = $_GET["codigo"];
          $motivo = $_GET["motivo"];
          $desativar = "update jornal_cliente set ativo='1' where codcliente='$codigo'";
          mysql_query($desativar, $conectar) or die ("Não foi possível excluir cliente");
          $registrar = "insert into jornal_processo_motivo (motivo, data_alteracao, codcliente, tipo_motivo) values ('$motivo', '$data_hoje',
                       '$codigo', 'Ativação')";
          mysql_query($registrar, $conectar) or die ("Não foi possível alterar dados do jornal");
          echo "
               <script language=\"JavaScript\">
                       alert('Cliente foi ativado');
               </script>
          ";
    }
    
    if (isset($_GET["acao"]) and $_GET["acao"] == "desativar") {
          $codigo = $_GET["codigo"];
          $motivo = $_GET["motivo"];
          $desativar = "update jornal_cliente set ativo='0' where codcliente='$codigo'";
          mysql_query($desativar, $conectar) or die ("Não foi possível excluir cliente");
          
          $registrar = "insert into jornal_processo_motivo (motivo, data_alteracao, codcliente, tipo_motivo) values ('$motivo', '$data_hoje',
                       '$codigo', 'Desativação')";
          mysql_query($registrar, $conectar) or die ("Não foi possível alterar dados do jornal");
          echo "
               <script language=\"JavaScript\">
                       alert('Cliente foi desativado');
               </script>
          ";
    }
    
    if (isset($_GET["acao"]) and $_GET["acao"] == "excluir") {
          $codigo = $_GET["codigo"];
          $delete = "delete from jornal_cliente where codcliente='$codigo'";
          mysql_query($delete, $conectar) or die ("Não foi possível excluir cliente");
          echo "
               <script language=\"JavaScript\">
                       alert('Cliente foi excluído com sucesso');
               </script>
          ";
          /*
          $delecao = "update tab_pessoa set status_habilitado='1' where cod_pessoa = '$cod_pessoa'";
          mysql_query($delecao, $conectar) or die ("Não foi possível inserir status de excluido!");
          echo "
               <script language=\"JavaScript\">
                       alert('Dados de pessoa excluido com sucesso!');
               </script>
          ";
          */
    }

    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.f1['nome'].value == ''){
                          alert('Informe o nome do cliente que deseja alterar!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Alterações de Dados do Jornal</h3>
            <br>
            <form method=\"post\" action=\"alterar.php\" name=\"f1\" onsubmit=\"return validaFormulario(this);\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"70%\">
                         <tr>
                             <td>
                                 <b>Nome Cliente:</b>
                             </td>
                             <td>
                                 <input type=\"text\" name=\"nome\" value=\"\" size=\"40\" maxlength=\"40\" class=\"field_textbox\">
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <input type=\"submit\" name=\"alterar\" value=\"Pesquisar\" class=\"botao_ok\">
                             </td>
                         </tr>
                  </table>
     ";
     
     if (isset($_POST["alterar"])) {
        $nome = $_POST["nome"];
        $consulta = "select * from jornal_cliente where nome like '%$nome%'";
        $resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de cliente!");
        $total = mysql_num_rows($resposta);
        echo "
        <b>Resultados encontrado: $total</b>
        <table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#0000000\" width=\"600\">
              <tr>
                  <td bgcolor=\"#C0C0C0\" width=\"10%\"><b>Cod.</b></td>
                  <td bgcolor=\"#C0C0C0\" width=\"40%\"><b>Nome Pessoa</b></td>
                  <td bgcolor=\"#C0C0C0\" width=\"10%\"><b>CPF</b></td>
                  <td bgcolor=\"#C0C0C0\" width=\"10%\"><b>RG</b></td>
                  <td bgcolor=\"#C0C0C0\" width=\"30%\" align=\"center\"><b>Ação</b></td>
              </tr>
          ";
          while ($linha = mysql_fetch_array($resposta)) {
                  $codcliente = $linha["CODCLIENTE"];
                  $nome = $linha["NOME"];
                  $cgccpf = $linha["CGCCPF"];
                  $cgfrg = $linha["CGFRG"];
                  echo "
                  <tr>
                       <td bgcolor=\"#ffffff\">$codcliente</td>
                      <td bgcolor=\"#ffffff\">$nome</td>
                      <td bgcolor=\"#ffffff\">$cgccpf</td>
                      <td bgcolor=\"#ffffff\">$cgfrg</td>
                      <td bgcolor=\"#ffffff\" align=\"center\">
                          <a href=\"alterar.php?acao=editar&codigo=$codcliente\" target=\"_self\" title=\"Clique aqui para alterar dados do cliente\"><img src=\"img/icn_editar.gif\" width=\"16\" height=\"14\" border=\"0\"></a>
                          &nbsp;&nbsp;
                          <input type=\"button\" value=\"Excluir\" class=\"botao_ok\" onclick=\"if (confirm('Tem certeza que deseja excluir?')){ window.location.href='alterar.php?acao=excluir&codigo=$codcliente';}\">
                          <br>
                          <input type=\"button\" value=\"Ativar\" onclick=\"var motivo=prompt('Digite o motivo da ativação'); window.location.href='alterar.php?acao=ativar&codigo=$codcliente&motivo='+motivo;\" class=\"botao_ok\">
                          &nbsp;&nbsp;
                          <input type=\"button\" value=\"Desativar\" onclick=\"var motivo=prompt('Digite o motivo da desativação'); window.location.href='alterar.php?acao=desativar&codigo=$codcliente&motivo='+motivo;\" class=\"botao_ok\">
                      </td>
                  </tr>
                  ";
          }
          echo "
        </table>
          ";
     }
     echo "
        </td>
    </tr>
    ";
    include "rodape.inc";
?>
