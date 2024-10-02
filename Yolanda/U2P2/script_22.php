<?php
/* Crea un array con los siguientes valores: 5->1, 12->2, 13->56, x->42. Muestra el
contenido. Cuenta el número de elementos que tiene y muéstralo por pantalla. A
continuación borrar el contenido de posición 5. Vuelve a mostrar el contenido y
por último elimina el array.*/
  $x=array(
    5=>1,
    12=>2,
    13=>56,
    "x"=>42
  );
  echo "Array original:<br>";
  print_r($x);
  echo "<br>";
  echo "El array tiene " . count($x) . " elementos";
//   unset($x["5"]);
  array_shift($x);
  echo "<br>";
  echo "Array tras borrar el primer elemento:<br>";
  print_r($x);
  unset($x);
  if (isset($x)) {
    echo "<br>El array no se ha borrado";
  } else {
    echo "<br>El array se ha eliminado";
  }
?>
