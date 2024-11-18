<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio2</title>
</head>
<body>
   <p>Seleccione de que color desea que sea la web de ahora en adelante:</p>
        <form action="ejercicio1cookie.php" method="post">
            <input type="radio" id="rojo" name="rojo">
            <label>rojo</label>
            <input type="radio" id="verde" name="verde">
            <label>verde</label>
            <input type="radio" id="azul" name="azul">
            <label>azul</label>
            <br>
            <input type="submit" name="submit" value="Crear cookie">
            <?php 
                session_start();        
            ?>   
        </form>
</body>
</html>