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
		
}
