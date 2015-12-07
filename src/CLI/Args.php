<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/11/25
 * Time: 11:54
 */

namespace IOHandlerFramework\CLI;
use IOHandlerFramework\CLI\Options;
use Exception;

class Args{
    protected $class_;
    protected $method_;
    protected $options;

    public function __construct($argv, $config){
        # ファイル名を捨てる
        array_shift($argv);
        if(isset($argv[1])){
            $this->class_ = array_shift($argv);
        }else{
            throw new Exception('You didn\'t designate executable class');
        }
        if(isset($argv[2]) && !preg_match('/\A-/', $argv[2])){
            $this->method_ = array_shift($argv);
        }else{
            $this->method_ = 'main';
        }
        $this->options = new Options($argv, $config);
    }

    public function getExecutableClass(){
        return $this->class_;
    }

    public function getExecutableMethod()
    {
        return $this->method_;
    }

    public function getOptions()
    {
        return $this->options;
    }

}
