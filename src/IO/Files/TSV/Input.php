<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/11/25
 * Time: 11:35
 */
namespace IOHandlerFramework\IO\Files\TSV;

use IOHandlerFramework\IO\Contracts\InputInterface;
use IOHandlerFramework\IO\Files\AlterFile;

class Input extends AlterFile implements InputInterface
{

    private $line;
    public function __construct($name)
    {
        parent::__construct($name, 'r');
    }

    public function is_end()
    {
        $this->line = $this->file->fgetcsv("	");
        return $this->file->eof() || (count($this->line) == 1 && is_null($this->line[0]));
    }

    public function read()
    {
       $this->line = $this->line?$this->line:$this->file->fgetcsv("	");
       return $this->line;
    }

}
