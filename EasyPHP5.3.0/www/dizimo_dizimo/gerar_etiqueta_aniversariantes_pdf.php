<?php
require('fpdf.php');
include "abreconexao.php";

$consulta = "select codigo, nome, endereco, bairro, cidade, estado, cep from dizimo where motivo = '1' and (nascto like '____-$_GET[mes]-__') order by nome asc";
$resposta = mysql_query($consulta, $conectar) or die ("Não foi possível realizar a consulta de pessoa!");
$continua = true;
$pdf=new FPDF('P','mm','A4');
//Font
$pdf->SetFont('Times','',7);
$pdf->SetAutoPageBreak(true,0);
//Output text in a 6 cm width column
//while ($linha = mysql_fetch_array($resposta)){
while($continua){
      $y=6;
      $pdf->AddPage();
      for ($i=1;$i<=9;$i++){
      $linha = mysql_fetch_array($resposta);
      $texto = "$linha[nome]\n$linha[endereco]\n$linha[bairro], $linha[cidade] $linha[estado]\n$linha[cep]";
      //$pdf->SetX(0);
      $pdf->SetLeftMargin(5);
      $pdf->SetY($y);
      $pdf->Write(5,$texto);
      $linha = mysql_fetch_array($resposta);
      $texto = "$linha[nome]\n$linha[endereco]\n$linha[bairro], $linha[cidade] $linha[estado]\n$linha[cep]";
      //$pdf->SetX(80);
      $pdf->SetLeftMargin(75);
      $pdf->SetY($y);
      $pdf->Write(5,$texto);
      $linha = mysql_fetch_array($resposta);
      $texto = "$linha[nome]\n$linha[endereco]\n$linha[bairro], $linha[cidade] $linha[estado]\n$linha[cep]";
      //$pdf->SetX(80);
      $pdf->SetLeftMargin(148);
      $pdf->SetY($y);
      $pdf->Write(5,$texto);
      $y = $y + 33;
      }
      if ($linha[codigo]==""){
	  $continua = false;
      }
}
$pdf->Output();
?>
