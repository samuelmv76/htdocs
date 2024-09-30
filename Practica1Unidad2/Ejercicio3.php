<?php
    /*
        Determinar la cantidad de dinero que recibirá un trabajador por concepto de las
        horas extras trabajadas en una empresa, sabiendo que cuando las horas de
        trabajo exceden de 40, el resto se consideran horas extras y que estas se pagan al
        doble de una hora normal cuando no exceden de 8; 
        si las horas extras exceden de 8 se pagan las primeras 8 al doble de lo que se pagan las horas normales y el resto
        al triple.
    */
    $horas=30;
    $dinero=0;

    //20€ x h;
    //primeras 40h x1 siguientes 8h x2 resto x3

    if ($horas>=40){
        $horas=$horas-40;
        $dinero=40*20;
        //echo"Dinero 1 $dinero</br>";
        if ($horas>=8){
            $horas=$horas-8;
            $dinero=$dinero+(8*(20*2));
            //echo"Dinero 2 $dinero</br>";
            $dinero=$dinero+($horas*(20*3));
            //echo"Dinero 3 $dinero</br>";
        }
    }
    else{
        $dinero=$horas*20;
    }
    echo "Dinero: $dinero <br>";
?>