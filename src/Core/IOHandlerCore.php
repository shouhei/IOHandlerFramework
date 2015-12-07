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
        $exec_cls = 'App\\'.$args->getExecutableClass();
        $executable = new ReflectionMethod($exec_cls, $args->getExecutableMethod());
        $params = $executable->getParameters();
        $exec_args = [];
        foreach($params as $param){
            var_dump($param->getClass());
        }
        if (empty($exec_args)) {
            $executable->invoke(null);
        }else{
            $executable->invoke(null, $exec_args);
        }

    }
}