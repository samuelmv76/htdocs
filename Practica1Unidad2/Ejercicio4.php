<?php
/*
    Identificar entre dos números aleatorios 
    -cual es el mayor 
    -y si este es par o impar.

    Buscar información previamente para generar números aleatorios y usarla para
    resolver el ejercicio.
*/
$n1=rand(0,1000);
$n2=rand(0,1000);

//echo"Numero 1: $n1 Numero 2: $n2 </br>";

if($n1>$n2){
    echo "$n1 es el mayor </br>";
    if($n1%2==0){
        echo "$n1 es par </br>";
    }else {echo "$n1 es impar </br>";}
}else{
    echo "$n2 es el mayor </br>";
    if($n2%2==0){
        echo "$n2 es par </br>";
    }else {echo "$n2 es impar </br>";}
}
?>