<?php

namespace GEOM;

class Pregunta {
	protected $descripcion;
	protected $respCorrectas = [];
	protected $respIncorrectas = [];
	protected $respuestas = [];
	protected $ocultarTodasAnteriores = false;
	protected $ocultarNingunaAnteriores = false;
	protected $abc = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N'];

	public function __construct($pregunta) {
		$this->descripcion = $pregunta['descripcion'];
		$this->respCorrectas = $pregunta['respuestas_correctas'];
		$this->respIncorrectas = $pregunta['respuestas_incorrectas'];
		$this->respuestas = array_merge($this->respCorrectas, $this->respIncorrectas);
		if (array_key_exists('ocultar_opcion_todas_las_anteriores', $pregunta)) {
					$this->ocultarTodasAnteriores = true;
		}

		if (array_key_exists('ocultar_opcion_ninguna_de_las_anteriores', $pregunta)) {
					$this->ocultarNingunaAnteriores = true;
		}
	}
	//Dada una clase Pregunta, mezcla las respuestas.
	public function shuffleAnswers() {
		shuffle($this->respuestas);
	}
	public function descripcion() {
		return $this->descripcion;
	}
	public function getRespuestas() {
		return $this->respuestas;
	}
	public function todasLasAnt() {
		return $this->ocultarTodasAnteriores;
	}
	public function ningLasAnt() {
		return $this->ocultarNingunaAnteriores;
	}
	public function getCorrectas() {
		$letras = [];
		$excepcion = [];
		$i = 0;
		$size = count($this->respCorrectas);
		for (; $i < $size; $i++) {
			$letras[$i] = $this->abc[array_search($this->respCorrectas[$i], $this->respuestas)];
		}
		if (!$this->ocultarTodasAnteriores && count($this->respIncorrectas) == 0) {
			$excepcion[0] = $this->abc[$i];
			return $excepcion; }
		if (!$this->ocultarTodasAnteriores && !$this->ocultarNingunaAnteriores && count($this->respCorrectas) == 0) {
			$excepcion[0] = $this->abc[count($this->respIncorrectas) + 1];
			return $excepcion; }
		if (!$this->ocultarNingunaAnteriores && count($this->respCorrectas) == 0) {
			$excepcion[0] = $this->abc[count($this->respIncorrectas)];
			return $excepcion; }
		return $letras;
	}
}
