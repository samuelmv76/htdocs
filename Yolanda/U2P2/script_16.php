<?php
/* Crea un array llamado “lenguajes_cliente” y otro “lenguajes_servidor”, crea tu
mismo los valores, poniendo índices alfanuméricos a cada valor con tres
elementos cada uno. Junta ambos arrays en uno solo llamado “lenguajes” y
muéstralo por pantalla en una tabla.*/
  $lenguajes_servidor=array(
    'P' => 'PHP',
    'C' => 'CGI',
    'A' => 'ASP'
  );

  $lenguajes_cliente=array(
    'H' => 'HTML',
    'J' => 'JavaScript',
    'CS' => 'CSS'
  );

  $lenguajes=array_merge($lenguajes_cliente,$lenguajes_servidor);

  echo "<html>\n<body>\n";
  echo "<table border='1' cellpadding='5'>\n<tr><th>Clave</th><th>Lenguaje</th></tr>\n";
  foreach ($lenguajes as $clave => $valor) {
    echo "<tr><td>$clave</td><td>$valor</td></tr>\n";
  }
  echo "</table>\n</body>\n</html>";

?>
