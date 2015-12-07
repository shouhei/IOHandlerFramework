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
        $options = $args->getOptions();
        $exec_cls = 'App\\'.$args->getExecutableClass();
        $executable = new ReflectionMethod($exec_cls, $args->getExecutableMethod());
        $params = $executable->getParameters();
        $exec_args = [];
        $input_counter = 0;
        foreach($params as $param){
            $exec_cls = $param->getClass();
            if(preg_match('/File\\*\\Input\Z/',$exec_cls->getName())){
                $exec_args[] = new $exec_cls($options->i[$input_counter]);
                $input_counter++;
            }
            if(preg_match('/File\\*\\Output\Z/', $exec_cls->getName())){
                $tmp_name = mb_split('/\./', $options->i[0]);
                $suffix = isset($options->s[0])?$options->s[0]:'';
                $exec_args[] = new $exec_cls($tmp_name[0] . $suffix . date('Y-m-d_h_i_s') . "." . $tmp_name[1]);
            }
        }
        if (empty($exec_args)) {
            $executable->invoke(null);
        }else{
            $executable->invoke(null, $exec_args);
        }

    }
}