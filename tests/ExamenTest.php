<?php

namespace GEOM;

use Symfony\Component\Yaml\Yaml;
use PHPUnit\Framework\TestCase;

class ExamenTest extends TestCase{
		
	public function testConstruir() {
		$yaml = Yaml::parseFile('tests/yamlBase.yml');
		$yaml = $yaml['preguntas'];
		
		$cant = 1;
		$test = 1;
		$var = "N";
		$var2 = "Y";
		
		$exam = new Examen($yaml, $cant, $test, $var);
		$this->assertTrue(isset($exam));

		$exam = new Examen($yaml, $cant, $test, $var2);
		$this->assertTrue(isset($exam));
    }
	
	public function testReduccion() {
		$yaml = Yaml::parseFile('tests/yamlBase.yml');
		$yaml = $yaml['preguntas'];
		
		$cant = 1;
		$test = 1;
		$var = "N";
		
		$exam = new Examen($yaml, $cant, $test, $var);
		
		$cant = 3;
		
		$this->assertEquals(count($exam->reduccion($yaml, $cant)), 3);
    }

	public function testYamlToPreg() {
		$yaml = Yaml::parseFile('tests/yamlBase.yml');
		$yaml = $yaml['preguntas'];
		
		$cant = 1;
		$test = 1;
		$var = "N";
		
		$exam = new Examen($yaml, $cant, $test, $var);
        
        $cant = 3;
        $red = $exam->reduccion($yaml, $cant);

		$preguntas = $exam->yalmToPregunta($red);
        
        $this->assertTrue($preguntas[0] instanceof Pregunta);
    }

	public function testMezclarExam() {
		$yaml = Yaml::parseFile('tests/yamlBase.yml');
		$yaml = $yaml['preguntas'];
		
		$cant = 6;
		$test = 1;
		$var = "N";
		
		$exam = new Examen($yaml, $cant, $test, $var);
        $red = $exam->reduccion($yaml, $cant);

		$preguntasSurt = $exam->yalmToPregunta($red);
		$preguntasNorm = $exam->yalmToPregunta($red);
        
		$preguntasSurt = $exam->mezclarTests($preguntasSurt);

        $this->assertFalse($preguntasSurt === $preguntasNorm);
    }	

}
