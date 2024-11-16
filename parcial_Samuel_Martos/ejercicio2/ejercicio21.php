<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio21</title>
</head>
<body>
<?php
session_start(); // Siempre iniciar la sesión al principio

if (isset($_SESSION['decimalcorrecto'])) {
    $decimalcorrecto = $_SESSION['decimalcorrecto']; // Recuperar el valor correcto
    $numerodecimal = $_POST['numdecimal']; // Valor introducido por el usuario
    // Mostrar los resultados
    //echo "<p>Número introducido por el usuario: $numerodecimal</p>";
    //echo "<p>Número correcto (decimal generado): $decimalcorrecto</p>";

    // Comprobar si el usuario acertó
    if ($numerodecimal == $decimalcorrecto) {
        echo "<p>Respuesta acertada el numero es, $decimalcorrecto</p>";
    } else {
        echo "<p>Has fallado, vuelve a jugar</p>";
    }
    echo '<a href="ejercicio2.php">VOLVER A JUGAR</a>';
} else {
    // Mensaje de error si no se encontró la sesión
    echo "<p>Error: No se pudo recuperar el número correcto. Por favor, regresa a la página anterior.</p>";
}
?>
</body>
</html>