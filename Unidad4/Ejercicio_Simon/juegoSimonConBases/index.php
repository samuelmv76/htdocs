<?php
require_once 'login.php';
$conn = new mysqli($hn,$un,$pw,$db,3307); 
if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);


if (isset($_POST['usuario']) && isset($_POST['clave']))
{
    $usuario = $_POST['usuario']; 
    $clave = $_POST['clave'];
    $consulta ="SELECT Nombre, Clave FROM usuarios WHERE Nombre='$usuario' AND Clave='$clave'";
    $result = $conn->query($consulta); 
    if (!$result) echo "INSERT failed<br><br>"; 
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //para poder entrar en el juego y que te pinte los circulos directamente
        echo "Bienvenido, " . htmlspecialchars($row['Nombre']) . "!<br>"; 
        session_start();
        $_SESSION['usuario'] = $usuario;
        header ('Location: inicio.php'); 
    } else {
        echo "Usuario o contraseña incorrectos.<br>";
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> VAMOS A JUGAR AL SIMON!!!! </h1>
    <form method="POST" action="index.php">
        Usuario:<br> <input type="text" name="usuario" required><br><br>
        Clave:<br> <input type="password" name="clave" required><br><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>