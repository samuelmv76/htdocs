<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "pictogramasphp";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>