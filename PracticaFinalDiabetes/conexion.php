<?php

$servername = "localhost:3307";
$username = "usuario_standard";
$password = "";
$dbname = "DiabetesDB";

    /*
    Datos de la conexion en local


    Datos de la conexion en 000webhost


$servername = "fdb1028.awardspace.net";
$username = "4591674_bddiabetes";
$password = "zY/Ovddb4x%90/9O";
$dbname = "4591674_bddiabetes";
*/
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>