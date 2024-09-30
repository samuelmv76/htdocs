<?php
    /* 
        Hacer un programa que calcule todos los números primos entre 1 y 50 y los 
        muestre por pantalla. 
        -Un número primo es un número entero que sólo es 
        divisible por 1 y por sí mismo. 
    */
    echo "Numeros primos </br>";
    for ($i = 2; $i <= 50; $i++) {
        $divisores = 0;
        
        for ($j = 1; $j <= $i; $j++) {
            if ($i % $j == 0) {
                $divisores++;
            }
        }
        
        if ($divisores == 2) {
            echo  "$i ";
        }
    }
?>