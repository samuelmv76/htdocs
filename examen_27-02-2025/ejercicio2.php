<?php
    include_once "conexion.php";

    $query = "SELECT imagen,idimagen,descripcion FROM imagenes";
            $resultado = $conn->query($query);
            if (!$resultado) die("Fatal Error");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <style>
        img{
            height: 30%;
            width: 30%;
        }
    </style>
</head>
<body>

<h2>Añadir datos agenda</h2>
            <form action="insertejercicio2.php" method="post">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required><br><br>
    
                <label for="hora">Hora:</label>
                <input type="time" id="hora" name="hora" required><br><br>
    
                <label for="persona">Persona:</label>
                <input type="text" id="persona" name="persona" required><br><br>

                <?php
                        if (!$resultado) die("Fatal Error");
                        echo '<br>';
                            if ($resultado->num_rows > 0) {
                                echo '<table border="1" cellspacing="0" cellpadding="0">';
                                    echo '<tr>';
                                        $cont=0;//contador de el numero de las imagenes
                                        //mostrar los datos de cada fila
                                        while ($row = $resultado->fetch_assoc()) {
                                            echo'<td>';
                                            echo'<input type="radio" id='.htmlspecialchars($row['idimagen']).' name="boton">';//boton radio
                                            echo '<img src='. htmlspecialchars($row['imagen']).' > </br>'.htmlspecialchars($row['descripcion']).'</br>'.' Imagen: '.htmlspecialchars($row['idimagen']);
                                            echo '<td>';
                                            $cont++;
                                            if ($cont%4==0){
                                                echo '<tr></tr>';//añadir un tr
                                            }
                                        }
                                    echo '</tr>';
                                echo '</table>';
                            } else {
                                echo 'No hay datos disponibles.';
                            }
                ?>
            
            
                </br>
                <input type="submit" name="submit" value="submit"> 
                <a href="ejercicio1.php">Volver al listado</a>
            </form>



</body>
</html>
<?php
        /*
                fecha hora idpersona idimagen
                fecha y hora del formulario y el idimagen
        */
        /* hacer la consulta select Where nombre=$_POST['persona'] y recuperar el idpersona
        if(!isset($_POST['submit'])){
            $nombre=$_POST['persona'];
            $querybuscaridpersona = "SELECT idpersona FROM personas WHERE nombre=$nombre";
            $resultado = $conn->query($querybuscaridpersona);
            if (!$resultadopersona) die("Fatal Error");
            
            if ($resultadopersona->num_rows > 0) {
                    $persona=($row['idpersona']);
            }     //tenemosel id de la persona en $persona   

            $fecha=$_POST['fecha'];
            $hora=$_POST['hora'];
            //idpersona
            $idimagen=$_POST['boton'];

            $sql_insert = "INSERT INTO agenda (fecha, hora, persona, imagen) 
            VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bind_param("ssii", $fecha, $hora, $persona,$imagen);
            $stmt->execute();
    }
    */
?>