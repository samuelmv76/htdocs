<?php
$servidor = "localhost:3307";
$usuario = "root";
$contrasena = "";

try {
    // Conexión al servidor MySQL
    $conexion = new mysqli($servidor, $usuario, $contrasena);

    // Verificar la conexión
    if ($conexion->connect_error) {
        throw new Exception("Conexión fallida: " . $conexion->connect_error);
    }

    // Crear la base de datos
    $sql_db = "CREATE DATABASE IF NOT EXISTS mi_base_de_datos";
    if ($conexion->query($sql_db) === TRUE) {
        echo "Base de datos creada con éxito.<br>";
    } else {
        throw new Exception("Error creando la base de datos: " . $conexion->error);
    }

    // Seleccionar la base de datos
    $conexion->select_db('mi_base_de_datos');

    // Crear una tabla
    $sql_tabla = "CREATE TABLE IF NOT EXISTS mi_tabla (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL
    )";

    if ($conexion->query($sql_tabla) === TRUE) {
        echo "Tabla creada con éxito.<br>";
    } else {
        throw new Exception("Error creando la tabla: " . $conexion->error);
    }

    // Cerrar la conexión
    $conexion->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
