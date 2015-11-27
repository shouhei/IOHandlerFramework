<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/11/25
 * Time: 11:34
 */
namespace Framework\IO\Files;
use SplFileObject;

class AlterFile
{
    public $file;

    public function __construct($name, $mode){
        $this->file = new SplFileObject($name, $mode);
    }
}