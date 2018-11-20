<?php

namespace GEOM;

use Twig_Environment;
use Twig_Loader_Filesystem;
use Symfony\Component\Yaml\Yaml;
require_once __DIR__.'/../vendor/autoload.php';

class Examen {
	
	public function __construct ($yaml, $cant, $test, $var){
		if ($var == 'n' || $var == 'N') {
			$this->evaluacionesNoSurtidas($yaml, $cant, $test);
		} else {
			$this->evaluacionesSurtidas($yaml, $cant, $test);
		}
	}
	//Achico la cantidad de preguntas necesarias
	public function reduccion($yaml, $cant) {
		shuffle($yaml);
		return array_slice($yaml, 0, $cant);
	}
	//Transformo el array en clases 'Pregunta'
	public function yalmToPregunta($red) {
		$preguntas = [];
		$leng = count($red);
		for ($i = 0; $i < $leng; $i++) {
			$preguntas[$i] = new Pregunta($red[$i]);
		}
		return $preguntas;
	}
	//Mezcla los tests 
	public function mezclarTests($preguntas) {
		$leng = count($preguntas);
		for ($i = 0; $i < $leng; $i++) {
			$preguntas[$i]->shuffleAnswers();
		}
		shuffle($preguntas);
		return $preguntas;
	}
	//Crea los HTML con las preguntas randomizadas sobre el total y mezcladas
	public function evaluacionesSurtidas($yaml, $cant, $test) {
		for ($i = 1; $i < $test + 1; $i++) {
			$red = $this->reduccion($yaml, $cant);
			$preguntas = $this->yalmToPregunta($red);
			$preguntas = $this->mezclarTests($preguntas);
			$this->crearEvaluacion($preguntas, $i);
		}
	}
	//Crea los HTML con las mismas preguntas pero solo cambiadas de lugar
	public function evaluacionesNoSurtidas($yaml, $cant, $test) {
		$red = $this->reduccion($yaml, $cant);
		for ($i = 1; $i < $test + 1; $i++) {
			$preguntas = $this->yalmToPregunta($red);
			$preguntas = $this->mezclarTests($preguntas);
			$this->crearEvaluacion($preguntas, $i);
		}
	}

	public function crearEvaluacion($preguntas, $tema){
		$loader = new Twig_Loader_Filesystem('templates');
		$twig = new Twig_Environment($loader);
		$templateAlumn = $twig->load('alumno.html');
		$templateProf = $twig->load('profesor.html');
		//Render del HTML con las variables
		file_put_contents('exams/EvaluacionTema'.$tema.'.html', $templateAlumn->render(array('preguntas' => $preguntas, 'tema' => $tema)));
		file_put_contents('exams/RespuestasTema'.$tema.'.html', $templateProf->render(array('preguntas' => $preguntas, 'tema' => $tema)));
	}
}
