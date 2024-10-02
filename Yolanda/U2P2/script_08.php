<?php
/* Hacer un algoritmo que llene una matriz de 10x10 con valores aleatorios y
determine la posición [fila, columna] del número mayor almacenado en la matriz.*/
  for ($i=0; $i<10; $i++) {
    for ($j=0; $j<10; $j++) {
      $matriz[$i][$j]=rand(0,100);
	  echo $matriz[$i][$j]."   ";
    }
	echo '<br>';
    }
  echo "<br>";
  $mayor=$matriz[0][0];
  $fila=1; $col=1;
  for ($i=0; $i<10; $i++) {
    for ($j=0; $j<10; $j++) {
      if ($matriz[$i][$j]>$mayor) {
        $mayor=$matriz[$i][$j];
        $fila=$i+1;
        $col=$j+1;
      }
    }
  }
  echo "El elemento mayor es $mayor y está en la fila $fila y la columna $col";
?>
