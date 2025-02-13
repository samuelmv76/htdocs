<?php
session_start();
include 'conexion.php';

// Verificar conexión
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger datos del formulario
$usuario = $_POST['usuario'] ?? '';
$contra = $_POST['contra'] ?? '';

if (!empty($usuario) && !empty($contra)) {
    // Consultar el hash de la contraseña almacenada
    $sql = "SELECT id_usu, contra FROM USUARIO WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();
    
    // Verificar si el usuario existe
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_usu, $hashed_password);
        $stmt->fetch();

        // Verificar la contraseña ingresada con la almacenada en la BD
        if (password_verify($contra, $hashed_password)) {
            // Autenticación exitosa
            $_SESSION['id_usu'] = $id_usu;
            header("Location: formularios/formulario.php");
            exit();
        } else {
            echo "Contraseña incorrecta. <a href='index.php'>Inténtalo de nuevo</a>";
        }
    } else {
        echo "Usuario no encontrado. <a href='index.php'>Inténtalo de nuevo</a>";
    }

    $stmt->close();
} else {
    echo "Por favor, completa todos los campos.";
}

// Cerrar conexión
$conn->close();
?>
