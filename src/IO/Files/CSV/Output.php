<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/11/25
 * Time: 11:35
 */

namespace IOHandlerFramework\IO\Files\CSV;

use IOHandlerFramework\IO\Contracts\OutputInterface;
use IOHandlerFramework\IO\Files\AlterFile;

class Output extends AlterFile implements OutputInterface
{

    public function __construct($name)
    {
        parent::__construct($name, 'w');
    }

    public function write($data)
    {
        $this->file->fputcsv($data, ',');
    }

}