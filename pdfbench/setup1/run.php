<?php

require_once('tcpdf_include.php');
require_once('Pdf.php');
require_once('PHighchart.php');
define('BENCHMARK_PAGES',3);


$pdf = new Pdf();
//for($i=0;$i<BENCHMARK_PAGES;$i++){
   // echo 'a';
    $chart = new PHighchart('newimg');
    $pdf->newPagefromTemplate('text_images_charts',['chart_path' => $chart->getImagePath()]);
//}
$pdf->Render();