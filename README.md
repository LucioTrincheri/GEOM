Scrutinizer: [![Build Status](https://scrutinizer-ci.com/g/LucioTrincheri/GEOM/badges/build.png?b=master)](https://scrutinizer-ci.com/g/LucioTrincheri/GEOM/build-status/master)

# GEOM

#### Objetivo del Trabajo:
Recrear el sistema de Dagos para hacer pruebas desde cero.

#### Puntos clave:
- Dada una lista de preguntas generar multiples temas.
- Mezclar preguntas y opciones, guardar las correctas.
- Cada tema tiene una opcion correcta, las opciones "todas" y "ninguna" son opcionales, de haber dos opciones correctas generar una - opcion extra que incluya a ambas.
- Generar dos versiones del examen, la original con la correcta marcada y las de examen para uso del alumno.
- Hacer tests  e incluir coveralls

#### Herramientas:
- PHP -> Codigo de opciones, mezclar, reconocer correctas, interactuar con html
- Symfony yaml -> leer archivo yml y convertirlo en un array
- Twig (dejar para el final) -> escribe una plantilla que se convierte en HTML
- CSS grid -> Para hacer la grilla de la prueba

#### Recordar:
En ips.dagos.info tenemos el material para empezar y otros recursos.
