<?php
session_start();
include_once 'conexion.php';
// Redirigir si el usuario no ha iniciado sesión
if (!isset($_SESSION['id_usu'])) {
    header("Location: index.php");
    exit();
}

// Obtener datos del formulario
$fecha   = $_POST['fecha'];
$deporte = $_POST['deporte'];
$lenta   = $_POST['lenta'];
$id_usu  = $_SESSION['id_usu'];

// Comprobar si ya existe un registro para esa fecha y usuario
$sql_check = "SELECT * FROM control_glucosa WHERE fecha = ? AND id_usu = ? LIMIT 1";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("si", $fecha, $id_usu);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Ya existe un registro para esa fecha, se muestra un error
    echo "Error: Ya existe un registro de control de glucosa para la fecha $fecha.";
    $stmt->close();
    $conn->close();
    exit();
}
$stmt->close();

// Insertar el nuevo registro en control_glucosa  
$sql_glucosa = "INSERT INTO control_glucosa (fecha, deporte, lenta, id_usu) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql_glucosa);
$stmt->bind_param("siii", $fecha, $deporte, $lenta, $id_usu);
$stmt->execute();

// Cerrar conexión
$stmt->close();
$conn->close();

// Redirigir a una página de confirmación
header("Location: success.php");
exit();
?>