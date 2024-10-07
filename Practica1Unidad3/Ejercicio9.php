<?php
    /*
        Llenar una matriz de 20x20 con valores aleatorios.
        -Sumar las columnas
        -Imprimir la columna que tuvo la máxima suma y la suma de esa columna 
    */
    
    // Rellenamos la matriz con números aleatorios
    for ($i = 0; $i < 20; $i++) {
        for ($j = 0; $j < 20; $j++) {
            $matriz[$i][$j] = rand(0, 10000);
        }
    }
?>