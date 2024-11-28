<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
</head>
<body>
    <?php
    session_start();
     require_once 'login.php';
     $conn = new mysqli($hn, $un, $pw, $db);
     if ($conn->connect_error) die("Fatal Error");
     
     if (isset($_POST['submit'])) {
    if (!empty($_POST['usu'])&& !empty($_POST['contra'])) {
        $_SESSION['usu'] = $_POST['usu'];
        $_SESSION['contra']= $_POST['contra'];
    
    
     $query = "SELECT usu,contra FROM usuarios WHERE usu='$_SESSION['usu']' AND 
     contra='$_SESSION['contra']'";
     $result = $conn->query($query);
     if ($result && ($result->num_rows >0)) {
     echo'Se ha inciado sesion correctamente';
     $rows = $result->fetch_assoc(); 
  
     echo '<br>';
     echo '<strong>Usuario: </strong>' . htmlspecialchars($rows['usu']) . '<br>';
     echo '<strong>Contraseña: </strong>' . htmlspecialchars($rows['contra']) . '<br>';
     echo '<br>';
     echo '<a href="usuaContra.php">Volver</a>';
     exit;
    }
    
    else {

        echo 'Fatal error.';
        echo '<br>';
        echo '<a href="usuaContra.php">Volver</a>';
        exit;
        }
    }


    

    
    $conn->close();
}


    ?>
<form action ="#" method ="post">
<label>Usuario</label>
<input type="text" name="usu" required>
<br>
<label>Contraseña</label>
<input type="password" name="contra" required>
<br>
<a href="registrobd.php">REGISTRARSE</a>
<br>
<button type="submit" name='submit'>Entrar</button>

</form>
</body>
</html>