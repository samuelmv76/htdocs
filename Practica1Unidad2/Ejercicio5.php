<?php
    /* 
        Crear un programa partir de 3 valores, a b y c que corresponden a los tres
        coeficientes de una ecuación de segundo grado muestre las soluciones de la
        misma La solución de la ecuación de segundo grado depende del signo de b2-4ac:
        - si b2-4ac es negativo no hay soluciones
        - si es nulo, hay sólo una solución -b/2a
        - si es positivo, hay dos soluciones: (-b+sqrt(b2-4ac))/(2a) y (-bsqrt(
        b2-4ac))/(2a)
    */
    $a=1;
    $b=2;
    $c=-3;

    $ecu=($b*2)-(4*$a*$c);
    if ($ecu<0){
        echo "Es negativo no hay soluciones";
    }
    if ($ecu==0){
        echo "Hay solo una solucion (-b/2a)";
    }
    if($ecu>0){
        $ecu=(-$b+sqrt($b*2-4*$a*$c))/(2*$a);
        echo "resultado 1: $ecu </br>";
        $ecu=(-$b-sqrt($b*2-4*$a*$c))/(2*$a);
        echo "resultado 2: $ecu </br>";
    }
?>