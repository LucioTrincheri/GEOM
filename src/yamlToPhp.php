<?php

namespace GEOM;

require_once __DIR__.'/../vendor/autoload.php';

//Cargo Yaml
use Symfony\Component\Yaml\Yaml;
$yaml = Yaml::parseFile('example/preguntas.yml');
$yaml = $yaml['preguntas'];

//Transformo el array en clases 'Pregunta'
$preguntas = [];
$leng = count($yaml);
for($i=0; $i<$leng ;$i++)
	$preguntas[$i] = new Pregunta($yaml[$i]);


function mezclarTests(){
	$leng = count($preguntas);
	for($i=0; $i<$leng ;$i++)
		$preguntas[$i]->shuffleAnswers();
	shuffle($preguntas);
}

//Carga de Twig
/*
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);
$template = $twig->load('index.html');
//Render del HTML con las variables
echo $template->render(/*array('the' => 'variables', 'go' => 'here'));
*/
?>
