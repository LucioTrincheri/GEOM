Scrutinizer: [![Build Status](https://scrutinizer-ci.com/g/LucioTrincheri/GEOM/badges/build.png?b=master)](https://scrutinizer-ci.com/g/LucioTrincheri/GEOM/build-status/master)
Coveralls: [![Coverage Status](https://coveralls.io/repos/github/LucioTrincheri/GEOM/badge.svg?branch=master)](https://coveralls.io/github/LucioTrincheri/GEOM?branch=master)
Travis: [![Build Status](https://travis-ci.org/LucioTrincheri/GEOM.svg?branch=master)](https://travis-ci.org/LucioTrincheri/GEOM)

# GEOM

#### Objetivo del Trabajo:
Crear un sistema que genere evaluaciones dado un archivo Yaml con ellas.

#### Características:
- Capacidad de crear múltiples temas
- Mezclar las respuestas, así como la capacidad de utilizar las mismas preguntas en todos los exámenes o utilizar otras distintas
- Cada tema tiene una o más opcioes correctas, siendos opcionales las respuestas "todas las anteriores" y "ninguna de las anteriores".
- Se creará una versión para el alumno y una para el profesor con las respuestas correctas marcadas.

#### Herramientas utilizadas:
- PHP -> Código de opciones, mezclar, reconocer correctas.
- Symfony yaml -> leer archivo yml y convertirlo en un array.
- Twig -> plantilla que dadas las variables (pasadas por PHP) se genera un examen en HTML
- CSS grid -> Grilla del examen.

#### Uso:
Una vez instalado los paquetes requeridos por Composer, ejecutar: php index.php
Es necesaria una versión de PHP 7.2 o superior.
