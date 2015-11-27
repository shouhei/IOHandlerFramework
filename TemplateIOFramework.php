<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/11/27
 * Time: 17:06
 */
require_once("./vendor/autoload.php");

use IOHandlerFramework\SingleIOHandlerFramework;
use IOHandlerFramework\IO\STD\Input;
use IOHandlerFramework\IO\STD\Output;
use IOHandlerFramework\IO\STD\Error;
use IOHandlerFramework\IO\Files\Utils\CLI;


class Main extends SingleIOHandlerFramework{
    public function execute(){
    }
}

$main = new Main(new Input(), new Output(), new Error());
$main->execute();
$util->done();