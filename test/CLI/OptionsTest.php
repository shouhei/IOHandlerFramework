<?php
/**
 * Created by PhpStorm.
 * User: shouhei
 * Date: 2015/12/07
 * Time: 22:23
 */

use IOHandlerFramework\CLI\Options;

class OptionsTest extends PHPUnit_Framework_TestCase
{
    public function testConstructSingleOptionSingleValue()
    {
        $options = new Options(['-i', 'hoge'], ['i']);
        $this->assertEquals('hoge', $options->i[0]);
    }

    public function testConstructSingleOptionDoubleValue()
    {
        $options = new Options(['-i', 'hoge', '-i', 'huga'], ['i']);
        $this->assertEquals('huga', $options->i[1]);
    }

    public function testConstructDoubleOptionlDoubleValue()
    {
        $options = new Options(['-i', 'hoge', '-e', 'huga'], ['i', 'e']);
        $this->assertEquals('huga', $options->e[0]);
    }

    public function testConstructDoubleOptionlNoneValue()
    {
        $options = new Options(['-i', '-e', 'huga'], ['i', 'e']);
        $this->assertEquals('', $options->i[0]);
        $this->assertEquals('huga', $options->e[0]);
    }

    public function testConstructLongOption()
    {
        $options = new Options(['-ihuga'], ['i']);
        $this->assertEquals('huga', $options->i[0]);
    }

    public function testConstructDoubleLongOption()
    {
        $options = new Options(['-ihuga','-ipiyo'], ['i']);
        $this->assertEquals('piyo', $options->i[1]);
    }

    public function testConstructDoubleAnotherLongOption()
    {
        $options = new Options(['-ihuga','-epiyo'], ['i','e']);
        $this->assertEquals('huga', $options->i[0]);
        $this->assertEquals('piyo', $options->e[0]);
    }
}