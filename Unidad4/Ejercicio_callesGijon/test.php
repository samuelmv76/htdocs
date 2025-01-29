<?php
require 'vendor/autoload.php'; // Asegúrate de que el autoload de Composer esté incluido

// Conectar a MongoDB (ajusta la URI si es necesario)
try {
    $mongoClient = new MongoDB\Client("mongodb://localhost:27017"); // URI de conexión
    echo "Conexión exitosa a MongoDB!";
} catch (Exception $e) {
    echo "Error al conectar a MongoDB: " . $e->getMessage();
}
?>
