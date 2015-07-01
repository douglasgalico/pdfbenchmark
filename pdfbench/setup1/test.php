<?php

require_once('tcpdf_include.php');
require_once('ChartGen.php');
require_once('functions.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

define('BENCHMARK_PAGES', 50);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PDBenchmark');
$pdf->SetTitle('PDFBenchmark Setup01-1');
$pdf->SetSubject('TCPDF Com PHP');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetFont('times', '', 14);


for($i=0;$i < BENCHMARK_PAGES;$i++){

$pdf->AddPage();
$text = loadTemplate('teste.php',['ta' => '438gdf43']);
$pdf->writeHTML($text, true, 0, true, 0);
}

$pdf->Output(dirname(__FILE__) .DIRECTORY_SEPARATOR.'output'.DIRECTORY_SEPARATOR.'Outputfile.pdf', 'F');


