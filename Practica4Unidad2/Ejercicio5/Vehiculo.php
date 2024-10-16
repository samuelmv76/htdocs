<?php
class Vehiculo {
    public $color;
    public $peso;

    public function __construct($color,$peso)
    {
        $this->color = $color;
        $this->peso = $peso;
    }

    public function circula() {
        echo "El vehículo circula</br>";
    }
    function añadir_persona($peso_persona) {
        $this->peso+=$peso_persona;
        echo"Se sube una persona</br>";
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of peso
     */ 
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set the value of peso
     *
     * @return  self
     */ 
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }
    public function __toString() {
        return "Color " . $this->color . " Peso: " . $this->peso . " kg.</br>";
    }
}
?>