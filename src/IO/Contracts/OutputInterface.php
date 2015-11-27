<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/11/25
 * Time: 11:33
 */

namespace IOHandlerFramework\IO\Contracts;

interface OutputInterface{
    public function write($data);
}