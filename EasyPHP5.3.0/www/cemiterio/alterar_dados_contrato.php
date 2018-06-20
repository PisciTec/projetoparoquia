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
                       if (document.form_cadastro['titular'].value == ''){
                          alert('Digite o nome do titular!');
                          return false;
                       }
                       return true;
              }
         </script>
    ";

    if (isset($_POST["alterar"])) {
       $quadra = $_POST["quadra"];
       $sepultura = $_POST["sepultura"];
       $ala = $_POST["ala"];
       $titular = $_POST["titular"];
       $endereco = $_POST["endereco"];
       $bairro = $_POST["bairro"];
       $cidade = $_POST["cidade"];
       $estado = $_POST["estado"];
       $cep = $_POST["cep"];
       $fone = $_POST["fone"];
       $inicio = converte_data($_POST["inicio"]);
       $termino = converte_data($_POST["termino"]);
       $valor = str_replace(",",".",$_POST["valor"]);
       $datarec = converte_data($_POST["datarec"]);
       $obs = $_POST["obs"];

       $atualiza = "update cemiterio_contrato set quadra='$quadra', ala='$ala', sepultura='$sepultura', titular='$titular', endereco='$endereco',
       bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep', fone='$fone', inicio='$inicio', termino='$termino', valor='$valor',
       datarec='$datarec', obs='$obs' where contrato='$_POST[contrato]'";
       mysql_query($atualiza, $conectar) or die ("Não foi possivel atualizar dados de cemiterio contrato!");
       echo "
       <script language=\"JavaScript\">
            alert('Dados atualizados com sucesso!');
            window.location.href = 'pre_alterar_contrato.php';
       </script>
       ";
    }
    else {
    $contrato = $_GET["contrato"];
    $consulta = "select * from cemiterio_contrato where contrato='$contrato'";
    $resposta = mysql_query($consulta) or die ("Não foi possível consultar dados do contrato");
    $linha = mysql_fetch_array($resposta);

    $quadra = $linha["QUADRA"];
    $ala = $linha["ALA"];
    $sepultura = $linha["SEPULTURA"];
    $titular = $linha["TITULAR"];
    $endereco = $linha["ENDERECO"];
    $bairro = $linha["BAIRRO"];
    $cidade = $linha["CIDADE"];
    $estado = $linha["ESTADO"];
    $cep = $linha["CEP"];
    $fone = $linha["FONE"];
    $inicio = converte_data($linha["INICIO"]);
    $termino = converte_data($linha["TERMINO"]);
    $valor = $linha["VALOR"];
    $datarec = $linha["DATAREC"];
    $obs = $linha["OBS"];
    
    echo"
    <tr>
        <td height=\"309\" align=\"center\" valign=\"top\">
            <h3>Alteração de Dados do Contrato</h3>
            <br>
            <form method=\"post\" action=\"alterar_dados_contrato.php\" name=\"form_cadastro\" onsubmit=\"return validaFormulario(this);\">
                  <input type=\"hidden\" name=\"contrato\" value=\"$contrato\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tabela_formatada\">
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Contrato:</b>
                             </td>
                             <td class=\"td2\">
                                 $contrato
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
                                 <b>Titular:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"titular\" value=\"$titular\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>

                         <tr>
                             <td class=\"td1\">
                                 <b>Endereço:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"endereco\" value=\"$endereco\" size=\"50\" maxlength=\"70\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Bairro:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"bairro\" value=\"$bairro\" size=\"40\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Cidade:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"cidade\" value=\"$cidade\" size=\"40\" maxlength=\"50\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Estado:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"estado\" value=\"$estado\" size=\"2\" maxlength=\"2\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Cep:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"cep\" size=\"9\" value=\"$cep\" maxlength=\"9\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"#####-###\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Telefone:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"fone\" size=\"13\" value=\"$fone\" maxlength=\"13\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"(##)####-####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Início:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"inicio\" value=\"$inicio\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Término:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"termino\" value=\"$termino\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Valor R$:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"valor\" value=\"$valor\" size=\"10\" maxlength=\"10\" class=\"field_textbox\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Data Recebimento:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"datarec\" value=\"$datarec\" size=\"10\" maxlength=\"10\" class=\"field_textbox\" tipo=\"numerico\" mascara=\"##/##/####\">
                             </td>
                         </tr>
                         
                         <tr>
                             <td class=\"td1\">
                                 <b>Obs:</b>
                             </td>
                             <td class=\"td2\">
                                 <input type=\"text\" name=\"obs\" value=\"$obs\" size=\"70\" maxlength=\"100\" class=\"field_textbox\">
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
