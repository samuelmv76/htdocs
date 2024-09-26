<?php 
/*
    Dados 2 números asignados dentro del código a variables realizar el siguiente
    cálculo: 
    -si son iguales que los multiplique, 
    -si el primero es mayor que el segundo
    que los reste y si no que los sume. 
    -Mostrar el resultado en pantalla
*/

$n1=1;
$n2=0;

if ($n1=$n2){
    $multi=$n1*$n2;
    echo "Son iguales, se multiplicó el ".$n1." y el ".$n2." resultado: ".$multi;
}
if($n1>$n2){
    $resta=$n1-$n2;
    echo "El primero es mayor que el segundo, resultado de la resta: $resta";
}else{
    $suma=$n1+$n2;
    echo"El primer numero no es mayor que el segundo, resultado de la suma: $suma";
}
//tambien se puede llamar a todas las var de las operaciones de una maenra y luego llamarla una vez
?>