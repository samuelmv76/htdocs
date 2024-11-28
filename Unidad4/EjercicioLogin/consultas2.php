<?php
 require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die("Fatal Error");



 $query = "INSERT INTO `usuarios` (`id`, `usu`, `contra`, `rol`) VALUES ('04', 'yolanda', 'yolanda', 'jugador');";
 $result = $conn->query($query);
 if (!$result) 
 die("Fatal Error");
else {
    echo 'Se ha añadido correctamente.';
}
$conn->close();
?> 