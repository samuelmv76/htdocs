<?php
    include 'Vehiculo.php';
        $miVehiculo = new Vehiculo("verde", 1400);
        $dos_ruedas->añadir_persona(65);
        $dos_ruedas->añadir_persona(65);
        echo"El color del coche es: ".$coche->getColor()."<br>";
        echo"El peso del dos ruedas es: ".$coche->getPeso()."<br>";
        
        $miVehiculo->setColor("rojo");
        $coche->añadir_cadenas_nieve(2);

        echo "Color de el coche: ".$miVehiculo->getColor()." Numero de cadenas: ". $coche->getNumero_cadenas_nieve()."</br>";

        $dos_ruedas = new Dos_ruedas("negro",120);
        $dos_ruedas->poner_gasolina(20);

        echo "Color de el dos ruedas: ".$dos_ruedas->getColor()." Peso: ". $coche->getPeso()."</br>";

        $camion = new Camion("azul",10000);
        $camoin->setLongitud(10);
        $camoin->setNumeroPuertas(2);
        $camoin->añadir_remolque(5);
        $camoin->añadir_persona(80);
        echo"El color del camion es: ".$camion->getColor()."<br>";
        echo"El peso del camion es: ".$camion->getPeso()."<br>";
        echo"El peso del camion es: ".$camion->getNumero_Puertas()."<br>";
         
?>