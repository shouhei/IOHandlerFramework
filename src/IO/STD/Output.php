<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/11/27
 * Time: 17:19
 */

namespace IOHandlerFramework\IO\STD;
use IOHandlerFramework\IO\Contracts\OutputInterface;

class Output implements OutputInterface
{
    public function write($data)
    {
        echo $data.PHP_EOL;
    }
}