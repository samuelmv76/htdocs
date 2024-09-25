<?php
//sumar 10 20 30 40 50 y dividir /5
$v=10;
$sum=0;
for ($i=0; $i<5; $i++){
    $M[$i]=$v;
    $sum+=$M[$i];
    $v+=10;
}
$media=$sum/5;//tambien sirve esto
echo "La media de los valores es: ".($sum/5)."<br>";
//var_dump($M);
?>