<?php
/* Cargar desde teclado una matriz de 4x4 con números enteros desordenados
imprimir en un renglón los elementos almacenados en la diagonal principal y en
el siguiente los de la diagonal secundaria.*/
  $n=4;
  echo "La matriz cargada es:<br>";
  for ($i=0; $i<$n; $i++) {
    for ($j=0; $j<$n; $j++) {
      $matriz[$i][$j]=rand(0,9);
	  echo $matriz[$i][$j]."   ";
    }
	echo '<br>';
  }
  //Diagonal principal
  echo "Elementos diagonal principal<br>";
  for ($i=0; $i<$n; $i++) {
    echo $matriz[$i][$i]."   ";
  }
  echo "<br>";
  
  //Diagonal secundaria
  echo "Elementos diagonal secundaria<br>";
  for ($i=0; $i<$n; $i++) {
    echo $matriz[$i][$n-$i-1]."   ";
  }
  echo "<br>";
  echo "La matriz mostrada con var_dump es:<br>";
  var_dump($matriz);
?>
