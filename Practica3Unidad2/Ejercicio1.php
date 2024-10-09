<?php
/*
Crea una función para resolver la ecuación de segundo grado. Esta función recibe
los coeficientes de la ecuación y devuelve un array con las soluciones. Si no hay
soluciones reales, devuelve FALSE.
*/
function ecuacion($a,$b,$c) {
    /*
        $a=1;
        $b=2;
        $c=-3; 
    */
    $ecu=($b*2)-(4*$a*$c);
    
    if ($ecu<0){
        return false;
    }
    if ($ecu==0){
        //echo "Hay solo una solucion (-b/2a)";
        $respu="Hay solo una solucion (-b/2a)";
    }
    if($ecu>0){
        $respu=array();
        $ecu=(-$b+sqrt($b*2-4*$a*$c))/(2*$a);
        //echo "resultado 1: $ecu </br>";
        $respu[0]=$ecu;
        $ecu=(-$b-sqrt($b*2-4*$a*$c))/(2*$a);
        //echo "resultado 2: $ecu </br>";
        $respu[1]=$ecu;
    }
    return $respu;
}

echo "Primer resultado: ",ecuacion(1,2,-3)[0],"</br>","Segundo resultado: ", ecuacion(1,2,-3)[1];
?>