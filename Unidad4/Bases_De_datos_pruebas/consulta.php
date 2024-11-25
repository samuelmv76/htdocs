<?php // query-mysqli.php
    require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die("Fatal Error");

    $query = "SELECT usu, contra FROM usuarios"; 
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");

    $rows = $result->num_rows;

    for ($j = 0 ; $j < $rows ; ++$j) {
        $row = $result->fetch_assoc();
        //echo 'ID: ' . htmlspecialchars($row['id']) . '<br>';
        echo 'Username: ' . htmlspecialchars($row['usu']) . '<br>';
        echo 'Contra: ' . htmlspecialchars($row['contra']) . '<br>';
        //echo 'Rol: ' . htmlspecialchars($row['rol']) . '<br><br>';
    }

    $result->close();
    $connection->close();
?> 
