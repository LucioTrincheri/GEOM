<?php

namespace GEOM;

use Twig_Environment;
use Twig_Loader_Filesystem;
require_once("yamlToPhp.php");
require_once __DIR__.'/../vendor/autoload.php';


//Carga de Twig
function CrearEvaluacion($preguntas, $tema){
	$loader = new Twig_Loader_Filesystem('templates');
	$twig = new Twig_Environment($loader);
	$templateAlumn = $twig->load('alumno.html');
	$templateProf = $twig->load('profesor.html');
	//Render del HTML con las variables
	file_put_contents('exams/EvaluacionTema'.$tema.'.html', $templateAlumn->render(array('preguntas' => $preguntas, 'tema' => $tema)));
    file_put_contents('exams/RespuestasTema'.$tema.'.html', $templateProf->render(array('preguntas' => $preguntas, 'tema' => $tema)));
}

?>
