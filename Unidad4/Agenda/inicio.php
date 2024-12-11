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
            echo '<style>
            table {
                border: 1px solid black;
                border-collapse: collapse;
                width: 80%;
                text-align: left;
            }
            strong {
                display: block;
                margin: 10px;
            }
            td {
                padding: 15px;
            }
          </style>';

    echo '<h1>AGENDA</h1>';
    echo '<table>';
    echo '<tr><td>';
    echo '<strong>Hola '.htmlspecialchars($rows['nombre']).', ¿cuántos contactos deseas grabar?</strong>';
    echo '<strong>Puedes grabar entre 1 y 5. Por cada pulsación en INCREMENTAR grabarás un usuario más.</strong>';
    echo '<strong>Cuando el número sea el deseado pulsa GRABAR.</strong>';
    echo '</td></tr>';
    echo '</table>';
            /*
                echo '<strong>Usuario: </strong>' . htmlspecialchars($rows['nombre']) . '<br>';
                echo '<strong>Contraseña: </strong>' . htmlspecialchars($rows['clave']) . '<br>';
                echo '<a href="index.php">Volver</a><br>';
            */
        } else {
            echo 'Usuario o contraseña incorrectos.<br>';
        }
    } else {
        echo 'Por favor, rellena todos los campos.<br>';
    }
}

$conn->close();
?>
<!--
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
-->