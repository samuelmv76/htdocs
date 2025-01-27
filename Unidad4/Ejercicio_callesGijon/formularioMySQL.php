<?php
require 'vendor/autoload.php'; // Asegúrate de que el autoload de Composer esté incluido

// Conectar a MySQL
$mysqli = new mysqli("localhost:3307", "root", ""); // Cambia las credenciales según sea necesario

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}

// Seleccionar la base de datos
$mysqli->select_db("mi_base_de_datos_mysql_calles");

// Manejar acciones del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['eliminar'])) {
        // Eliminar el registro seleccionado
        $id = intval($_POST['id']);
        $stmt = $mysqli->prepare("DELETE FROM calles WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Registro con ID $id eliminado con éxito.<br>";
        } else {
            echo "Error al eliminar el registro: " . $stmt->error . "<br>";
        }
        $stmt->close();
    } elseif (isset($_POST['modificar'])) {
        // Modificar el registro seleccionado
        $id = intval($_POST['id']);
        $nuevo_nombre = $_POST['nombre'];
        $nueva_calle = $_POST['calle'];
        $nuevo_tipo = $_POST['tipo'];
        $nuevo_numero_accesos = intval($_POST['numero_accesos']);
        
        $stmt = $mysqli->prepare("UPDATE calles SET nombre = ?, calle = ?, tipo = ?, numero_accesos = ? WHERE id = ?");
        $stmt->bind_param("sssii", $nuevo_nombre, $nueva_calle, $nuevo_tipo, $nuevo_numero_accesos, $id);
        if ($stmt->execute()) {
            echo "Registro con ID $id modificado con éxito.<br>";
        } else {
            echo "Error al modificar el registro: " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
}

// Obtener todos los registros de la tabla
$resultado = $mysqli->query("SELECT * FROM calles");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Modificar y Eliminar</title>
</head>
<body>
    <h1>Modificar o Eliminar Registros</h1>
    <form method="POST">
        <label for="id">Selecciona un ID:</label>
        <select name="id" id="id" required>
            <?php
            // Rellenar el select con los IDs disponibles
            while ($fila = $resultado->fetch_assoc()) {
                echo "<option value='{$fila['id']}'>ID {$fila['id']} - {$fila['nombre']}</option>";
            }
            ?>
        </select>
        <br><br>

        <h2>Modificar Registro</h2>
        <label for="nombre">Nuevo Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="calle">Nueva Calle:</label>
        <input type="text" name="calle" id="calle" required>
        <br>
        <label for="tipo">Nuevo Tipo:</label>
        <input type="text" name="tipo" id="tipo" required>
        <br>
        <label for="numero_accesos">Nuevo Número de Accesos:</label>
        <input type="number" name="numero_accesos" id="numero_accesos" required>
        <br><br>
        <button type="submit" name="modificar">Modificar</button>
        <br><br>

        <h2>Eliminar Registro</h2>
        <button type="submit" name="eliminar" style="color: red;">Eliminar</button>
    </form>
</body>
</html>

<?php
// Cerrar la conexión
$mysqli->close();
?>
