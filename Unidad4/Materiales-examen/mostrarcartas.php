<?php
    session_start();
    require_once 'pintarCartas.php';

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
        <input type="submit" value="Levantar carta 6" name="lev">
        <br>
        
    </form>
    <form action="comprobaciones.php" method="post">
        <span>Pareja: </span><input type="number" id="x" name="x" required><input type="number" id="y" name="y" required>
        <input type="submit" value="Comprobar">
    </form>
    <div class="cartas">

    </div>
</body>
</html>