<?php
require('fpdf.php');

$nombres_usuario= $_POST['nombres_usuario'];
$Cliente		= $_POST['Cliente'];
$Fecha		    = $_POST['Fecha'];
$Moneda		    = $_POST['Moneda'];
$Total		    = $_POST['Total'];

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10, 'Folio: '.$nombres_usuario.'', 0, 1,0);
$pdf->Cell(0,20, 'Nombre del cliente: '.$Cliente.'', 0, 1, 1);
$pdf->Cell(40,10, 'Fecha de emision: '.$Fecha.'', 0, 1, 1);
$pdf->Cell(40,10, 'Tipo de moneda: '.$Moneda.'', 0, 1, 1);
$pdf->Cell(40,10, 'Cantidad Total: $'.$Total.'', 0, 1, 1);
$pdf->Output();
?>