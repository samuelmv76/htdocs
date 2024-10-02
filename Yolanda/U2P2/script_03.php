<?php
/* Almacena en un array los 10 primeros números pares. Imprímelos cada uno en
una línea.*/
  for ($i=0; $i<10; $i+=1) {
    $x[$i]=$i*2+2;
  }
  foreach ($x as $indice=>$valor) {
    echo "En la posicion $indice tengo $valor<br />";
  }
?>
