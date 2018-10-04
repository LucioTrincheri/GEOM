<?php
namespace GEOM;

require_once __DIR__.'/../vendor/autoload.php';

//Cargo Yaml
use Symfony\Component\Yaml\Yaml;
use Twig_Environment;
use Twig_Loader_Filesystem;

$yaml = Yaml::parseFile('example/preguntas.yml');
$yaml = $yaml['preguntas'];

//Transformo el array en clases 'Pregunta'
$preguntas = [];
$leng = count($yaml);
for($i=0; $i<$leng ;$i++){
	$preguntas[$i] = new Pregunta($yaml[$i]);
}

function mezclarTests(){
	$leng = count($preguntas);
	for($i=0; $i<$leng ;$i++)
		$preguntas[$i]->shuffleAnswers();
	shuffle($preguntas);
}


function CrearHTML($preguntas){
	$loader = new Twig_Loader_Filesystem('templates');
	$twig = new Twig_Environment($loader);
	$template = $twig->load('index.html');
	//Render del HTML con las variables
	file_put_contents('OutputHTML.html', $template->render(array('preguntas' => $preguntas)));
}

CrearHTML($preguntas);

?>
