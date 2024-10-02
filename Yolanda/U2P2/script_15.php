<?php
/* Crea un array con los nombre Pedro, Ismael, Sonia, Clara, Susana, Alfonso y
Teresa. Muestra el número de elementos que contiene y cada elemento en una
lista no numerada de html.*/
  $gente=['Pedro','Ismael','Sonia','Clara','Susana','Alfonso','Teresa'];
  echo "<html>\n<body>\n<ul>\n";
  for ($i=0; $i<count($gente); $i++) {
    echo "<li>$gente[$i]</li>\n";
  }
  echo "</ul>\n</body>\n</html>";
?>
