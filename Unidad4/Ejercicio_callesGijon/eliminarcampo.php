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

// Función para eliminar un registro específico
function eliminarRegistro($mysqli, $id) {
    // Consulta para eliminar un registro por ID
    $stmt = $mysqli->prepare("DELETE FROM calles WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Registro con ID $id eliminado con éxito.\n";
    } else {
        echo "Error al eliminar el registro: " . $stmt->error . "\n";
    }

    $stmt->close();
}

// Elige el ID del registro que deseas eliminar (por ejemplo, 1)
$id_a_eliminar = 1;

// Llama a la función para eliminar el registro
eliminarRegistro($mysqli, $id_a_eliminar);

// Cerrar la conexión
$mysqli->close();
?>
