<?php
namespace GEOM;

require_once __DIR__.'/../vendor/autoload.php';

//Cargo Yaml
use Symfony\Component\Yaml\Yaml;
use Twig_Environment;
use Twig_Loader_Filesystem;
require_once("HTMLoader.php");

$yaml = Yaml::parseFile('example/preguntas.yml');
$yaml = $yaml['preguntas'];

//Transformo el array en clases 'Pregunta'
$preguntas = [];
$leng = count($yaml);
for($i=0; $i<$leng ;$i++){
	$preguntas[$i] = new Pregunta($yaml[$i]);
}


//Work in progress
function mezclarTests(){
	$leng = count($preguntas);
	for($i=0; $i<$leng ;$i++)
		$preguntas[$i]->shuffleAnswers();
	shuffle($preguntas);
}

CrearEvaluacionAlumno($preguntas);

?>
