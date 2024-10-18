<?php
    include_once 'Vehiculo.php';
    include_once 'Camion.php';
    include_once 'Coche.php';
    include_once 'Dos_ruedas.php';
    include_once 'Cuatro_ruedas.php';
        $dos_ruedas = new Dos_ruedas("rojo",150);
        $dos_ruedas -> añadir_persona(70);
        echo "El peso de dos ruedas es: ".$dos_ruedas->peso."</br>";
        $dos_ruedas->setColor("verde");
        //$dos_ruedas->repintar("verde");
        $dos_ruedas->setCilindrada(1000);
        $dos_ruedas->ver_atributo($dos_ruedas);
        //Cree un camión blanco de 6000 kg.
        $camion = new Camion("blanco",6000,/*Numero de puertas*/2,/*Longitud*/null);
        
        //Añada una persona de 84 kg. Vuelva a pintarlo, en color azul. Incluya 2 puertas. 
        $camion -> añadir_persona(84);
        $camion->repintar("azul");
        //$camion->setNumero_Puertas(2);
        echo"<br>";
        $camion->ver_atributo($camion);
?>