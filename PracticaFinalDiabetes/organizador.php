<?php
// Iniciar la sesión
session_start();
include_once 'conexion.php';

if (!isset($_SESSION['id_usu'])) {
    header("Location: index.php");
    exit();
}

// Definir la consulta SQL para obtener el nombre del usuario basado en su ID
$query = "SELECT nombre FROM usuario WHERE id_usu = ?";

// Preparar la consulta SQL
$stmt = $conn->prepare($query);

// Vincular el parámetro de la consulta con el ID de usuario almacenado en la sesión
$stmt->bind_param("i", $_SESSION['id_usu']);

// Ejecutar la consulta
$stmt->execute();

// Almacenar el resultado de la consulta
$stmt->store_result();

// Vincular el resultado de la consulta a la variable $nombre
$stmt->bind_result($nombre);

// Obtener el resultado de la consulta
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
        <?php 
        // Mostrar el nombre del usuario autenticado
        echo "Bienvenido, " . htmlspecialchars($nombre) . "!";
        ?>
    </h1>
    
    <!-- Sección de manual / guía -->
    <div class="manual-section">
        <h2>Manual de la Aplicación</h2>
        <p>
            Esta aplicación te permitirá llevar un control detallado de tu diabetes. 
            A continuación, te explicamos cada módulo y cómo puedes aprovecharlos:
        </p>
        <ul>
            <li>
                <strong>Registro de Glucosa:</strong> Aquí podrás ingresar la información diaria de tu control 
                de glucemia, como la fecha, el índice de actividad y la insulina lenta administrada.
            </li>
            <li>
                <strong>Registro de Comida:</strong> Registra hasta 5 comidas al día, incluyendo datos de 
                glucosa postprandial, raciones, insulina administrada y, si corresponde, hipoglucemia o 
                hiperglucemia.
            </li>
            <li>
                <strong>Datos:</strong> Consulta los registros que has ido ingresando. Podrás verlos en 
                tablas anidadas, incluyendo el control de glucosa, la información de tus comidas, y la 
                vinculación con eventos de hipo o hiper.
            </li>
        </ul>
        <p>
            Para comenzar, selecciona la sección que necesites en el panel de abajo. 
            Si quieres cerrar sesión, vuelve al <em>index</em> o usa la opción de logout si está disponible.
        </p>
    </div>

    <!-- Opciones de navegación -->
    <div class="row justify-content-center">
        <!-- Registro de Glucosa -->
        <div class="col-md-4 mb-3">
            <a href="registro_controlglucosa.php" class="text-decoration-none">
                <div class="card bg-primary text-white p-3 d-flex flex-column h-100">
                    <div class="card-body">
                        <h3><i class="fas fa-plus-circle"></i> Registro de Glucosa</h3>
                        <p>Registra tu control de glucemia diario (1 al día).</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Registro de Comida -->
        <div class="col-md-4 mb-3">
            <a href="registro_comida.php" class="text-decoration-none">
                <div class="card bg-warning text-dark p-3 d-flex flex-column h-100">
                    <div class="card-body">
                        <h3><i class="fas fa-utensils"></i> Registro de Comida</h3>
                        <p>Registra hasta 5 comidas diarias, con hipoglucemia/hiperglucemia si aplica.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Consultar Datos -->
        <div class="col-md-4 mb-3">
            <a href="datos.php" class="text-decoration-none">
                <div class="card bg-success text-white p-3 d-flex flex-column h-100">
                    <div class="card-body">
                        <h3><i class="fas fa-table"></i> Consultar Datos</h3>
                        <p>Revisa tus registros y estadísticas en la tabla.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Opcional: más enlaces o secciones -->
    <div class="row justify-content-center">
        <!-- Cerrar sesión (si deseas un enlace directo al logout) -->
        <div class="col-md-4 mb-3">
            <a href="logout.php" class="text-decoration-none">
                <div class="card bg-danger text-white p-3 d-flex flex-column h-100">
                    <div class="card-body">
                        <h3><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</h3>
                        <p>Termina tu sesión de forma segura.</p>
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