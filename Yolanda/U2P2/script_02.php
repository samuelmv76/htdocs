<?php
/* Crea el código que dé respuesta al siguiente planteamiento:
Queremos almacenar en una matriz el número de alumnos con el que cuenta una
academia, ordenados en función del nivel y del idioma que se estudia. Tendremos
3 filas que representarán al Nivel básico, medio y de perfeccionamiento y 4
columnas en las que figurarán los idiomas (0 = Inglés, 1 = Francés, 2 = Alemán y 3
= Ruso). Mostrar por pantalla los alumnos que existen en cada nivel e idioma.*/
  $alumnos=array(
    'Básico' => array(1,14,8,3),
    'Medio' => array(6,9,7,2),
    'Perfeccionamiento' => array(3,13,4,1),
  );
  foreach ($alumnos as $clave => $valor) {
    echo "Nivel <b>$clave</b>: ";
    echo "Inglés: $valor[0], ";
    echo "Francés: $valor[1], ";
    echo "Alemán: $valor[2], ";
    echo "Ruso: $valor[3]<br>";
  }
?>
