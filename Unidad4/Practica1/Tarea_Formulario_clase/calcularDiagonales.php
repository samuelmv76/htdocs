<?php
function suma_elementos($matriz) {
    foreach ($matriz as $fila => $columna) {
        foreach ($columna as $key => $numero) {
            echo "($numero)";
        }
        echo "<br>";
    }

    echo "Diagonal Principal: ";
    $tamano = count($matriz);
    for ($i = 0; $i < $tamano; $i++) {
        $principal = $matriz[$i][$i];
        echo $principal . " ";
    }
    echo "<br>Diagonal Secundaria: ";
    for ($i = 0; $i < $tamano; $i++) {
        $secundaria = $matriz[$i][$tamano - $i - 1];
        echo $secundaria . " ";
    }
}

if (isset($_POST['valores'])) {
    $matriz = $_POST['valores'];
    suma_elementos($matriz);
} else {
    echo "No se recibieron datos. GG.";
}
?>
