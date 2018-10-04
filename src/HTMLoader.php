<?php

namespace GEOM;

use Twig_Environment;
use Twig_Loader_Filesystem;

require_once __DIR__.'/../vendor/autoload.php';


//Carga de Twig
function CrearHTML(){
	$loader = new Twig_Loader_Filesystem('templates');
	$twig = new Twig_Environment($loader);
	$template = $twig->load('index.html');
	//Render del HTML con las variables
	echo $template->render($preguntas);
}

?>
