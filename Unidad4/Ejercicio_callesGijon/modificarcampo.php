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

// Función para modificar un registro específico
function modificarRegistro($mysqli, $id, $nuevo_nombre, $nueva_calle, $nuevo_tipo, $nuevo_numero_accesos) {
    // Consulta para actualizar un registro por ID
    $stmt = $mysqli->prepare("UPDATE calles SET nombre = ?, calle = ?, tipo = ?, numero_accesos = ? WHERE id = ?");
    $stmt->bind_param("sssii", $nuevo_nombre, $nueva_calle, $nuevo_tipo, $nuevo_numero_accesos, $id);

    if ($stmt->execute()) {
        echo "Registro con ID $id modificado con éxito.\n";
    } else {
        echo "Error al modificar el registro: " . $stmt->error . "\n";
    }

    $stmt->close();
}

// Define los valores para modificar el registro
$id_a_modificar = 1; // ID del registro a modificar
$nuevo_nombre = "Juan Actualizado";
$nueva_calle = "Av. Renovada";
$nuevo_tipo = "Avenida";
$nuevo_numero_accesos = 150;

// Llama a la función para modificar el registro
modificarRegistro($mysqli, $id_a_modificar, $nuevo_nombre, $nueva_calle, $nuevo_tipo, $nuevo_numero_accesos);

// Cerrar la conexión
$mysqli->close();
?>
