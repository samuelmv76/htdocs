<?php
class Operaciones {
    public $num1;
    public $num2;

    public function __construct($num1,$num2)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    function suma(){
        return $this->num2+$this->num1;
    }
    function resta(){
        return $this->num2-$this->num1;
    }
    function multiplicacion(){
        return $this->num2*$this->num1;
    }
    function division(){
        return $this->num2/$this->num1;
    }
    public function __toString() {
        return "Numero1: " . $this->num1 . " Numero2: " . $this->num2 ."</br>";
    }
}

$operar=new Operaciones(50,20);

echo $operar . "<br>";

echo $operar->suma(). "<br>";
echo $operar->resta(). "<br>";
echo $operar->multiplicacion(). "<br>";
echo $operar->division(). "<br>";
?>