<?php
/* Crea un array multidimensional para poder guardar los componentes de dos
familias: “Los Simpson” y “Los Griffin” dentro de cada familia ha de constar el
padre, la madres y los hijos, donde padre, madre e hijos serán los índices y los
índices y los nombres serán los valores. Esta estructura se ha de crear en un solo
array asociativo de tres dimensiones.
Muestra los valores de las dos familias en una lista no numerada.*/
  $gente = array (
    array(
      'Familia' => 'Los Simpson',
      'Padre' => 'Homer',
      'Madre' => 'Marge',
      'Hijos' => array('Bart', 'Lisa' , 'Maggie')
    ),
    array(
      'Familia' => 'Los Griffin',
      'Padre' => 'Peter',
      'Madre' => 'Lois',
      'Hijos' => array('Chris', 'Meg' , 'Stewie')
    )
  );
  echo "<html>\n<body>\n<ul>\n";

  foreach ($gente as $familia) {
    foreach ($familia as $clave => $valor) {
      if ($clave=='Familia') {
        echo "<li>$valor</li>\n<ul>\n";
      } else if ($clave=='Hijos') {
        echo "<li>$clave</li><ul>\n";
        foreach ($valor as $hijos) {
          echo "<li>$hijos</li>\n";
        }
        echo "</ul>\n";
      } else {
        echo "<li>$clave: $valor</li>\n";
      }
    }
    echo "</ul>\n";
  }
  echo "</ul>\n</body>\n</html>";
?>
