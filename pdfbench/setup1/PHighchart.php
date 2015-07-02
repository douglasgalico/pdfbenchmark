<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/30/15
 * Time: 2:44 PM
 */


class PHighchart {

    var $chart_name;
    var $PHANTOMJS_PATH = '/usr/bin/phantomjs';
    var $PHANTOMJS_SCRIPT = '../highcharts/exporting-server/phantomjs/highcharts-convert.js';
    var $OUT_DIR = 'tmp';
    var $IMG_PATH;

    public function __construct($cname){
        $this->chart_name = $cname;
        $this->_execute();
        $this->IMG_PATH = $this->OUT_DIR.DIRECTORY_SEPARATOR.$this->chart_name.'.png';
    }



    public function getImagePath(){
        return $this->IMG_PATH;
    }

    private function _execute() {
        $command = $this->PHANTOMJS_PATH . " " . $this->PHANTOMJS_SCRIPT . " " . "-infile options.json -outfile "."./".$this->OUT_DIR.DIRECTORY_SEPARATOR.$this->chart_name.".png -scale 2.5 -width 800";
        $out = null;
        $ret = null;
        $response = exec($command,$out,$ret);

    }


} 