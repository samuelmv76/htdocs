<?php
include_once 'Vehiculo.php';
    class Dos_ruedas extends Vehiculo{
        public $cilindrada;
        function añadir_persona($peso_persona)
        {
            $this->peso=$peso_persona+2;
        }
        function poner_gasolina($litros){
            $this->setPeso($this->getPeso()+$litros);
        }
    }
?>