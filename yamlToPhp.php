<?php

namespace GEOM;

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$array = Yaml::parseFile('example/preguntas.yml');

file_put_contents('output.txt', print_r($array, true));
