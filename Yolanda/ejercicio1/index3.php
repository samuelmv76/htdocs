<?php
$var=1;
for ($i = 0; $i <= 1; $i++) { 
    for ($j = 0; $j <= 2; $j++) { 
        $m[$i][$j]=$var; 
        $var++;
    }
}
echo $m[1][2];
echo "<br>";
var_dump($m);
?>