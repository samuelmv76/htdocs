<?php
/* Llenar una matriz de 20x20 con valores aleatorios. Sumar las columnas e
imprimir la columna que tuvo la máxima suma y la suma de esa columna.*/
  for ($i=0; $i<20; $i++) {
    for ($j=0; $j<20; $j++) {
      $matriz[$i][$j]=rand(0,100);
    }
  }
  
echo "Suma de las columnas: ";
//inicializamos los contadores
  $mayor_suma=0;
  $columna=1;
  
//Recorrer columnas
  for ($j=0; $j<20; $j++) {
    $suma=0;
    for ($i=0; $i<20; $i++) {
      $suma += $matriz[$i][$j];
    }
    echo "$suma&nbsp;";
    $sumas[$j]=$suma;
    if ($suma>$mayor_suma) {
      $mayor_suma=$suma;
      $columna=$j+1;
    }
  }
  echo "<br>La columna con la máxima suma es la $columna y su suma es $mayor_suma";
?>
