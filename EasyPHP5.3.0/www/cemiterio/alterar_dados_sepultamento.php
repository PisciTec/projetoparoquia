<?php
    include "cabecalho.inc";
    include "menu.inc";
    include "abreconexao.php";
    include "funcoes.inc";

    // Função para validar formulario e verificar se esta entrando com dados em branco
    echo "
         <script language=\"JavaScript\">
              function validaFormulario() {
                       if (document.form_cadastro['quadra'].value == ''){
                          alert('Informe o nome da quadra!');
                          return false;
                       }
                       if (document.form_cadastro['sepultura'].value == ''){
                          alert('Digite o número da sepultura!');
                          return false;
                       }
                       if (document.form_cadastro['ala'].value == ''){
                          alert('Digite o número da ala!');
                          return false;
                       }
                       if (document.form_cadastro['nome'].value == ''){
                          alert('Digite o nome do nome!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST["alterar"])) {
       $contrato = $_POST["contrato"];
       $quadra = $_POST["quadra"];
       $sepultura = $_POST["sepultura"];
       $ala = $_POST["ala"];
       $nome = $_POST["nome"];
       $data_sepultamento = converte_data($_POST["data_sepultamento"]);

       $atualiza = "update cemiterio_sepultamento set contrato='$contrato', quadra='$quadra', ala='$ala', sepultura='$sepultura', nome='$nome',
        data_sepultamento='$data_sepultamento' where cod_sepultamento='$_POST[cod_sepultamento]'";
       mysql_query($atualiza, $conectar) or die ("Não foi possivel atualizar dados de cemiterio sepultamento!");
       echo "
       <script language=\"JavaScript\">
            alert('Dados atualizados com sucesso!');
            window.location.href = 'pre_alterar_sepultamento.php';
       </script>
       ";
    }
    else {
    $cod_sepultamento = $_GET["cod_sepultamento"];
    $consulta = "select * from cemiterio_sepultamento where cod_sepultamento='$cod_sepultamento'";
    $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados do sepultamento");
    $linha = mysql_fetch_array($resposta);

    $contrato = $linha["CONTRATO"];
    $quadra = $linha["QUADRA"];
    $ala = $linha["ALA"];
    $sepultura = $linha["SEPULTURA"];
    $nome = $linha["NOME"];
    $data_sepultamento = converte_data($linha["DATA_SEPULTAMENTO"]);
    
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Alteração de Dados do Sepultamento</h3>
            <br>
            <form method=\"post\" action=\"alterar_dados_sepultamento.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <input type=\"hidden\" name=\"cod_sepultamento\" value=\"$cod_sepultamento\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Cod. Sepultamento:</b>
                             </td>
                             <td class=\"td2\">
                                 $cod_sepultamento
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Contrato:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"contrato\" value=\"$contrato\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Quadra:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"quadra\" value=\"$quadra\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Ala:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"ala\" value=\"$ala\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Sepultura:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"sepultura\" value=\"$sepultura\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Nome:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"nome\" value=\"$nome\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Falecimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"data_sepultamento\" value=\"$data_sepultamento\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td2\" colspan=\"2\">
                                 <input type=\"submit\" value=\"Alterar\" name=\"alterar\" class=\"botao_ok\">
                             </td>
                         </tr>
                   </table>
            </form>
        </td>
    </tr>
    ";
    }
    include "rodape.inc";
?>
