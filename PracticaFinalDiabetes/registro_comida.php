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
            <a class="navbar-brand" href="organizador.php">Diabetes App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="registro_controlglucosa.php">Registro Control de glucosa (1 DIARIO)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="registro_comida.php">Registro Comida (Hasta 5 diarios)</a>
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

    <div class="container mt-4">
        <h1 class="text-center mb-3" style="font-size: 1.5rem;">Registro de Datos</h1>
        <form action="submit_comida.php" method="POST" class="needs-validation" novalidate>

            <h2>Registro de Comida</h2>

            <div class="form-group">
                <label for="tipo_comida" class="form-label">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="form-control form-control-sm" required>
            </div>

            <div class="form-group">
                <label for="tipo_comida" class="form-label">Tipo de Comida(Desayuno/Comida/Cena):</label>
                <input type="text" id="tipo_comida" name="tipo_comida" class="form-control form-control-sm" required>
            </div>
            <div class="form-group">
                <label for="gl_1h" class="form-label">Glucosa 1h después:</label>
                <input type="number" id="gl_1h" name="gl_1h" class="form-control form-control-sm" required>
            </div>
            <div class="form-group">
                <label for="gl_2h" class="form-label">Glucosa 2h después:</label>
                <input type="number" id="gl_2h" name="gl_2h" class="form-control form-control-sm" required>
            </div>
            <div class="form-group">
                <label for="raciones" class="form-label">Raciones:</label>
                <input type="number" id="raciones" name="raciones" class="form-control form-control-sm" required>
            </div>
            <div class="form-group">
                <label for="insulina" class="form-label">Insulina:</label>
                <input type="number" id="insulina" name="insulina" class="form-control form-control-sm" required>
            </div>

            <!-- Checkbox Hiperglucemia -->
            <div class="form-group">
                <input type="checkbox" id="chk_hiper" class="form-check-input">
                <label for="chk_hiper" class="form-check-label">Registrar Hiperglucemia</label>
            </div>
            <div id="hiperglucemia" class="hidden">
                <div class="form-group">
                    <label for="glucosa_hiper" class="form-label">Glucosa:</label>
                    <input type="number" id="glucosa_hiper" name="glucosa_hiper" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="hora_hiper" class="form-label">Hora:</label>
                    <input type="time" id="hora_hiper" name="hora_hiper" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="correccion" class="form-label">Corrección:</label>
                    <input type="number" id="correccion" name="correccion" class="form-control form-control-sm">
                </div>
            </div>

            <!-- Checkbox Hipoglucemia -->
            <div class="form-group">
                <input type="checkbox" id="chk_hipo" class="form-check-input">
                <label for="chk_hipo" class="form-check-label">Registrar Hipoglucemia</label>
            </div>
            <div id="hipoglucemia" class="hidden">
                <div class="form-group">
                    <label for="glucosa_hipo" class="form-label">Glucosa:</label>
                    <input type="number" id="glucosa_hipo" name="glucosa_hipo" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="hora_hipo" class="form-label">Hora:</label>
                    <input type="time" id="hora_hipo" name="hora_hipo" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="recuperacion" class="form-label">Recuperación (g de carbohidratos):</label>
                    <input type="number" id="recuperacion" name="recuperacion" class="form-control form-control-sm">
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-sm w-100">Enviar Datos</button>
        </form>
    </div>

    <script>
        document.getElementById('chk_hiper').addEventListener('change', function () {
            document.getElementById('chk_hipo').checked = false;
            document.getElementById('hipoglucemia').classList.add('hidden');
            document.getElementById('hiperglucemia').classList.toggle('hidden', !this.checked);
        });

        document.getElementById('chk_hipo').addEventListener('change', function () {
            document.getElementById('chk_hiper').checked = false;
            document.getElementById('hiperglucemia').classList.add('hidden');
            document.getElementById('hipoglucemia').classList.toggle('hidden', !this.checked);
        });
    </script>
</body>
</html>