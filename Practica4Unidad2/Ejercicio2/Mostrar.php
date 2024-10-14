<?php
    include 'Vehiculo.php';
        $miVehiculo = new Vehiculo("negro", 1500);
        echo $miVehiculo;
        $miVehiculo->circula();
        $miVehiculo->añadir_persona(70);
        echo $miVehiculo;
?>