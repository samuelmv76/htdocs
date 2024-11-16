<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Adivina el número decimal</h1>
    <h2>El numero en binario es: <?php 
    session_start();
    for ($i=0; $i <4 ; $i++) { 
        $num[$i]=rand(0,1);
    }
    //imprimir los numeros del array
    foreach ($num as $key => $value) {
        echo $value;
    }
  
    ?></h2>
    <?php
        //Calcular, utilizando un segundo vector 
        //que inicializamos con potencias de dos, el número asociado en decimal.
        for ($i=4; $i >= 0; $i--) { 
            $potencias[$i]=2**$i;
        }
        echo $potencias[0];
        echo $potencias[1];
        echo $potencias[2];
        echo $potencias[3];
        //Representación gráfica de las cartas. (1 punto)
        for ($i=3; $i >= 0; $i--) { 
            if($num[$i]==1){
                //pinta la carta
                //echo '<img src="Uno.jpg">';
                //saber que carta pintar
                    //mirar en que potencia esta
                    switch ($potencias[$i]) {
                        case 1:
                            echo '<img src="Uno.jpg">';
                            break;
                            case 2:
                                echo '<img src="dos.jpg">';
                                break;
                                case 4:
                                    echo '<img src="cuatro.jpg">';
                                    break;
                                    case 8:
                                        echo '<img src="ocho.jpg">';
                                        break;
                    }
            }else{
                echo '<img src="blanco.jpg">';
            }
        }
?>     
    <form action="ejercicio21.php" method="post">
        <label for="nombre">Numero decimal: </label>
        <input type="text" id="numdecimal" name="numdecimal" required><br><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>