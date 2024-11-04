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
// Lista de colores
$colors = ['red', 'blue', 'green', 'yellow'];

// Selección aleatoria de un color
$randomColor = $colors[array_rand($colors)];
?>

<div class="circle" style="background-color: <?php echo $randomColor; ?>;">
    <?php echo ucfirst($randomColor); ?>
</div>

<!-- Formulario para recargar la página y generar un nuevo color -->
<form method="POST">
    <button class="button" type="submit">Generar Color</button>
</form>

</body>
</html>
