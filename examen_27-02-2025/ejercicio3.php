<?php
//si no esta set
if(!isset($_POST['submit'])){
    ?>
            <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Ejercicio 3</title>
                    <style>
                        img{
                            height: 50%;
                            width: 50%;
                        }
                    </style>
                </head>
                <body>


                <h2>Ver agenda</h2>
                            <form action="consultaejercicio3.php" method="post">

                                <label for="fecha">Fecha:</label>
                                <input type="date" id="fecha" name="fecha" required><br><br>
                    
                                <label for="persona">Persona:</label>
                                <input type="text" id="persona" name="persona" required><br><br>
                            
                                </br>
                                <input type="submit" name="submit" value="submit"> 
                                <a href="ejercicio1.php">Vuelve al listado</a>
                            </form>
                </body>
                </html>
    <?php
}
//si esta set consulta
include_once "conexion.php";

$nombre=$_POST['persona'];
$fecha=$_POST['fecha'];


/*
$querypersona = "SELECT idpersona,nombre FROM personas WHERE nombre=$nombre";
    $resultadopersona = $conn->query($querypersona);
    if (!$resultadopersona) die("Fatal Error");
*/

$queryagenda = "SELECT idpersona,idimagen,hora FROM agenda WHERE (nombre=$nombre) && (fecha=$fecha)";
    $resultadoagenda = $conn->query($queryagenda);
    if (!$resultadoagenda) die("Fatal Error");
/* idpersona */
$queryimagen = "SELECT imagen FROM imagenes";
    $resultadoimagen = $conn->query($queryimagen);
    if (!$resultadoimagen) die("Fatal Error");
/* */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda del dia</title>
    <style>
        img{
            height: 50%;
            width: 50%;
        }
    </style>
</head>
<body>
    <h2>Agenda del día</h2>
    <?php
            if (!$resultadoagenda) die("Fatal Error");
            echo '<br>';
                if ($resultadoagenda->num_rows > 0) {
                    //echo'<h2>Jugadores acertantes: '.$resultado->num_rows.'</h2>';
                    echo '<table >';

                    echo '<tr>';
                    
                        $cont=0;
                        // Mostrar los datos de cada fila
                        while ($row = $resultadoagenda->fetch_assoc()) {
                            echo '<td> <img src="' . htmlspecialchars($row['imagen']) . '"> '.htmlspecialchars($row['imagen']).' '.htmlspecialchars($row['imagen']).'</td>';
                        }

                    echo '</tr>';
                    echo '</table>';
                } else {
                    echo 'No hay datos disponibles.';
                }
    ?>

</body>
</html>