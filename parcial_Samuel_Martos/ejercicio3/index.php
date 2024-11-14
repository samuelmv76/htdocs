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
        $cont=0;
        
        if(isset($_POST['submit'])){
                //resultado
                $numero_aleatorio=$_SESSION['numero'];
                $tu_num=$_POST['valor'];
                echo '<p>Tu número es: '.$tu_num.'</p>';
                
                if($numero_aleatorio==$tu_num){
                    echo'ENHORABUENA, HAS ACERTADO';
                    echo'Has necesitado '.$cont.' intentos';
                }else{
                    if($numero_aleatorio>$tu_num){
                        echo'<p>Mi número es MAYOR</p>';
                    }else{
                        echo'<p>Mi número es MENOR</p>';
                    }
                    echo '<a href="index.php">Sigue jugando...</a>';
                    $cont++;
                }

        }else{
            $numero=rand(1,100);
            echo '<label for="">Adivina mi número:</label>';
            echo '<input type="text" id="numero" name="valor">';
            $_SESSION['numero']=$numero;
            echo '<br>';
            echo'<button class="button" name="submit" type="submit">Enviar</button>';
        }
        ?>
    </form>
</body>
</html>