<?php
require 'vendor/autoload.php'; // Asegúrate de que el autoload de Composer esté incluido

try {
    // Conectar a MongoDB
    $mongo_client = new MongoDB\Client("mongodb://localhost:27017");
    $mongo_db = $mongo_client->mi_base_de_datos_gijonCalles; // Cambia el nombre de la base de datos si es necesario
    $mongo_collection = $mongo_db->calles;

    // Leer el archivo JSON
    $json_data = file_get_contents('calles.json');
    $data = json_decode($json_data, true); // Decodificar como array asociativo

    // Verificar que 'calles' y 'calle' sean arrays
    if (isset($data['calles']['calle']) && is_array($data['calles']['calle'])) {
        // Insertar datos en MongoDB
        $mongo_collection->insertMany($data['calles']['calle']);
        echo "Datos insertados en la colección 'calles' con éxito.";
    } else {
        echo "Error: Los datos leídos del archivo JSON no son válidos.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
