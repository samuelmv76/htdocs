<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
    $usu='pepito';            
    $contra='123';

    if(isset($_POST['submit'])){
        //comprobar si es la contraseña y el usuario
        if(($_POST['usuario']==$usu)&&($_POST['contra']==$contra)){
            echo '<h2>Usuario y contraseña correcto</h2>';
        }else{
            echo '<h2>Usuario y contraseña INcorrecto</h2>';
            echo '
                <form  action="prueba.php" method="post">
                    <label for="">Usuario: </label>
                    <input type="text" name="usuario">
                    <br>
                    <br>
                    <label for="">Contraseña: </label>
                    <input type="password" name="contra">
                    <br>
                    
                        <a href="registro.php">Registrarse</a>

                    <button type="submit" name="submit">Entrar</button>
                </form>
            ';
        }
    }
?>
</body>
</html>