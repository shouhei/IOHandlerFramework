<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/11/25
 * Time: 11:54
 */

namespace IOHandlerFramework\CLI;

use IOHandlerFramework\CLI\Options;
use Exception;

class Args
{
    protected $class_;
    protected $method_;
    protected $options;

    public function __construct($argv, $config)
    {
        $clone_argv = $argv;
        if (isset($argv[0])) {
            $this->class_ = $clone_argv[0];
            # オプションクラスへ渡すために、クラス名を捨てる
            array_shift($argv);
        } else {
            throw new Exception('You didn\'t designate executable class');
        }
        # 上記ifで0番目をシフトしているので、オリジナルの1番目の要素を取得したい場合
        # 0を指定する
        if (isset($clone_argv[1]) && !preg_match('/\A-/', $clone_argv[1])) {
            $this->method_ = $clone_argv[1];
            # オプションクラスへ渡すために、メソッド名を捨てる
            array_shift($argv);
        } else {
            $this->method_ = 'main';
        }
        # 幾つかの引数を捨てたオリジナルの引数を渡す
        $this->options = new Options($argv, $config);
    }

    public function getExecutableClass()
    {
        return $this->class_;
    }

    public function getExecutableMethod()
    {
        return $this->method_;
    }

    public function getOptions()
    {
        return $this->options;
    }

}
