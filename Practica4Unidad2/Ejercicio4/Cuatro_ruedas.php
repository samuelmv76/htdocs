<?php
include 'Vehiculo.php';
    class Cuatro_ruedas extends Vehiculo{
        public $numero_puertas;
        /**
         * Get the value of numero_puertas
         */ 
        public function getNumero_puertas()
        {
                return $this->numero_puertas;
        }

        /**
         * Set the value of numero_puertas
         *
         * @return  self
         */ 
        public function setNumero_puertas($numero_puertas)
        {
                $this->numero_puertas = $numero_puertas;

                return $this;
        }
        function repintar($color){
            $this->setColor($color);
        }
    }
?>