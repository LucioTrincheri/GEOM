<?php

namespace GEOM;

use Twig_Environment;
use Twig_Loader_Filesystem;
require_once("yamlToPhp.php");
require_once __DIR__.'/../vendor/autoload.php';


//Carga de Twig
function CrearEvaluacionAlumno($preguntas){
	$loader = new Twig_Loader_Filesystem('templates');
	$twig = new Twig_Environment($loader);
	$template = $twig->load('index.html');
	//Render del HTML con las variables
	file_put_contents('EvaluacionAlumno.html', $template->render(array('preguntas' => $preguntas)));
}

?>
