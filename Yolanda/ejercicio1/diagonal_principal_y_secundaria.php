<?php
function sumarDiagonales($matriz) {
    $sumaPrincipal = 0;
    $sumaSecundaria = 0;
    $tamano = count($matriz);

    for ($i = 0; $i < $tamano; $i++) {
        $sumaPrincipal += $matriz[$i][$i];//principal
        $sumaSecundaria += $matriz[$i][$tamano - $i - 1];//secundaria
    }

    return $sumaPrincipal + $sumaSecundaria;
}

// Ejemplo de uso
$matriz = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

$resultado = sumarDiagonales($matriz);
echo "La suma de las diagonales es: $resultado";
?>