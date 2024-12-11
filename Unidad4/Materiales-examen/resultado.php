<?php
    session_start();
    $pos1=$_POST['x'];
    $pos2=$_POST['y'];
    $combi=$_SESSION['posicion'];
    $numIntentos=$_SESSION['cartasLevantadas'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenid@, <?php echo $_SESSION["login"] ?></h1>
    <br>
    <br>
    <?php
        echo '<h1>Fallo posiciones '.$pos1.' y '.$pos2.' despues de '.$numIntentos.' intentos</h1>';
        echo '<h2>Se le restara 1 punto, asi como '.$numIntentos.' intentos</h2>';
        
        echo '<h1>Puntos por jugador</h1>
            <table>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Puntos
                    </th>
                    <th>
                        Extra
                    </th>
                </tr>
                
                <tr>
                    <td>
                        benja
                    </td>
                    <td>
                        0
                    </td>
                    <td>
                        0
                    </td>
                </tr>
            </table>
        
        ';


        echo $pos1;
        echo $pos2.'<br>';
        foreach ($combi as $key => $value) {
            echo $combi[$key];
        }
        echo '<br>';
        echo $numIntentos;
    ?>
</body>
</html>