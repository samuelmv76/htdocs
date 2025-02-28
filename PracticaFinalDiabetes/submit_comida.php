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
$tipo_comida = $_POST['tipo_comida'];
$gl_1h = $_POST['gl_1h'];
$gl_2h = $_POST['gl_2h'];
$raciones = $_POST['raciones'];
$insulina = $_POST['insulina'];
$glucosa_hiper = $_POST['glucosa_hiper'] ?? null;
$hora_hiper = $_POST['hora_hiper'] ?? null;
$correccion = $_POST['correccion'] ?? null;
$glucosa_hipo = $_POST['glucosa_hipo'] ?? null;
$hora_hipo = $_POST['hora_hipo'] ?? null;
$id_usu = $_SESSION['id_usu'];

// Comprobar si el tipo de comida ya existe para ese usuario y fecha
$sql_check = "SELECT id FROM comida WHERE tipo_comida = ? AND fecha = ? AND id_usu = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("ssi", $tipo_comida, $fecha, $id_usu);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    // El tipo de comida ya existe, se muestra un error y se detiene la ejecución
    echo "Error: El tipo de comida ya existe para la fecha indicada.";
    exit();
}
$stmt->close();

// Insertar en COMIDA
$sql_comida = "INSERT INTO comida (tipo_comida, gl_1h, gl_2h, raciones, insulina, fecha, id_usu) 
               VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql_comida);
$stmt->bind_param("siiiisi", $tipo_comida, $gl_1h, $gl_2h, $raciones, $insulina, $fecha, $id_usu);
$stmt->execute();

// Insertar en HIPERGLUCEMIA (si aplica)
if (!empty($glucosa_hiper) && !empty($hora_hiper) && !empty($correccion)) {
    $sql_hiper = "INSERT INTO hiperglucemia (glucosa, hora, correccion, tipo_comida, fecha, id_usu) 
                  VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_hiper);
    $stmt->bind_param("issisi", $glucosa_hiper, $hora_hiper, $correccion, $tipo_comida, $fecha, $id_usu);
    $stmt->execute();
}

// Insertar en HIPOGLUCEMIA (si aplica)
if (!empty($glucosa_hipo) && !empty($hora_hipo)) {
    $sql_hipo = "INSERT INTO hipoglucemia (glucosa, hora, tipo_comida, fecha, id_usu) 
                 VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_hipo);
    $stmt->bind_param("isssi", $glucosa_hipo, $hora_hipo, $tipo_comida, $fecha, $id_usu);
    $stmt->execute();
}

// Cerrar conexión
$stmt->close();
$conn->close();

// Redirigir a una página de confirmación
header("Location: success.php");
exit();
?>
