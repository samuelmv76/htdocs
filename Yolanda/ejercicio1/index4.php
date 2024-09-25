<?php
$var=10;
//for ($i = 0; $i <= 1; $i++) { 
    for ($j = 0; $j <= 4; $j++) { 
        $v[$i][$j]=$var; 
        $var+=10;
    }
//}
echo $v[2][4];
echo "<br>";
var_dump($v);
/*bucle array de 5 posiciones cargandolo con un bucle*/
?>