<?php

function pintar_circulos($col1, $col2, $col3, $col4) {
    echo <<< _END
    <style>
        .circulos {
            display: flex;
        }
        .circulo {
            width: 100px;       
            height: 100px;      
            border-radius: 50%; 
        }
    </style>
    <div class="circulos">
        <div class="circulo" style="background-color: $col1"></div>
        <div class="circulo" style="background-color: $col2"></div>
        <div class="circulo" style="background-color: $col3"></div>
        <div class="circulo" style="background-color: $col4"></div>
    </div>
_END;

    // Devuelve los colores en un arreglo
    $arr = [$col1, $col2, $col3, $col4];
    return $arr;
}

?>