<?php
/* Cargar desde teclado una matriz de 4x5 con valores numéricos, determinar fila y
columna del elemento mayor.*/
  for ($i=0; $i<4; $i++) {
    for ($j=0; $j<5; $j++) {
      $matriz[$i][$j]=rand(0,100);
	   echo $matriz[$i][$j]."   ";
    }
	echo '<br>';
  }
  echo "<br>";
  $mayor=$matriz[0][0];
  $fila=1; $col=1;
  for ($i=0; $i<4; $i++) {
    for ($j=0; $j<5; $j++) {
      if ($matriz[$i][$j]>$mayor) {
        $mayor=$matriz[$i][$j];
        $fila=$i+1;
        $col=$j+1;
      }
    }
  }
  echo "El elemento mayor es $mayor y está en la fila $fila y la columna $col";
echo '<br><br>';
  echo "La matriz mostrada con  var_dump es:<br>";
  var_dump($matriz);
?>
