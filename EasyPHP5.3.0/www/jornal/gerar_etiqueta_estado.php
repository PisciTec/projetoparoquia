<?php
require('fpdf.php');
include "abreconexao.php";

$consulta = "select codcliente, nome, endereco, ciddes, ciduf, cep, bairro from jornal_cliente inner join jornal_cidade where jornal_cidade.ciduf='$_GET[estado]' and ativo='1' and (jornal_cliente.cidade = jornal_cidade.cidcod) order by nome asc";
$resposta = mysql_query($consulta, $conectar) or die ("N�o foi poss�vel realizar a consulta de pessoa!");
$continua = true;
$pdf=new FPDF('P','mm','A4');
//Font
$pdf->SetFont('Times','',7);
$pdf->SetAutoPageBreak(true,0);
$pdf->SetTopMargin(0);
//Output text in a 6 cm width column
//while ($linha = mysql_fetch_array($resposta)){      
while ($continua){
      $y=6;
      $pdf->AddPage();
      for ($i=1;$i<=9;$i++){
      $linha = mysql_fetch_array($resposta);
      $texto = "$linha[nome]\n$linha[endereco]\n$linha[bairro], $linha[ciddes] $linha[ciduf]\n$linha[cep]";
      //$pdf->SetX(0);
      $pdf->SetLeftMargin(5);
      $pdf->SetY($y);
      $pdf->Write(5,$texto);
      $linha = mysql_fetch_array($resposta);
      $texto = "$linha[nome]\n$linha[endereco]\n$linha[bairro], $linha[ciddes] $linha[ciduf]\n$linha[cep]";
      //$pdf->SetX(80);
      $pdf->SetLeftMargin(75);
      $pdf->SetY($y);
      $pdf->Write(5,$texto);
      $linha = mysql_fetch_array($resposta);
      $texto = "$linha[nome]\n$linha[endereco]\n$linha[bairro], $linha[ciddes] $linha[ciduf]\n$linha[cep]";
      //$pdf->SetX(80);
      $pdf->SetLeftMargin(148);
      $pdf->SetY($y);
      $pdf->Write(5,$texto);
      $y = $y + 33;
      }
      if ($linha[cod_cliente] == ""){
          $continua = false;
      }
}
$pdf->Output();
?>
