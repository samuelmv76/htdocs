<?php
session_start();

// Redirigir si el usuario no ha iniciado sesión
if (!isset($_SESSION['id_usu'])) {
    header("Location: index.php");
    exit();
}

// Obtener iniciales del usuario (2 primeras letras en mayúsculas)
$usuario = $_SESSION['usuario'];
$iniciales = strtoupper(substr($usuario, 0, 2));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulación de Diabetes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-group { margin-bottom: 0.5rem; }
        .btn-primary { margin-top: 0.5rem; }
        h2 { font-size: 1.2rem; margin-bottom: 0.5rem; }
        .container { max-width: 500px; }
        input[type="number"] { width: 80px; }
        .hidden { display: none; }

        /* Estilo para las iniciales del usuario */
        .profile-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f8f9fa;
            color: #0d6efd;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Diabetes App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="registro_controlglucosa.php">Registro Control de glucosa (1 DIARIO)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro_comida.php">Registro Comida (Hasta 5 diarios)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="datos.php">Datos</a>
                </li>
            </ul>
            <!-- Bloque para mostrar las iniciales del usuario a la derecha -->
            <div class="d-flex align-items-center ms-auto">
                <div class="profile-circle"><?php echo $iniciales; ?></div>
            </div>
        </div>
    </div>
</nav>

<!-- Formulario de registro de datos
        Este formulario es para insertar 1 control de glucosa en la base de datos.
-->
    <div class="container mt-4">
        <h1 class="text-center mb-3" style="font-size: 1.5rem;">Registro de Datos</h1>
        <form action="submit_controlglucosa.php" method="POST" class="needs-validation" novalidate>
            <h2>Control de Glucosa</h2>
            <div class="form-group">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="form-control form-control-sm" required>
            </div>
            <div class="form-group">
                <label for="deporte" class="form-label">Indice de actividad(1 sedentario - 5 muy activo):</label>
                <input type="number" id="deporte" name="deporte" class="form-control form-control-sm" required>
            </div>
            <div class="form-group">
                <label for="lenta" class="form-label">Insulina Lenta:</label>
                <input type="number" id="lenta" name="lenta" class="form-control form-control-sm" required>
            </div>

            <button type="submit" class="btn btn-primary btn-sm w-100">Enviar Datos</button>
        </form>
    </div>

</body>
</html>