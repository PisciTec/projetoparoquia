<?php
require('fpdf.php');
include "abreconexao.php";

$consulta = "select codigo, nome, endereco, bairro, estado, cep from dizimo where motivo = '1'";
$resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");

$pdf=new FPDF();
$pdf->SetLeftMargin(0);
$pdf->AddPage();
$pdf->SetX(0);
$pdf->SetY(0);
//Font
$pdf->SetFont('Times','',10);
//Output text in a 6 cm width column
while ($linha = mysql_fetch_array($resposta)){
      $texto = "$linha[nome]\n$linha[endereco]\n$linha[bairro], $linha[estado]\n$linha[cep]";
      $pdf->Cell(80,25,'',1,'L');
      $pdf->MultiCell(80,5,$texto,1,'L');
      $linha = mysql_fetch_array($resposta);
      $texto = "$linha[nome]\n$linha[endereco]\n$linha[bairro], $linha[estado]\n$linha[cep]";
      $pdf->Cell(80,25,'',1,'L');
      $pdf->MultiCell(80,5,$texto,1,'L');

}
$pdf->Output();
?>
