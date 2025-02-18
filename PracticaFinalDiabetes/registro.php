<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulación de Diabetes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-group {
            margin-bottom: 0.5rem;
        }
        details {
            margin-bottom: 0.5rem;
        }
        .btn-primary {
            margin-top: 0.5rem;
        }
        h2 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }
        .container {
            max-width: 500px;
        }
        /* Reducir tamaño de los inputs tipo number */
        input[type="number"] {
            width: 80px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Diabetes App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="datos.php">Datos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-4">
        <h1 class="text-center mb-3" style="font-size: 1.5rem;">Registro de Datos</h1>
        <form action="submit.php" method="POST" class="needs-validation" novalidate>
            <!-- Control de Glucosa -->
            <h2>Control de Glucosa</h2>
            <div class="form-group">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="form-control form-control-sm" required>
            </div>
            <div class="form-group">
                <label for="deporte" class="form-label">Minutos de Deporte:</label>
                <input type="number" id="deporte" name="deporte" class="form-control form-control-sm" required>
            </div>
            <div class="form-group">
                <label for="lenta" class="form-label">Insulina Lenta:</label>
                <input type="number" id="lenta" name="lenta" class="form-control form-control-sm" required>
            </div>

            <!-- Comida -->
            <h2>Registro de Comida</h2>
            <div class="form-group">
                <label for="tipo_comida" class="form-label">Tipo de Comida:</label>
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

            <!-- Hiperglucemia -->
            <details>
                <summary class="h6">Hiperglucemia (Opcional)</summary>
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
            </details>

            <!-- Hipoglucemia -->
            <details>
                <summary class="h6">Hipoglucemia (Opcional)</summary>
                <div class="form-group">
                    <label for="glucosa_hipo" class="form-label">Glucosa:</label>
                    <input type="number" id="glucosa_hipo" name="glucosa_hipo" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="hora_hipo" class="form-label">Hora:</label>
                    <input type="time" id="hora_hipo" name="hora_hipo" class="form-control form-control-sm">
                </div>
            </details>

            <button type="submit" class="btn btn-primary btn-sm w-100">Enviar Datos</button>
        </form>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>