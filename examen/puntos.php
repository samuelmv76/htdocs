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
    <style>
        div{
            background-color: skyblue;
            
        }
    </style>
</head>
<body>
    <h1>Puntos por jugador</h1>
    <?php
    //mirar que jugadores hacertados en el dia de hoy
    //y jugadores que han fallado
    //tabla login,hora-respuestas 

    $query = "SELECT login,puntos FROM jugador";//
    $result = $connection->query($query);

    if (!$result) die("Fatal Error");
    echo '<br>';
        if ($result->num_rows > 0) {
            echo'<h2>Puntos por jugador</h2>';
            echo '<table border="1" cellspacing="0" cellpadding="5">';
            echo '<tr>';
            echo '<th>Login</th>';
            echo '<th>Puntos</th>';
            echo '<th></th>';
            echo '</tr>';
        
            // Mostrar los datos de cada fila
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['login']) . '</td>';
                echo '<td>' . htmlspecialchars($row['puntos']) . '</td>';
                echo '<td><div class="'.htmlspecialchars($row['puntos']).'"><div></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo 'No hay datos disponibles.';
        }
        ?>
</body>
</html>