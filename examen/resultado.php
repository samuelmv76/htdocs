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
    <h1>FECHA:<!--usardate--> <?php 
       echo date('o-m-d');
    ?><!--2024-12-12--></h1>
    <?php
    //mirar que jugadores hacertados en el dia de hoy
    //y jugadores que han fallado
    //tabla login,hora-respuestas 

    $querycorrectos = "SELECT login,hora,respuesta FROM respuestas WHERE fecha='2024-12-12'and respuesta='Que sonada'";//
    $resultcorrectos = $connection->query($querycorrectos);

    if (!$resultcorrectos) die("Fatal Error");
    echo '<br>';
        if ($resultcorrectos->num_rows > 0) {
            echo'<h2>Jugadores acertantes: '.$resultcorrectos->num_rows.'</h2>';
            echo '<table border="1" cellspacing="0" cellpadding="5">';
            echo '<tr>';
            echo '<th>Login</th>';
            echo '<th>Hora</th>';
            echo '</tr>';
        
            // Mostrar los datos de cada fila
            while ($row = $resultcorrectos->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['login']) . '</td>';
                echo '<td>' . htmlspecialchars($row['hora']) . '</td>';
                echo '</tr>';
                //Sumar un punto a cada jugador que haya acertado (2 puntos)
                //conseguir numero de puntos tabla jugador y despues sumarlo
                //NO TERMINADO
                /*    
                    $loginxd=htmlspecialchars($row['login']);   
                    $querysumar = "SELECT login,puntos FROM jugador";//
                    $resultsumar = $connection->query($querysumar);
                    
                    if ($resultcorrectos->num_rows > 0) {
                        while ($row = $resultcorrectos->fetch_assoc()) {
                            htmlspecialchars($row['puntos']);
                        }
                    }
                */
            }
            echo '</table>';
        } else {
            echo 'No hay datos disponibles.';
        }

        $queryINcorrectos = "SELECT login,hora,respuesta FROM respuestas WHERE fecha='2024-12-12'and respuesta!='Que sonada'";//
        $resultINcorrectos = $connection->query($queryINcorrectos);

        if ($resultINcorrectos->num_rows > 0) {
            echo'<h2>Jugadores que han fallado</h2>';
            echo '<table border="1" cellspacing="0" cellpadding="5">';
            echo '<tr>';
            echo '<th>Login</th>';
            echo '<th>Hora</th>';
            echo '</tr>';
        
            // Mostrar los datos de cada fila
            while ($row = $resultINcorrectos->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['login']) . '</td>';
                echo '<td>' . htmlspecialchars($row['hora']) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo 'No hay datos disponibles.';
        }
    ?>
</body>
</html>