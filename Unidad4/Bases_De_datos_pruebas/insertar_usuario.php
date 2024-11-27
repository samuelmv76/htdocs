<?php // query-mysqli.php
    require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die("Fatal Error");

    $query = "INSERT INTO `usuarios` (`usu`, `contra`, `rol`) VALUES ('serresiete', 'serresiete', 'jugador')"; 
    $result = $connection->query($query);
    
    $connection->close();
    //ir tabla usuarios formulario y guardar en la bd
?> 
