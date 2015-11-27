<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/11/25
 * Time: 11:36
 */

namespace IOHandlerFramework;
use IOHandlerFramework\IO\Contracts\InputInterface;
use IOHandlerFramework\IO\Contracts\OutputInterface;

abstract class SingleIOHandlerFramework{
    protected $input;
    protected $output;
    protected $error_report;

    public function __construct(InputInterface $input, OutputInterface $output, OutputInterface $error_report = null){
        $this->input = $input;
        $this->output = $output;
        if(!is_null($error_report)){
            $this->error_report = $error_report;
        }

    }

    abstract function execute();
}