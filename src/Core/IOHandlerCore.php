<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/12/05
 * Time: 23:17
 */

namespace IOHandlerFramework\Core;

use IOHandlerFramework\CLI\Args;
use ReflectionMethod;

class IOHandlerCore
{
    public static function execute($argv, $args_config)
    {
       $args = new Args($argv, $args_config);
       $cls = 'App\\'.$args->getExecutableClass();
       $executable = new ReflectionMethod($cls, $args->getExecutableMethod());
       $params = $executable->getParameters();
       foreach($params as $param){
           var_dump($param->getClass());
       }
    }
}