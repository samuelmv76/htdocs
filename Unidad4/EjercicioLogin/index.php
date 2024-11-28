<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  action="login.php" method="post">
        <label for="">Usuario: </label>
        <input type="text" name="usuario" required>
        <br>
        <br>
        <label for="">Contraseña: </label>
        <input type="password" name="contra" required>
        <br>
        <a href="registro.php">Registrarse</a>
        <br>
        <button type="submit" name="submit">Entrar</button>
    </form>
</body>
</html>