<?php
include_once 'Cuatro_ruedas.php';
    class Coche extends Cuatro_ruedas{
        public $numero_cadenas_nieve;

        /**
         * Get the value of numero_cadenas_nieve
         */ 
        public function getNumero_cadenas_nieve()
        {
                return $this->numero_cadenas_nieve;
        }

        /**
         * Set the value of numero_cadenas_nieve
         *
         * @return  self
         */ 
        public function setNumero_cadenas_nieve($numero_cadenas_nieve)
        {
                $this->numero_cadenas_nieve = $numero_cadenas_nieve;

                return $this;
        }

        function añadir_cadenas_nieve($num){
            $this->numero_cadenas_nieve+=$num;
        }
        function quitar_cadenas_nieve($num){
            if (($this->numero_cadenas_nieve-$num)<0)
            {
                $this->numero_cadenas_nieve=0;
            }else{
                $this->numero_cadenas_nieve-=$num;
            }
        }

    }
?>