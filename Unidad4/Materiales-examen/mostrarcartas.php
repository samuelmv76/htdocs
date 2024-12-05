<?php
  session_start();
  $combi=$_SESSION["posicion"];
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
        <input type="submit" value="Levantar carta 1" name="lev">
        <input type="submit" value="Levantar carta 2" name="lev">
        <input type="submit" value="Levantar carta 3" name="lev">
        <input type="submit" value="Levantar carta 4" name="lev">
        <input type="submit" value="Levantar carta 5" name="lev">
        <!--<input type="submit" value="Levantar carta 6" name="lev">-->
        <button type="submit" value=6 name="lev">levantar 6</button>
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
            //$combi[2,5,2,5,3,3] ejemplo
            for ($i=0; $i < 6; $i++) {
                if(isset($_POST['lev'])){
                    $cartalev=$_POST['lev'];
                    var_dump($cartalev);
                         if($cartalev===$i){
                            switch ($combi[$i]) {
                                case 2:
                                    echo '<img src="copas_02.jpg" width="150px" height="200px"> ';
                                    break;
                                    case 3:
                                        echo '<img src="copas_03.jpg" width="150px" height="200px"> ';
                                        break;
                                        case 5:
                                            echo '<img src="copas_03.jpg" width="150px" height="200px"> ';
                                            break;
                            }//fin switch
                        }//fin if
                }//fin isset 
                else{
                    echo '<img src="boca_abajo.jpg" width="150px" height="200px"> ';//pintar 6 cartas negras
                }
            }//fin for
        ?> 
    </div>
</body>
</html>