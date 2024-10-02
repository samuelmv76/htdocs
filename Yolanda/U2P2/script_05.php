<?php
/* Cargar una matriz de 3x5 con valores numéricos.
a. Imprimir todos los elementos en forma sucesiva tomándolos por fila.
b. Igual al anterior pero por columna*/
  for ($i=0; $i<3; $i++) {
    for ($j=0; $j<5; $j++) {
      $matriz[$i][$j]=rand(0,100);
	  echo $matriz[$i][$j]."   ";
    }
	echo '<br>';
  }
  echo "<br>";
  echo "Por fila<br>";
  foreach ($matriz as $fila) {
    foreach ($fila as $valor) {
      echo "$valor&nbsp;";
    }
  }
  echo "<br>";
  echo "Por columna<br>";
  for ($j=0; $j<5; $j++) {
    for ($i=0; $i<3; $i++) {
      echo $matriz[$i][$j].'&nbsp;';
    }
  }
  echo '<br><br>';
  echo "La matriz mostrada con print_r es:<br>";
  print_r($matriz);
?>
