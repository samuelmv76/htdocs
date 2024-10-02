<?php
/*Realiza el ejercicio anterior pero con la funicón array_push().*/
  $array1=array("Lagartija","Araña","Perro","Gato","Ratón");
  $array2=array("12","34","45","52","12");
  $array3=array("Sauce","Pino","Naranjo","Chopo","Perro","34");
  print_r($array1);echo "<br>";
  print_r($array2);echo "<br>";
  print_r($array3);echo "<br>";
  $todos=array();
  echo "<br>Fusión de los arrays anteriores:<br>";
  foreach ($array1 as $valor) {
    array_push($todos,$valor);
  }
  foreach ($array2 as $valor) {
    array_push($todos,$valor);
  }
  foreach ($array3 as $valor) {
    array_push($todos,$valor);
  }
  print_r($todos);
?>
