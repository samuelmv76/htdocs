<?php
session_start();
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");

if (isset($_POST['submit'])) {//
    if (!empty($_POST['usu']) && !empty($_POST['contra'])) {
        $_SESSION['usu'] = $_POST['usu'];
        $_SESSION['contra'] = $_POST['contra'];

        $query = "SELECT nombre, clave FROM usuarios WHERE nombre='{$_SESSION['usu']}' AND clave='{$_SESSION['contra']}'";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            echo 'Se ha iniciado sesión correctamente<br>';
            $rows = $result->fetch_assoc();

            echo '<strong>Usuario: </strong>' . htmlspecialchars($rows['nombre']) . '<br>';
            echo '<strong>Contraseña: </strong>' . htmlspecialchars($rows['clave']) . '<br>';
            echo '<a href="index.php">Volver</a><br>';
        } else {
            echo 'Usuario o contraseña incorrectos.<br>';
        }
    } else {
        echo 'Por favor, rellena todos los campos.<br>';
    }
}

$conn->close();
?>
<form action="#" method="post">
    <label>Usuario</label>
    <input type="text" name="usu" required>
    <br>
    <label>Contraseña</label>
    <input type="password" name="contra" required>
    <br>
    <a href="registrobd.php">REGISTRARSE</a>
    <br>
    <button type="submit" name="submit">Entrar</button>
</form>
