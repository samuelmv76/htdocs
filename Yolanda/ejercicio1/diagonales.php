<?php   
    $matriz = array(
        array(1 , 2, 3, 4),
        array(5 , 6, 3, 8),
        array(9 , 2,11,12),
        array(1, 14,15,16)
    );

    //
    $sumaPrincipal = 0;
    $sumaSecundaria = 0;
    $sumaSecundaria2=0;
    var_dump($matriz);
    $p=0;

    /*
    optimizado

     for ($i = 0; $i < 4; $i++) {
        $sumaPrincipal += $matriz[$i][$i];
        $sumaSecundaria += $matriz[$i][count($matriz)-1-$i];
    }
    */

    for ($i = 0; $i < 4; $i++) {
        $sumaPrincipal += $matriz[$i][$i];
        $p++;
    }
    //$cont=count($matriz);
    //4
    for ($i = 3; $i >= 0; $i--) {
        $sumaSecundaria2 += $matriz[$p][$i];
        $p++;
    }
    
    echo "<br>";
    echo "La suma de la diagonal principal es:". $sumaPrincipal;
    //echo " La suma de la diagonal secundaria es: ".$sumaSecundaria;
    echo " La suma de la diagonal secundaria es: ".$sumaSecundaria2;
    echo "<br>";
    echo $matriz[1][3];
?>