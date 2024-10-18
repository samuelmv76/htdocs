<?php
abstract class Vehiculo {
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
    
    abstract function añadir_persona($peso_persona);

    public static  function ver_atributo($objeto){
        /*
        if (isset($objeto)){
            foreach ($objeto as $key => $value) {
                echo "key: ".$key." value: ".$value;
            }  
        }
        */
        $obj=get_object_vars($objeto);
        
        foreach ($obj as $key => $value) {
            echo $key." valor: ".$value."</br>";
        }
        /* 
        return "Color: ".$obj."</br>".
                "Peso: ".$objeto->peso."</br>".
                "Número de puertas: ".$objeto->numero_puertas. "</br>".
                "Cilindrada: ".$objeto->cilindrada."</br>".
                "Longitud: ".$objeto->longitud."</br>".
                "Número de cadenas para la nieve.".$objeto->numero_cadenas_nieve."</br>";
        */
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