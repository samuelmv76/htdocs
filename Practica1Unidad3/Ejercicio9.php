<?php
    /*
        Llenar una matriz de 20x20 con valores aleatorios.
        -Sumar las columnas
        -Imprimir la columna que tuvo la máxima suma y la suma de esa columna 
    */
    // Rellenamos la matriz con números aleatorios
    for ($i = 0; $i < 20; $i++) {
        $sumaColumnas[$i]=0;
        for ($j = 0; $j < 20; $j++) {
            $matriz[$i][$j] = rand(0, 100);
        }
    }
    //VISUALIZAR FILAS
    echo"a) FILAS:🐐";
    echo "</br>";
    for ($i = 0; $i < 20; $i++) {
        for ($j = 0; $j < 20; $j++) {
            echo "(" . $matriz[$i][$j] . ")";
        }
        echo"</br>";
    }
    $columnaMayor=0;
    //SUMAR COLUMNAS
     echo "</br>";
     for ($i = 0; $i < 20; $i++) {
         echo" ";
         for ($j = 0; $j < 20; $j++) {
            $sumaColumnas[$i]=$sumaColumnas[$i]+$matriz[$j][$i];
         }
         // IMPRIMIR TODAS LAS COLUMNAS 
         echo"Suma de la columna ".$i.": ".$sumaColumnas[$i]."</br>";
        /*
            if($sumaColumnas[$i]>$columnaMayor){
                $columnaMayor+=$sumaColumnas[$i];
            }
        */
   }     
   echo $columnaMayor;
?>