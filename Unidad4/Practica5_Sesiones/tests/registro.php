<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form  action="registrado.php" method="post">
        <label for="">Usuario: </label>
        <input type="text" name="usuario">
        <br>
        <br>
        <label for="">Contraseña: </label>
        <input type="password" name="contra" required>
        <br>
        <label for="">Confirmar contraseña: </label>
        <input type="password" name="contra2" required>
        <br>
        <label for="">ROL: </label><br>
            <input type="radio" name="estandar">
            <label for="">Estandar</label>
            <input type="radio" name="estandar">
            <label for=""> Premiun</label><br>
        <button type="submit" name="submit">Registrarse</button>
    </form>
</body>
</html>