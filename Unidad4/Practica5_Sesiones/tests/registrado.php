<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['submit'])){
        if($_POST['contra']==$_POST['contra2']){
        echo'    <h2>Se ha registrado correctamente</h2>
    <br>
    <a href="acceso.php">Acceder</a>
        ';}else{
            echo'    <h2>NO Se ha registrado correctamente</h2>
    <br>
    <a href="acceso.php">Acceder</a>';
        }
    }

    ?>

</body>
</html>