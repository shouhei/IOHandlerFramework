<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/12/05
 * Time: 23:12
 */

namespace IOHandlerFramework\CLI;

use Exception;

class Options
{
    protected $options = [];

    public function __construct($argv, $configs)
    {
        $skip = false;
        foreach ($argv as $key => $arg) {
            if ($skip) {
                $skip = false;
                continue;
            }
            if (preg_match('/\A-/', $arg)) {
                $is_valid_configure = false;
                foreach ($configs as $config) {
                    if (preg_match("/\\A-$config\\Z/", $arg) && (isset($argv[$key + 1]) && !preg_match('/\A-/', $argv[$key + 1]))) {
                        $is_valid_configure = true;
                        $skip = true;
                        $this->options[$config][] = $argv[$key + 1];
                        continue;
                    } elseif (preg_match("/\\A-$config/", $arg)) {
                        $is_valid_configure = true;
                        $this->options[$config][] = preg_replace("/\\A-$config/", "", $arg);
                        continue;
                    } elseif (preg_match("/\\A-$config\\Z/", $arg) && !isset($argv[$key + 1])) {
                        $is_valid_configure = true;
                        $this->options[$config][] = '';
                    }
                }
                if (!$is_valid_configure) {
                    throw new Exception('no such configure');
                }

            } else {
                continue;
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