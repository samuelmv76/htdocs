<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Color Aleatorio</title>
    <style>
        /* Estilos para el círculo */
        .circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            color: white;
            text-align: center;
            margin: 20px auto;
        }
        /* Estilos del botón */
        .button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
session_start(); // Inicia la sesión

// Verificar si el array está disponible en la sesión
if (isset($_SESSION['colores_adivinar'])) {
    $colorAdivinar= $_SESSION['colores_adivinar'] ;
}
    //const negro ="black";
    foreach ($colorAdivinar as $key => $value) {
        echo" key: ".$key." value: ".$value ;       
    }
?>
</body>
</html>