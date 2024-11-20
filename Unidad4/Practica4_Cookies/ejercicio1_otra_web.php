<?php
// Comprobar si existe la cookie y establecer el color de fondo
$colorFondo = isset($_COOKIE['color_fondo']) ? $_COOKIE['color_fondo'] : "white";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otra Web</title>
</head>
<body style="background-color: <?php echo $colorFondo; ?>;">
    <p>Esta es otra página con el color seleccionado.</p>
    <a href="ejercicio1cookie.php">Volver al formulario</a>
</body>
</html>
