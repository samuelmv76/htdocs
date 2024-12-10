<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
</head>
<body>
    
    <?php
    /*
    session_start();
     require_once 'login.php';
     $conn = new mysqli($hn, $un, $pw, $db);
     if ($conn->connect_error) die("Fatal Error");
     
     if (isset($_POST['submit'])) {
    if (!empty($_POST['usu'])&& !empty($_POST['contra'])) {
        $_SESSION['usu'] = $_POST['usu'];
        $_SESSION['contra']= $_POST['contra'];
        $input_usu=$_SESSION['usu'];        
        $input_contra=$_SESSION['contra'];        
    
     $query = "SELECT nombre,clave FROM usuarios WHERE nombre='$input_usu' AND 
        clave='$input_contra'";
     $result = $conn->query($query);
     if ($result && ($result->num_rows >0)) {
        echo'Se ha inciado sesion correctamente';
        $rows = $result->fetch_assoc(); 
    
        echo '<br>';
        echo '<strong>Usuario: </strong>' . htmlspecialchars($rows['nombre']) . '<br>';
        echo '<strong>Contraseña: </strong>' . htmlspecialchars($rows['clave']) . '<br>';
        echo '<br>';
        echo '<a href="index.php">Volver</a>';
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
*/
?>

<h1>VAMOS A JUGAR AL SIMON!!!!</h1>
<form action ="inicio.php" method ="post">
    <label>Usuario</label>
    <input type="text" name="usu" required>
    <br>
    <label>Contraseña</label>
    <input type="password" name="contra" required>
    <br>
    <button type="submit" name='submit'>Entrar</button>
</form>
<?php
      //$_SESSION['usu'] = $_POST['usu'];
      //$_SESSION['contra']= $_POST['contra'];
      //$input_usu=$_SESSION['usu'];        
      //$input_contra=$_SESSION['contra'];
?>
</body>
</html>