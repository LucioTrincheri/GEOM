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

//Pido la cantidad de preguntas para la evaluación
$cant = readline("Ingrese la cantidad de preguntas a contener en la evaluacion: ");
$cant = intval($cant);
if($cant > count($yaml)){$cant = count($yaml);}

//Achico la cantidad de preguntas necesarias
shuffle($yaml);
$yaml = array_slice($yaml, 0, $cant);

//Transformo el array en clases 'Pregunta'
$preguntas = [];
$leng = count($yaml);
for($i=0; $i<$leng ;$i++){
	$preguntas[$i] = new Pregunta($yaml[$i]);
}

//Mezcla los tests 
function mezclarTests($preguntas){
	$leng = count($preguntas);
	for($i=0; $i<$leng ;$i++)
		$preguntas[$i]->shuffleAnswers();
	shuffle($preguntas);
	return $preguntas;
}

//Pide la cantidad de test a crear
$test = readline("Ingrese la cantidad de test a crear: ");
$test = intval($test);

//Genera los HTML

for($i = 1; $i < $test + 1; $i++){
	$preguntas = mezclarTests($preguntas);
	CrearEvaluacion($preguntas, $i);
}
?>
