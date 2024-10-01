<?php
/* 
    Escriba un programa a partir de un número entero generado de forma aleatoria
    -indique si es primo. 
    Un número primo es aquel que es divisible por el mismo y la unidad.
*/
$n1 = rand(1,20);
//$n1=6;
echo"$n1</br>";
$divisor=0;
 for ($i=2; $i <=($n1/2) ; $i++) { 
     if($n1%$i==0){
         $divisor ++;
     }
     
 }
 if ($divisor!=0){
     echo"No es primo";
 }
 else{
     echo"Es primo";
 }
?>