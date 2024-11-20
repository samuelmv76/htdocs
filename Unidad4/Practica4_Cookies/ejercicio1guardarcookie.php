<?php
if (isset($_POST['color'])) {
    // Guardar el color seleccionado en una cookie
    $color = $_POST['color'];
    setcookie('color_fondo', $color, time() + (86400 * 30), "/"); // La cookie dura 30 días
    echo "Se crea la cookie.<br>";
    echo '<a href="ejercicio1_otra_web.php">Ir a la otra web</a>';
} else {
    echo "No se seleccionó ningún color.<br>";
    echo '<a href="formulario.php">Volver al formulario</a>';
}
?>
