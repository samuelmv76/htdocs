<?php
    include_once 'Vehiculo.php';
    include_once 'Camion.php';
    include_once 'Coche.php';
    include_once 'Dos_ruedas.php';
    include_once 'Cuatro_ruedas.php';
    /*
    - Cree un coche verde de 2100 kg con 4 puertas en la página mostrar.php. 
    - Añada 2 cadenas para la nieve y una persona de 80 kg. 
    - Cambie el color del coche a azul. 
    - Quite 4 cadenas para la nieve. 
    - Vuelva a pintar el coche en color negro. 
    -Muestre todos los atributos del coche y el número de veces que se cambia 
    el color con el método ver_atributo($objeto). 
    - El nuevo modelo es (los accesos no se representan):
    */
    $coche = new Coche("verde",2100,4);
    $coche->añadir_cadenas_nieve(2);
    $coche->añadir_persona(80);
    $coche->repintar("azul");
    $coche->quitar_cadenas_nieve(4);
    $coche->repintar("negro");
    $coche->ver_atributo($coche);
?>