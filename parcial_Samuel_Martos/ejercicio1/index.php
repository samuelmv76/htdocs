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
        if(isset($_POST['calcular'])){
            //validar
            /* 
            if($_POST["valor$i"]>100 || $_POST["valor$i"]<1){
                echo'El valor tiene que estar entre 1 y 100';
            }else{
            */
                //resultado
                for ($i=1; $i < 7; $i++) { 
                    $variable[$i]=$_POST["valor$i"];
                    echo $variable[$i]." = ".decbin($variable[$i])."<br>";
                }   
            //}
        }else{
            for ($i=0; $i < 3; $i++) { echo '<br>';
                for ($j=0; $j <2 ; $j++) { 
                    $cont++;
                        echo '<label for="E.'.$i,$j.'">E.'.$i.",".$j.':</label>';
                        echo '<input type="text" id="numero" name="valor'.$cont.'">';
                    }
            }
            
            echo '<br>';
            echo'<button class="button" name="calcular" type="submit">Calcular</button>';
        }
        ?>
    </form>
</body>
</html>