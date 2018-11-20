<?php

namespace GEOM;

use Twig_Environment;
use Twig_Loader_Filesystem;
use Symfony\Component\Yaml\Yaml;
require_once __DIR__.'/../vendor/autoload.php';

//Pido el archivo con las preguntas
$arc = readline("Camino del archivo Yaml con las preguntas: ");
//Parseo el archivo
$yaml = Yaml::parseFile($arc);
$yaml = $yaml['preguntas'];

//Cantidad de test a crear
$test = readline("Ingrese la cantidad de test a crear: ");
$test = intval($test);

//Pido la cantidad de preguntas para la evaluación
$cant = readline("Ingrese la cantidad de preguntas a contener en la evaluacion: ");
$cant = intval($cant);
if ($cant > count($yaml)) {$cant = count($yaml);}

//Pregunto si el usuario quiere que las preguntas varien entre los tests
$var = readline("Variar las preguntas entre los tests? (y/n): ");

//Fin de parámetros ingresados ------------------------------------------------------------------------------------------

//Creo el examen
$exam = new Examen($yaml, $cant, $test, $var);
