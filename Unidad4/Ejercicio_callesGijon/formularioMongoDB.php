<?php
require 'vendor/autoload.php'; // Carga el autoload de Composer

// Conexión a MongoDB
$mongo_client = new MongoDB\Client("mongodb://localhost:27017");
$mongo_db = $mongo_client->mi_base_de_datos_gijonCalles; // Cambia el nombre de la base de datos si es necesario
$mongo_collection = $mongo_db->calles;

// Manejo de acciones del formulario
$mensaje = ""; // Para mostrar mensajes al usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; // Obtener el `_id` seleccionado

    if (isset($_POST['eliminar'])) {
        // Acción de eliminar
        $resultado = $mongo_collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

        if ($resultado->getDeletedCount() > 0) {
            $mensaje = "Registro con ID $id eliminado con éxito.";
        } else {
            $mensaje = "Error al eliminar el registro.";
        }
    } elseif (isset($_POST['modificar'])) {
        // Acción de modificar
        $nuevo_nombre = $_POST['nombre'];
        $nueva_calle = $_POST['calle'];
        $nuevo_tipo = $_POST['tipo'];
        $nuevo_numero_accesos = intval($_POST['numero_accesos']);

        $resultado = $mongo_collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($id)],
            ['$set' => [
                'nombre' => $nuevo_nombre,
                'calle' => $nueva_calle,
                'tipo' => $nuevo_tipo,
                'numeroaccesos' => $nuevo_numero_accesos
            ]]
        );

        if ($resultado->getModifiedCount() > 0) {
            $mensaje = "Registro con ID $id modificado con éxito.";
        } else {
            $mensaje = "No se realizaron cambios en el registro.";
        }
    }
}

// Obtener todos los registros para listar
$calles = $mongo_collection->find();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar o Eliminar un Registro en MongoDB</title>
</head>
<body>
    <h1>Modificar o Eliminar un Registro en MongoDB</h1>

    <?php if ($mensaje): ?>
        <p><strong><?php echo $mensaje; ?></strong></p>
    <?php endif; ?>

    <form method="POST">
        <label for="id">Selecciona un ID:</label>
        <select name="id" id="id" required>
            <?php
            // Listar los registros disponibles
            foreach ($calles as $calle) {
                echo "<option value='{$calle['_id']}'>ID {$calle['_id']} - {$calle['nombre']}</option>";
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
