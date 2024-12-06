<?php

// Obtener el número de semanas desde el formulario
$semanas = isset($_POST['semanas']) ? (int)$_POST['semanas'] : 5;

// $semanas2=$_POST['semanas'];
// var_dump($semanas2);

// Validar si el número de semanas es válido
if ($semanas < 1 || $semanas > 20) {
    die("Número de semanas no válido.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Días - Paso 2</title>
</head>
<body>
    <h1>Selecciona los días</h1>
    <form action="contador_dias_3.php" method="POST">
        <table border="1">
            <thead>
                <tr>
                    <th>Semana</th>
                    <th>Días</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 1; $i <= $semanas; $i++): ?>
                    <tr>
                        <td>Semana <?= $i ?></td>
                        <td>
                            <input type="checkbox" name="dias[<?= $i ?>][]" value="Lunes"> Lunes
                            <input type="checkbox" name="dias[<?= $i ?>][]" value="Martes"> Martes
                            <input type="checkbox" name="dias[<?= $i ?>][]" value="Miércoles"> Miércoles
                            <input type="checkbox" name="dias[<?= $i ?>][]" value="Jueves"> Jueves
                            <input type="checkbox" name="dias[<?= $i ?>][]" value="Viernes"> Viernes
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <br>
        <input type="submit" value="Enviar">
        <input type="button" value="Borrar" onclick="document.querySelectorAll('input[type=checkbox]').forEach(cb => cb.checked = false)">
    </form>
    <br>
    <a href="contador_dias.html">Volver al formulario inicial</a>
</body>
</html>
