<?php

namespace GEOM;

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$yaml = Yaml::parseFile('example/preguntas.yml');

$yaml = $yaml['preguntas'];

//Transformo el array en clases 'Pregunta'
	
$preguntas = [];
$leng = count($yaml);
for($i=0; $i<$leng ;$i++)
	$preguntas[$i] = new Pregunta($yaml[$i]);
//Fin Transformacion del array

file_put_contents('output.txt', print_r($yaml, true));
?>
