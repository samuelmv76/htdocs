<?php 
session_start();
require_once "pintar-circulos.php";
function color() {
    $nColor = rand(0,3);

 switch ($nColor) {
    case 0:
        $color = "red";
    break;
    case 1:
        $color = "yellow";
    break;
    case 2:
        $color = "blue";
    break;
    case 3:
        $color = "green";
    break;

    
 }
 return $color;
}
 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
</head>
<body>
    <h1> SIMON </h1>
    <?php  echo "Hola ". $_SESSION['usuario']. " memoriza la combinacion." ;?>
    <br>
    <div class="circulos">
    <?php $_SESSION["solucion"] = pintar_circulos(color(),color(),color(),color());?>
    </div>
    <br>
    <form action="jugar.php" method="post">
        
        <input type="submit" value="Jugar" name="submit">
    </form>
    
</body>
</html>