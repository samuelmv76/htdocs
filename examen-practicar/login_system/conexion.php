<?php
$host = "localhost";
$user = "root";  // Cambia esto si usas otro usuario
$pass = "";  // Cambia esto si tienes una contraseña
$dbname = "login_system";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>