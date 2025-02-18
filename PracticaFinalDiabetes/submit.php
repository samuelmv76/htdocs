<?php
include_once 'conexion.php';

// Obtener datos del formulario
$fecha = $_POST['fecha'];
$deporte = $_POST['deporte'];
$lenta = $_POST['lenta'];
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
$id_usu = 1; // Aquí debes asignar el ID del usuario logueado

// Insertar en CONTROL_GLUCOSA
$sql_glucosa = "INSERT INTO CONTROL_GLUCOSA (fecha, deporte, lenta, id_usu) 
                VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql_glucosa);
$stmt->bind_param("siii", $fecha, $deporte, $lenta, $id_usu);
$stmt->execute();

// Insertar en COMIDA
$sql_comida = "INSERT INTO COMIDA (tipo_comida, gl_1h, gl_2h, raciones, insulina, fecha, id_usu) 
               VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql_comida);
$stmt->bind_param("siiiisi", $tipo_comida, $gl_1h, $gl_2h, $raciones, $insulina, $fecha, $id_usu);
$stmt->execute();

// Insertar en HIPERGLUCEMIA (si aplica)
if (!empty($glucosa_hiper) && !empty($hora_hiper) && !empty($correccion)) {
    $sql_hiper = "INSERT INTO HIPERGLUCEMIA (glucosa, hora, correccion, tipo_comida, fecha, id_usu) 
                  VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_hiper);
    $stmt->bind_param("issisi", $glucosa_hiper, $hora_hiper, $correccion, $tipo_comida, $fecha, $id_usu);
    $stmt->execute();
}

// Insertar en HIPOGLUCEMIA (si aplica)
if (!empty($glucosa_hipo) && !empty($hora_hipo)) {
    $sql_hipo = "INSERT INTO HIPOGLUCEMIA (glucosa, hora, tipo_comida, fecha, id_usu) 
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