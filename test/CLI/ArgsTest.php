<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/12/07
 * Time: 23:09
 */

use IOHandlerFramework\CLI\Args;

class ArgsTest extends PHPUnit_Framework_TestCase
{
    protected $args;

    public function setUp()
    {
        $this->args = new Args(['Main', 'hoge'], []);
    }

    public function testGetExecutableClass()
    {

        $this->assertEquals('Main', $this->args->getExecutableClass());
    }

    public function testGetExecutableMethod()
    {

        $this->assertEquals('hoge', $this->args->getExecutableMethod());
    }

    public function testlackedArg()
    {
        $args = new Args(['Main'],[]);
        $this->assertEquals('main', $args->getExecutableMethod());
    }

    public function testlackedArgWithOption()
    {
        $args = new Args(['Main','-e','huga'],['e']);
        $options = $args->getOptions();
        $this->assertEquals('huga',$options->e[0]);
    }

}