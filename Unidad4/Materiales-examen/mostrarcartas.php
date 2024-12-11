<?php
  session_start();
  $combi = $_SESSION["posicion"];
  var_dump($combi);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenid@, <?php echo $_SESSION["login"] ?></h1>
    <form action="#" method="post">
        <label>Cartas levantadas: </label>
        <input type="number" id="cLevantada" name="cLevantada" disabled><br>

        <button type="submit" name="lev" value="0">Levantar carta 1</button>
        <button type="submit" name="lev" value="1">Levantar carta 2</button>
        <button type="submit" name="lev" value="2">Levantar carta 3</button>
        <button type="submit" name="lev" value="3">Levantar carta 4</button>
        <button type="submit" name="lev" value="4">Levantar carta 5</button>
        <button type="submit" name="lev" value="5">Levantar carta 6</button>
        <br>
    </form>

    <form action="comprobaciones.php" method="post">
        <h2><span>Pareja: </span>
        <input type="number" id="x" name="x" required>
        <input type="number" id="y" name="y" required>
        <input type="submit" value="Comprobar">
        </h2>
    </form>

    <div class="cartas">
        <?php
            // Array de ejemplo para $combi: [2, 5, 2, 5, 3, 3]
            $cartalev = isset($_POST['lev']) ? intval($_POST['lev']) : null;//ternario si existe $_POST lev intval postlev si no null
            for ($i = 0; $i < 6; $i++) {
                if ($cartalev === $i) {
                    switch ($combi[$i]) {
                        case 2:
                            echo '<img src="copas_02.jpg" width="150px" height="200px"> ';
                            break;
                        case 3:
                            echo '<img src="copas_03.jpg" width="150px" height="200px"> ';
                            break;
                        case 5:
                            echo '<img src="copas_05.jpg" width="150px" height="200px"> ';
                            break;
                        default:
                            echo '<img src="carta_invalida.jpg" width="150px" height="200px"> ';
                            break;
                    }
                } else {
                    echo '<img src="boca_abajo.jpg" width="150px" height="200px"> ';
                }
            }
        ?>
    </div>
</body>
</html>