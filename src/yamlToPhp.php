<?php

$yaml = Yaml::parseFile('example/preguntas.yml');
$yaml = $yaml['preguntas'];
//Caracteristicas de las evaluaciones segun el usuario ----------------------------
//Pido la cantidad de preguntas para la evaluación
$cant = readline("Ingrese la cantidad de preguntas a contener en la evaluacion: ");
$cant = intval($cant);
if ($cant > count($yaml)) {$cant = count($yaml); }
//Pide la cantidad de test a crear
$test = readline("Ingrese la cantidad de test a crear: ");
$test = intval($test);
//Pregunto si el usuario quiere que las preguntas varien entre los tests
$var = readline("Variar las preguntas entre los tests? (y/n): ");
//Fin de caracteristicas ----------------------------------------------------------




//Achico la cantidad de preguntas necesarias
function reduccion($yaml, $cant) {
	shuffle($yaml);
	return array_slice($yaml, 0, $cant);
}
//Transformo el array en clases 'Pregunta'
function yalmToPregunta($red) {
	$preguntas = [];
	$leng = count($red);
	for ($i = 0; $i < $leng; $i++) {
		$preguntas[$i] = new Pregunta($red[$i]);
	}
	return $preguntas;
}
//Mezcla los tests 
function mezclarTests($preguntas) {
	$leng = count($preguntas);
	for ($i = 0; $i < $leng; $i++) {
			$preguntas[$i]->shuffleAnswers();
	}
	shuffle($preguntas);
	return $preguntas;
}
//Crea los HTML con las preguntas randomizadas sobre el total y mezcladas
function evaluacionesSurtidas($yaml, $cant, $test) {
	for ($i = 1; $i < $test + 1; $i++) {
		$red = reduccion($yaml, $cant);
		$preguntas = yalmToPregunta($red);
		$preguntas = mezclarTests($preguntas);
		CrearEvaluacion($preguntas, $i);
	}
}
//Crea los HTML con las mismas preguntas pero solo cambiadas de lugar
function evaluacionesNoSurtidas($yaml, $cant, $test) {
	$red = reduccion($yaml, $cant);
	for ($i = 1; $i < $test + 1; $i++) {
		$preguntas = yalmToPregunta($red);
		$preguntas = mezclarTests($preguntas);
		CrearEvaluacion($preguntas, $i);
	}
}
if ($var == 'n' || $var == 'N') {
	evaluacionesNoSurtidas($yaml, $cant, $test);
} else {
	evaluacionesSurtidas($yaml, $cant, $test);
}
