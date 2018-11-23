<?php

namespace GEOM;

use Symfony\Component\Yaml\Yaml;
use PHPUnit\Framework\TestCase;

class PreguntasTest extends TestCase{

	public function testDescripcion() {
		$yaml = Yaml::parseFile('tests/yamlBase.yml');
		$yaml = $yaml['preguntas'];

		$pregunta = new Pregunta($yaml[0]);
		$this->assertEquals($pregunta->Descripcion(), "Pregunta1 - Respuesta1 correcta");
	}
	
	public function testGetRespuestas() {
		$yaml = Yaml::parseFile('tests/yamlBase.yml');
		$yaml = $yaml['preguntas'];

		$pregunta = new Pregunta($yaml[0]);
		$respuestas = array("Respuesta 1 - Pregunta 1", "Respuesta 2 - Pregunta 1", "Respuesta 3 - Pregunta 1", "Respuesta 4 - Pregunta 1");
		$this->assertEquals($pregunta->getRespuestas(), $respuestas);
	}
    
    public function testGetCorrectas() {
		$yaml = Yaml::parseFile('tests/yamlBase.yml');
		$yaml = $yaml['preguntas'];

		$pregunta = new Pregunta($yaml[0]);
		$respuestas = array("A");
		$this->assertEquals($pregunta->getCorrectas(), $respuestas);
		
		$pregunta = new Pregunta($yaml[2]);
		$respuestas = array("E");
		$this->assertEquals($pregunta->getCorrectas(), $respuestas);
		
		$pregunta = new Pregunta($yaml[1]);
		$respuestas = array("F");
		$this->assertEquals($pregunta->getCorrectas(), $respuestas);

		$pregunta = new Pregunta($yaml[6]);
		$respuestas = array("E");
		$this->assertEquals($pregunta->getCorrectas(), $respuestas);
	}
	
	public function testTodas() {
		$yaml = Yaml::parseFile('tests/yamlBase.yml');
		$yaml = $yaml['preguntas'];

		$pregunta = new Pregunta($yaml[0]);
		$this->assertTrue($pregunta->todasLasAnt());
	}
	
	public function testNinguna() {
		$yaml = Yaml::parseFile('tests/yamlBase.yml');
		$yaml = $yaml['preguntas'];

		$pregunta = new Pregunta($yaml[0]);
		$this->assertFalse($pregunta->ningLasAnt());
	}
	
	public function testNingunaYTodas() {
		$yaml = Yaml::parseFile('tests/yamlBase.yml');
		$yaml = $yaml['preguntas'];

		$pregunta = new Pregunta($yaml[4]);
		$this->assertTrue($pregunta->todasLasAnt());
		$this->assertTrue($pregunta->ningLasAnt());
	}

	public function testShuffle() {
		$yaml = Yaml::parseFile('tests/yamlBase.yml');
		$yaml = $yaml['preguntas'];
		$pregunta1 = new Pregunta($yaml[1]);
		$pregunta2 = new Pregunta($yaml[1]);

		$pregunta1->shuffleAnswers();
		$pregunta2->shuffleAnswers();

		$this->assertFalse((($pregunta1->getRespuestas() === $pregunta2->getRespuestas())));
	}
}




