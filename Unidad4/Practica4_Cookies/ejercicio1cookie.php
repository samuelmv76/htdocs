<?php
// Comprobar si existe la cookie y establecer el color de fondo
$colorFondo = isset($_COOKIE['color_fondo']) ? $_COOKIE['color_fondo'] : "white";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Color</title>
</head>
<body style="background-color: <?php echo $colorFondo; ?>;">
    <form action="ejercicio1guardarcookie.php" method="post">
        <p>Seleccione de qué color desea que sea la web de ahora en adelante:</p>
        <input type="radio" name="color" value="red" id="rojo">
        <label for="rojo">Rojo</label><br>
        <input type="radio" name="color" value="green" id="verde">
        <label for="verde">Verde</label><br>
        <input type="radio" name="color" value="blue" id="azul">
        <label for="azul">Azul</label><br>
        <button type="submit">Crear cookie</button>
    </form>
</body>
</html>
