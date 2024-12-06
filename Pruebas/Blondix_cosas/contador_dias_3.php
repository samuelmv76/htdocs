<?php
// Recoger los días seleccionados
$diasSeleccionados = isset($_POST['dias']) ? $_POST['dias'] : [];

if (empty($diasSeleccionados)) {
    die("No se han seleccionado días.");
}

$totalSeleccionados = 0;
$semanas = count($diasSeleccionados);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Días - Paso 3</title>
</head>
<body>
    <h1>Resumen de selección de días</h1>

    <p>Total de casillas seleccionadas: <?= $totalSeleccionados ?></p>
    <ul>
        <?php foreach ($diasSeleccionados as $semana => $dias): ?>
            <li>
                Semana <?= $semana ?>: <?= count($dias) ?> días seleccionados
            </li>
            <?php
            $totalSeleccionados += count($dias);
            ?>
        <?php endforeach; ?>
    </ul>

    <p>Total general de casillas seleccionadas: <?= $totalSeleccionados ?></p>

    <br>
    <a href="contador_dias_2.php?$semanas=<?= $semanas ?>">Volver al calendario</a>
    <br>
    <a href="contador_dias.html">Volver al formulario inicial</a>
</body>
</html>
