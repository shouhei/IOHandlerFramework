<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/11/27
 * Time: 17:19
 */

namespace IOHandlerFramework\IO\STD;
use IOHandlerFramework\IO\Contracts\InputInterface;

class Input implements InputInterface
{
    private $data;
    public function read()
    {
        echo "please input: ";
        $this->data = trim(fgets(STDIN));
        return $this->data;
    }

    public function is_end()
    {
        return preg_match('/\A(end|quit|exit)\Z/', $this->data);
    }
}