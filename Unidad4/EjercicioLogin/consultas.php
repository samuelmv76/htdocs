<?php
 require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die("Fatal Error");



 $query = "SELECT id,rol,usu,contra FROM usuarios";
 $result = $conn->query($query);
 if (!$result) die("Fatal Error");
 $rows = $result->num_rows; 


for ($j = 0; $j < $rows; ++$j) {
    $result->data_seek($j); 
    $row = $result->fetch_assoc(); //usar una variable distinta a la del bucle




    echo '<strong>Id: </strong>' . htmlspecialchars($row['id']).'<br>';
    echo '<strong>Usuario: </strong>' . htmlspecialchars($row['usu']) . '<br>';
    echo '<strong>Contraseña: </strong>' . htmlspecialchars($row['contra']) . '<br>';
    echo '<strong>Rol: </strong>' . htmlspecialchars($row['rol']) . '<br><br>';
    
}
$result->close();
$conn->close();
?> 