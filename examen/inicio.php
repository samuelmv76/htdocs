<?php
  session_start();
  require_once 'login_correcto.php';
    // Crear conexión
    $connection = new mysqli($hn, $un, $pw, $db);
        $log=$_SESSION['login'];
        $nombreusu = "SELECT nombre FROM jugador WHERE login = '$log'";
        $resultnombreusu = $connection->query($nombreusu);
        if (!$resultnombreusu) die("Fatal Error");
    // Verificar la conexión
    if ($connection->connect_error) die("Fatal Error");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido, <?php 
    if ($resultnombreusu->num_rows > 0){
        while ($row = $resultnombreusu->fetch_assoc()) {
            echo  htmlspecialchars($row['nombre']);
        }
    }
    //echo $_SESSION['login']; ?>
    !</h1>
    <img src="imagen/20241212.jpg" width="400px" height="400px">
    <form action="" method="post">
        <label for="">Solución al jeroglifico: </label>
        <input type="text" name="solucion">
        
        <br>
        <button type="submit" name="submit">Enviar</button>
    </form>
    <br>
        <a href="puntos.php">Ver puntos por jugador</a><br>
        <a href="resultado.php">Resultados del día</a>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $sol=$_POST['solucion'];
    //echo $sol;
    //var_dump($sol);
    //comprobar si la respuesta es correcta en solucion mirar fecha y solucion
    $query = "SELECT fecha,solucion FROM solucion WHERE fecha = '2024-12-12' AND solucion = '$sol' ";
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
    echo '<br>';
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            echo  htmlspecialchars($row['solucion']);//mirar la fila de solucion
        }
    }
    //Grabar correctamente en la BD en respuestas fecha login hora respuesta
    $queryinsert = "INSERT INTO respuestas (fecha,login,hora,respuesta) VALUES ('2024-12-12', '$log', '13:00:00', '$sol')";
    $resultinsert = $connection->query($queryinsert);
    //funcionando
}
    //$query = "INSERT INTO contactos (nombre,email,telefono,codusuario) VALUES ('$nombre', '$email', '$telf', $cod)";
    //$result = $connection->query($query);
    $connection->close();
?>