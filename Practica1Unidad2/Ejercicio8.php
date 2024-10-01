<?php
/* 
    Calcular si un número entero generado de forma aleatoria entre 1 y 1000 es
    perfecto. 
    Un número perfecto es aquel que la suma de sus divisores es él mismo,
    por ejemplo el 6, sus divisores son 1,2,3 la suma de los mismos es 6.
*/
   $n1 = rand(1,1000);
   //$n1=6;
   echo"$n1</br>";
   $suma=0;
    for ($i=1; $i <=($n1/2) ; $i++) { 
        if($n1%$i==0){
            $suma += $i;
        }
        
    }
    if ($n1==$suma){
        echo"es perfecto";
    }
    else{
        echo"no es perfecto";
    }
?>