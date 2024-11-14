<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <?php
        session_start();
        
        if(!isset($_SESSION['numero'])) {
            $numero=rand(1,100);
            $_SESSION['numero']=$numero;
            $_SESSION['cont']=0;
        }
        
        $numero_aleatorio=$_SESSION['numero'];
        $cont=$_SESSION['cont'];
        
        if(isset($_POST['submit'])) {
            //resultado
            $tu_num=$_POST['valor'];
            echo '<p>Tu número es: '.$tu_num.'</p>';
            
            if($numero_aleatorio==$tu_num) {
                echo'ENHORABUENA, HAS ACERTADO <br>';
                echo'Has necesitado '.$cont.' intentos';
                // Reiniciar el contador de intentos
                $_SESSION['cont']=0;
            } else {
                if($numero_aleatorio>$tu_num) {
                    echo'<p>Mi número es MAYOR</p>';
                } else {
                    echo'<p>Mi número es MENOR</p>';
                }
                echo '<a href="index.php">Sigue jugando...</a>';
                // Incrementar el contador de intentos
                $_SESSION['cont']++;
                $cont=$_SESSION['cont'];
            }
        } else {
            echo '<label for="">Adivina mi número:</label>';
            echo '<input type="text" id="numero" name="valor">';
            echo '<br>';
            echo'<button class="button" name="submit" type="submit">Enviar</button>';
        }
        
        // Mostrar el número de intentos
        echo '<p>Intentos: '.$cont.'</p>';
        ?>
    </form>
</body>
</html>