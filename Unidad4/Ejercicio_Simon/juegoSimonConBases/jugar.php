<?php
    session_start();
    require_once "pintar-circulos.php";
    

    // if (isset($_SESSION["res1"])) {
        
            
    //  }   
    //  else {
    //     $_SESSION["res1"] = "black";
    //     $_SESSION["res2"] = "black";
    //     $_SESSION["res3"] = "black";
    //     $_SESSION["res4"] = "black";
    // }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
</head>
<body>
    <div class="circulos">
        <?php//  $_SESSION["respuesta"] = pintar_circulos($_SESSION["res1"],$_SESSION["res2"],$_SESSION["res3"],$_SESSION["res4"]); ?>
    </div>
    <?php pintar_circulos('black','black','black','black');?>
    <form action="#" method="post">
        <input type="submit" value="red" name="tempColor">
        <input type="submit" value="green" name="tempColor">
        <input type="submit" value="blue" name="tempColor">
        <input type="submit" value="yellow" name="tempColor">
    </form>
    
    
</body>
</html>