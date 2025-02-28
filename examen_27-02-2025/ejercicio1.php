<?php
    include_once "conexion.php";


    $query = "SELECT imagen,descripcion FROM imagenes";
            $resultado = $conn->query($query);
            if (!$resultado) die("Fatal Error");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        img{
            height: 30%;
            width: 30%;
        }
    </style>
</head>
<body>
<h2>Listado pictogramas</h2>
    <?php
            if (!$resultado) die("Fatal Error");
            echo '<br>';
                if ($resultado->num_rows > 0) {
                    echo '<table >';
                            $cont=0;//contador de el numero de las imagenes
                            //mostrar los datos de cada fila
                            while ($row = $resultado->fetch_assoc()) {
                                echo'<td>';
                                echo '<img src='. htmlspecialchars($row['imagen']).' > </br>'.htmlspecialchars($row['descripcion']).'</br>'.htmlspecialchars($row['imagen']);
                                echo '<td>';
                                $cont++;
                                if ($cont%4==0){
                                    echo '<tr></tr>';//añadir un tr
                                }
                            }

                    echo '</table>';
                } else {
                    echo 'No hay datos disponibles.';
                }
    ?>
</body>
</html>