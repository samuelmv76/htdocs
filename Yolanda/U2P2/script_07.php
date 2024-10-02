<?php
/*Cargar una matriz de 3x4 y generar un vector que contenga los valores máximos
de cada fila y otro que contenga los promedios de los mismos. Imprimir ambos
vectores a razón de uno por renglón.*/
  for ($i=0; $i<3; $i++) {
    for ($j=0; $j<4; $j++) {
      $matriz[$i][$j]=rand(0,100);
	   echo $matriz[$i][$j]."   ";
    }
	echo '<br>';
  }
  echo "<br>";
  echo "Valores máximos por fila:<br>";
  $i=0;
  foreach ($matriz as $fila) {
    $x=max($fila);
    $maximos_fila[$i]=$x;
    $suma=0;
    for ($j=0; $j<count($fila); $j++) {
      $suma += $fila[$j];
    }
    $y=$suma/count($fila);
    $promedios_fila[$i]=$y;
    $i++;
    echo "Máximo Fila $i: $x<br>";
    echo "Promedio Fila $i: $y<br>";
  }
  echo "<br>El vector maximos_ fila es:<br>";
  var_dump ($maximos_fila);
  echo "<br>El vector promedios_ fila es:<br>";
  var_dump ($promedios_fila);
?>
