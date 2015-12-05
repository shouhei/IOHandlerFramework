#! /usr/bin/env php
<?php
require "./vendor/autoload.php";

use Symfony\Component\Yaml\Parser;
use IOHandlerFramework\Core\IOHandlerCore;

$parser = new Parser();
IOHandlerCore::execute($argv, $parser->parse(file_get_contents("./config/args.yml")));