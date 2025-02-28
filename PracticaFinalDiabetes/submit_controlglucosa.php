<?php
session_start();
include_once 'conexion.php';
// Redirigir si el usuario no ha iniciado sesión
if (!isset($_SESSION['id_usu'])) {
    header("Location: index.php");
    exit();
}

// Obtener datos del formulario
$fecha = $_POST['fecha'];
$deporte = $_POST['deporte'];
$lenta = $_POST['lenta'];

$id_usu=$_SESSION['id_usu'];

// Insertar en CONTROL_GLUCOSA  
$sql_glucosa = "INSERT INTO control_glucosa (fecha, deporte, lenta, id_usu) 
                VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql_glucosa);
$stmt->bind_param("siii", $fecha, $deporte, $lenta, $id_usu);
$stmt->execute();
//Control de glucosa tiene que ir en otro lado y comida tiene que insertar la fecha

//Un control_GLUCOSA al dia  y 5 comidas al dia ,para insertar en comida se necesita el id de control_glucosa,
//por lo que se debe hacer un select para obtener el id de control_glucosa y luego insertar en comida
//Obtener el id de control_glucosa

// Cerrar conexión
$stmt->close();
$conn->close();

// Redirigir a una página de confirmación
header("Location: success.php");
exit();
?>