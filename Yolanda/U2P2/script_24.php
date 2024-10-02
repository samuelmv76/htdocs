<?php
/*Crea un array llamado deportes e introduce los siguientes valores: futbol,
baloncesto, natación, tenis. Haz el recorrido de la matriz con un for para mostrar
sus valores. A continuación realiza las siguientes operaciones
 - Muestra el total de valores que contiene.
 - Sitúa el puntero en el primer elemento del array y muestra el valor actual, es
decir, donde está situado el puntero actualmente.
 - Avanza una posición y muestra el valor actual.
 - Coloca el puntero en la última posición y muestra su valor.
 - Retrocede una posición y muestra este valor.
 */

  $deportes=['fútbol','baloncesto','natación','tenis'];
  foreach ($deportes as $valor) {
    echo "$valor<br>";
  }
  echo "El array tiene " . count($deportes) . " valores<br>";
  $mode=current($deportes);
  echo "Primer valor del array es '$mode'<br>";
  $mode=next($deportes);
  echo "El siguiente valor del array es '$mode'<br>";
  $mode=end($deportes);
  echo "El último valor del array es '$mode'<br>";
  $mode=prev($deportes);
  echo "El penúltimo valor del array es '$mode'<br>";
?>
