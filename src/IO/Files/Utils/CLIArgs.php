<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/11/25
 * Time: 11:54
 */

namespace IOHandlerFramework\IO\Files\Utils;
use Exception;

class CLIArgs{

    private $input_name;
    private $output_name;
    private $error_name;
    private $error_directory = './logs/';

    public function __construct($argv, $suffix = null){
        $this->input_name = $argv[1];
        if(count($argv) < 2){
            throw new Exception('need input file');
        }
        $tmp_name = mb_split('\.', $argv[1]);
        if(is_null($suffix)){
           throw new Exception('suffix must not be null');
        }
        if(!is_null($suffix)){
            $suffix = '_'. $suffix. '_';
        }

        $this->output_name = $tmp_name[0] . $suffix . date('Y-m-d_h_i_s') . "." . $tmp_name[1];
        $this->error_name = 'invalid_'. $suffix . date('Y-m-d_h_i_s') . "." . $tmp_name[1];
    }

    public function getInputName(){
        return $this->input_name;
    }

    public function getOutputName()
    {
        return $this->output_name;
    }

    public function setErrorDirectory($dir)
    {
        $this->error_directory = './'.$dir.'/';
    }

    public function getErrorName()
    {
        return $this->error_directory.$this->error_name;
    }

    public function done()
    {
        $this->println('-------------');
        $this->println('done');
        $this->println('input  file: '. $this->input_name);
        $this->println('output file: '. $this->output_name);

    }

    private function println($target){
        echo $target.PHP_EOL;
    }
}