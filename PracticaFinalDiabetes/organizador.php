<?php
// Iniciar la sesión y obtener datos del usuario
session_start();
include_once 'conexion.php';

if (!isset($_SESSION['id_usu'])) {
    header("Location: index.php");
    exit();
}

// Definir la consulta SQL para obtener el nombre del usuario basado en su ID
$query = "SELECT nombre FROM usuario WHERE id_usu = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['id_usu']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($nombre);
$stmt->fetch();

// Obtener las iniciales (2 primeras letras del nombre)
$iniciales = strtoupper(substr($nombre, 0, 2));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manual de la Aplicación - Gestión de Diabetes</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos de FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 5%;
        }
        .card {
            transition: transform 0.2s;
            min-height: 180px;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .manual-section {
            text-align: justify;
            background: #ffffff;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
        }
        .manual-section h2 {
            margin-top: 0;
        }
        /* Logo de iniciales */
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
                    <a class="nav-link" href="registro_controlglucosa.php">Registro Control de glucosa (1 DIARIO)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro_comida.php">Registro Comida (Hasta 5 diarios)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="datos.php">Datos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="estadisticas.php">Estadísticas</a>
                </li>
            </ul>
            <!-- Logo de iniciales a la derecha -->
            <div class="d-flex align-items-center ms-auto">
                <div class="profile-circle"><?php echo $iniciales; ?></div>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <!-- Encabezado con saludo al usuario -->
    <h1 class="mb-4 text-center">
        <?php echo "Bienvenido, " . htmlspecialchars($nombre) . "!"; ?>
    </h1>
    
    <!-- Sección de manual / guía -->
    <div class="manual-section">
        <h2>Manual de la Aplicación</h2>
        <p>
            Esta aplicación te permitirá llevar un control detallado de tu diabetes. A continuación, te explicamos cada módulo:
        </p>
        <ul>
            <li>
                <strong>Registro de Glucosa:</strong> Ingresa la información diaria de tu control de glucemia: fecha, índice de actividad e insulina lenta.
            </li>
            <li>
                <strong>Registro de Comida:</strong> Registra hasta 5 comidas al día, incluyendo datos de glucosa postprandial, raciones, insulina y, en caso de presentarse, eventos de hipoglucemia o hiperglucemia.
            </li>
            <li>
                <strong>Datos:</strong> Consulta los registros ingresados, presentados en tablas anidadas que muestran el control y la relación con las comidas.
            </li>
            <li>
                <strong>Estadísticas:</strong> Visualiza gráficos y resúmenes que te ayudarán a analizar tus registros y patrones de comportamiento.
            </li>
        </ul>
        <p>
            Para comenzar, selecciona una de las opciones del panel de abajo. Si deseas cerrar sesión, utiliza la opción de Logout.
        </p>
    </div>

    <!-- Opciones de navegación -->
    <div class="row justify-content-center">
        <!-- Registro de Glucosa -->
        <div class="col-md-3 mb-3">
            <a href="registro_controlglucosa.php" class="text-decoration-none">
                <div class="card bg-primary text-white p-3 d-flex flex-column h-100">
                    <div class="card-body">
                        <h3><i class="fas fa-plus-circle"></i> Registro de Glucosa</h3>
                        <p>Ingresa tu control diario de glucemia.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Registro de Comida -->
        <div class="col-md-3 mb-3">
            <a href="registro_comida.php" class="text-decoration-none">
                <div class="card bg-warning text-dark p-3 d-flex flex-column h-100">
                    <div class="card-body">
                        <h3><i class="fas fa-utensils"></i> Registro de Comida</h3>
                        <p>Registra hasta 5 comidas diarias, con eventos hipo/hiper.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Consultar Datos -->
        <div class="col-md-3 mb-3">
            <a href="datos.php" class="text-decoration-none">
                <div class="card bg-success text-white p-3 d-flex flex-column h-100">
                    <div class="card-body">
                        <h3><i class="fas fa-table"></i> Consultar Datos</h3>
                        <p>Revisa tus registros y estadísticas almacenadas.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Estadísticas -->
        <div class="col-md-3 mb-3">
            <a href="estadisticas.php" class="text-decoration-none">
                <div class="card bg-info text-white p-3 d-flex flex-column h-100">
                    <div class="card-body">
                        <h3><i class="fas fa-chart-bar"></i> Estadísticas</h3>
                        <p>Visualiza gráficos y resúmenes para analizar tus datos.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Logout -->
        <div class="col-md-3 mb-3">
            <a href="logout.php" class="text-decoration-none">
                <div class="card bg-danger text-white p-3 d-flex flex-column h-100">
                    <div class="card-body">
                        <h3><i class="fas fa-sign-out-alt"></i> Logout</h3>
                        <p>Cierra tu sesión de forma segura.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>