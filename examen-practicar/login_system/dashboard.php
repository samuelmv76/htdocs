<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Bienvenido, <?php echo $_SESSION["username"]; ?>!</h2>
<a href="logout.php">Cerrar sesión</a>