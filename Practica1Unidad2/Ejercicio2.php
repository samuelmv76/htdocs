<?php 
/*
    Dados 3 números asignados dentro del código a mostrar el número mayor de los tres
*/
$n1=3;
$n2=16;
$n3=2;

    if ($n1 >= $n2 && $n1 >= $n3) {
        $mayor = $n1;
    } elseif ($n2 >= $n1 && $n2 >= $n3) {
        $mayor = $n2;
    } else {
        $mayor = $n3;
    }

echo "El número mayor es: $mayor <br>";
?>