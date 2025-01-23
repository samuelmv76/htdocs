<?php
require 'vendor/autoload.php'; // Asegúrate de que el autoload de Composer esté incluido

// Conectar a MySQL
$mysqli = new mysqli("localhost:3307", "root", ""); // Cambia las credenciales según sea necesario

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}

// Crear la base de datos si no existe
$db_creation_query = "CREATE DATABASE IF NOT EXISTS mi_base_de_datos_mysql_calles";
if ($mysqli->query($db_creation_query) === TRUE) {
    echo "Base de datos 'mi_base_de_datos_mysql_calles' creada o ya existe.\n";
} else {
    echo "Error al crear la base de datos: " . $mysqli->error . "\n";
}

// Seleccionar la base de datos
$mysqli->select_db("mi_base_de_datos_mysql_calles");

// Crear la tabla si no existe
$table_creation_query = "
CREATE TABLE IF NOT EXISTS calles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    calle VARCHAR(255),
    tipo VARCHAR(50),
    numero_accesos INT
);";

if ($mysqli->query($table_creation_query) === TRUE) {
    echo "Tabla 'calles' creada o ya existe.\n";
} else {
    echo "Error al crear la tabla: " . $mysqli->error . "\n";
}

// Conectar a MongoDB
$mongo_client = new MongoDB\Client("mongodb://localhost:27017");
$mongo_db = $mongo_client->mi_base_de_datos_gijonCalles; // Cambia el nombre de la base de datos si es necesario
$mongo_collection = $mongo_db->calles;

// Obtener documentos de MongoDB
$calles = $mongo_collection->find();

foreach ($calles as $calle) {
    // Preparar la consulta para insertar en MySQL
    $stmt = $mysqli->prepare("INSERT INTO calles (nombre, calle, tipo, numero_accesos) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $calle['nombre'], $calle['calle'], $calle['tipo'], $calle['nÚmeroaccesos']);

    // Ejecutar la consulta
    if (!$stmt->execute()) {
        echo "Error al insertar: " . $stmt->error . "\n";
    }
}

// Cerrar conexiones
$stmt->close();
$mysqli->close();

echo "Datos exportados con éxito a MySQL.";
?>
