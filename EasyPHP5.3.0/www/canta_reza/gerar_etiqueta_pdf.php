<?php
require('fpdf.php');
include "abreconexao.php";

$consulta = "select codigo, nome, endereco, bairro, cidade, estado, cep from canta_reza_pessoa where motivo = '1'";
$resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
$pdf=new FPDF('P','mm','A4');
//Font
$pdf->SetFont('Times','',8);
$pdf->SetAutoPageBreak(true,0);
$pdf->SetTopMargin(0);
//Output text in a 6 cm width column
while ($linha = mysql_fetch_array($resposta)){      
      $y=9;
      $pdf->AddPage();
      for ($i=1;$i<=9;$i++){
      $texto = "$linha[nome]\n$linha[endereco]\n$linha[bairro], $linha[cidade] $linha[estado]\n$linha[cep]";
      //$pdf->SetX(0);
      $pdf->SetLeftMargin(5);
      $pdf->SetY($y);
      $pdf->Write(5,$texto);
      $linha = mysql_fetch_array($resposta);
      $texto = "$linha[nome]\n$linha[endereco]\n$linha[bairro], $linha[cidade] $linha[estado]\n$linha[cep]";
      //$pdf->SetX(80);
      $pdf->SetLeftMargin(72);
      $pdf->SetY($y);
      $pdf->Write(5,$texto);
      $linha = mysql_fetch_array($resposta);
      $texto = "$linha[nome]\n$linha[endereco]\n$linha[bairro], $linha[cidade] $linha[estado]\n$linha[cep]";
      //$pdf->SetX(80);
      $pdf->SetLeftMargin(144);
      $pdf->SetY($y);
      $pdf->Write(5,$texto);
      $y = $y + 33;
      }
}
$pdf->Output();
?>
