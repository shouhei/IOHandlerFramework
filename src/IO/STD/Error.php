<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/11/27
 * Time: 17:19
 */

namespace IOHandlerFramework\IO\STD;
use IOHandlerFramework\IO\Contracts\OutputInterface;

class Error implements InputInterface
{
    public function read($data)
    {
        echo fputs(STDERR, $data.PHP_EOL);
    }
}