<?php
session_start();
include_once 'conexion.php';

// Redirigir si el usuario no ha iniciado sesión
if (!isset($_SESSION['id_usu'])) {
    header("Location: index.php");
    exit();
}

// Obtener y limpiar los datos del formulario
$fecha         = trim($_POST['fecha']);
$tipo_comida   = strtoupper(trim($_POST['tipo_comida'])); // Forzamos a mayúsculas para consistencia
$gl_1h         = $_POST['gl_1h'];
$gl_2h         = $_POST['gl_2h'];
$raciones      = $_POST['raciones'];
$insulina      = $_POST['insulina'];
$glucosa_hiper = isset($_POST['glucosa_hiper']) ? trim($_POST['glucosa_hiper']) : null;
$hora_hiper    = isset($_POST['hora_hiper']) ? trim($_POST['hora_hiper']) : null;
$correccion    = isset($_POST['correccion']) ? trim($_POST['correccion']) : null;
$glucosa_hipo  = isset($_POST['glucosa_hipo']) ? trim($_POST['glucosa_hipo']) : null;
$hora_hipo     = isset($_POST['hora_hipo']) ? trim($_POST['hora_hipo']) : null;
$id_usu        = $_SESSION['id_usu'];

// 1) Comprobar si ya existe un registro en COMIDA para el mismo tipo, fecha y usuario
$sql_check = "SELECT tipo_comida FROM comida WHERE tipo_comida = ? AND fecha = ? AND id_usu = ? LIMIT 1";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("ssi", $tipo_comida, $fecha, $id_usu);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    echo "Error: El tipo de comida '$tipo_comida' ya existe para la fecha '$fecha'.";
    $stmt->close();
    $conn->close();
    exit();
}
$stmt->close();

// 2) Insertar en COMIDA (tabla padre)
$sql_comida = "INSERT INTO comida (tipo_comida, gl_1h, gl_2h, raciones, insulina, fecha, id_usu) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql_comida);
$stmt->bind_param("siiiisi", $tipo_comida, $gl_1h, $gl_2h, $raciones, $insulina, $fecha, $id_usu);
if (!$stmt->execute()) {
    echo "Error al insertar en COMIDA: " . $stmt->error;
    exit();
}
$stmt->close();

// 3) Insertar en HIPERGLUCEMIA (si aplica)
// Se valida con isset() y comprobamos que los valores no sean cadenas vacías, permitiendo el valor 0.
if ((isset($glucosa_hiper) && $glucosa_hiper !== '') &&
    (isset($hora_hiper) && $hora_hiper !== '') &&
    (isset($correccion) && $correccion !== '')) {
    
    $sql_hiper = "INSERT INTO hiperglucemia (glucosa, hora, correccion, tipo_comida, fecha, id_usu) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_hiper);
    $stmt->bind_param("issisi", $glucosa_hiper, $hora_hiper, $correccion, $tipo_comida, $fecha, $id_usu);
    if (!$stmt->execute()) {
        echo "Error al insertar en HIPERGLUCEMIA: " . $stmt->error;
        exit();
    }
    $stmt->close();
}

// 4) Insertar en HIPOGLUCEMIA (si aplica)
if ((isset($glucosa_hipo) && $glucosa_hipo !== '') &&
    (isset($hora_hipo) && $hora_hipo !== '')) {
    
    $sql_hipo = "INSERT INTO hipoglucemia (glucosa, hora, tipo_comida, fecha, id_usu) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_hipo);
    $stmt->bind_param("isssi", $glucosa_hipo, $hora_hipo, $tipo_comida, $fecha, $id_usu);
    if (!$stmt->execute()) {
        echo "Error al insertar en HIPOGLUCEMIA: " . $stmt->error;
        exit();
    }
    $stmt->close();
}

$conn->close();

// Redirigir a la página de confirmación
header("Location: success.php");
exit();
?>
