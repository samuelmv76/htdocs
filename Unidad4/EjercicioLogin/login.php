<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
    $hn = 'localhost:3307';
    $db = 'bdsimon';
    $un='jugador';           
    $pw='jugador';
    
    if(isset($_POST['submit'])){
        $usuario=$_POST['usuario'];
        $contrasena=$_POST['contra'];
        $connection = new mysqli($hn, $un, $pw, $db);
        if ($connection->connect_error) die("Fatal Error");

        $query = "SELECT usu, contra FROM usuarios
                    WHERE usu = '$usuario'
                    AND contra ='$contrasena'"; 
        $result = $connection->query($query);
        if (!$result) die("Fatal Error");

        $rows = $result->num_rows;
        //si no devuelve nada else
        if ($rows > 0) {
            echo'Usuario correcto <br>';
            for ($j = 0 ; $j < $rows ; ++$j) {
                $row = $result->fetch_assoc();  
                echo 'Username: ' . htmlspecialchars($row['usu']) . '<br>';
                echo 'Contra: ' . htmlspecialchars($row['contra']) . '<br>';
            }
            echo '<a href="index.php">Volver</a>';
            exit;
        } else {
            echo "<p>Usuario o contraseña incorrectos</p>";
            
        }
        $result->close();
        $connection->close();
    }
?>
    <form  action="login.php" method="post">
        <label for="">Usuario: </label>
        <input type="text" name="usuario" required>
        <br>
        <br>
        <label for="">Contraseña: </label>
        <input type="password" name="contra" required>
        <br>
        <a href="registro.php">Registrarse</a>
        <br>
        <button type="submit" name="submit">Entrar</button>
    </form>
</body>
</html>