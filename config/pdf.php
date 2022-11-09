<?php
require_once('manageData.php');
require_once('fpdf.php');

$data = new ManageData();
$dataPen = $data->getData('pen', 100);

$judul = "Report Penjualan";
$tgl = "Date : ".date("d F Y");
$header = [
    ['label'=>'No', 'length'=>10, 'align'=>'L'],
    ['label'=>'Order Date', 'length'=>35, 'align'=>'L'],
    ['label'=>'Shipping Date', 'length'=>40, 'align'=>'L'],
    ['label'=>'Ship Mode', 'length'=>35, 'align'=>'L'],
    ['label'=>'Product Code', 'length'=>40, 'align'=>'L'],
    ['label'=>'Quantity', 'length'=>25, 'align'=>'L'],
    ['label'=>'Profit', 'length'=>25, 'align'=>'L'],
    ['label'=>'Shipping Cost', 'length'=>35, 'align'=>'L'],
    ['label'=>'Order Priority', 'length'=>35, 'align'=>'L'],

];

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage('L');
$pdf->SetFont('Arial', 'b', 15);
$pdf->Cell(0, 15, $judul, '0', 1, 'P');
$pdf->SetFont('Arial', 'i', 9);
$pdf->Cell(0, 10, $tgl, '0', 1, 'P');
$pdf->SetFont('Arial', '', 12);
$pdf->SetFillColor(100,190,0);
foreach($header as $kolom){
    $pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0',$kolom['align'], true);
}
$pdf->Ln();
$pdf->SetFont('arial','','10');
foreach ($dataPen as $Baris){
    $i= 0;
    foreach ($Baris as $Cell){
        $pdf->Cell ($header[$i]['length'], 7, $Cell, 1, '0', $kolom['align']);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Output();