<?php

require_once('tcpdf_include.php');

/*


define('BENCHMARK_PAGES', 50);


for($i=0;$i < BENCHMARK_PAGES;$i++){

$pdf->AddPage();
$text = loadTemplate('teste.php',['ta' => '438gdf43']);
$pdf->writeHTML($text, true, 0, true, 0);
}


*/


class Pdf {

    var $pdf;

    public function __construct(){
        $this->pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->SetAuthor('PDBenchmark');
        $this->pdf->SetTitle('PDFBenchmark Setup01-1');
        $this->pdf->SetSubject('TCPDF Com PHP');
        $this->pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $this->pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $this->pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $this->pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
       // $this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $this->pdf->SetFont('times', '', 14);
    }

   private function loadTemplate($page, $data = array()) {
        extract($data);
        $path = 'templates'. DIRECTORY_SEPARATOR . $page;
        ob_start();
        include $path;
        return ob_get_clean();
    }

    public function newPagefromTemplate($pagename, $data = array()){
        $this->pdf->AddPage();
        $text = $this->loadTemplate($pagename.'.php',$data);
        $this->pdf->writeHTML($text, true, 0, true, 0);
    }

    public function Render(){

        $this->pdf->Output(dirname(__FILE__) .DIRECTORY_SEPARATOR.'output'.DIRECTORY_SEPARATOR.'Outputfile.pdf', 'F');
    }

}