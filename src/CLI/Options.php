<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/12/05
 * Time: 23:12
 */

namespace IOHandlerFramework\CLI;

class Options{
    protected $options = [];
    public function __construct($argv, $configs)
    {
        foreach ($configs as $config) {
            foreach($argv as $key => $arg){
                if (preg_match("/-$config/", $arg)) {
                    $this->options[$config][] = $argv[$key + 1];
                }
            }
        }
    }

    public function getOptionsValue($key)
    {
        return $this->options[$key];
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->options)) {
            return $this->getOptionsValue($key);
        }
    }
}