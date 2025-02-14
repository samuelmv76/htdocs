<?php
// Iniciar la sesión
session_start();
include '../conexion.php';

if (!isset($_SESSION['id_usu'])) {
    header("Location: ../index.php");
    exit();
}//si no hay una sesión iniciada, redirigir al index

$query = "SELECT nombre FROM USUARIO WHERE id_usu = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['id_usu']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($nombre);
$stmt->fetch();
//necesario para imprimir el nombre del usuario
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Diabetes</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos de FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 10%;
        }
        .card {
            transition: transform 0.2s;
            min-height: 180px; /* Tamaño mínimo para que sean iguales */
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
</head>
<body>

<div class="container text-center">
    <h1 class="mb-4">
        <?php 
        // Mostrar el nombre del usuario autenticado
        echo "Bienvenido, " . $nombre . "!";    
        ?>
    </h1>
    <p class="lead">Selecciona una opción:</p>

    <div class="row justify-content-center">
        <!-- Opción 1: Registrar Datos -->
        <div class="col-md-4">
            <a href="registro.html" class="text-decoration-none">
                <div class="card bg-primary text-white p-3 d-flex flex-column h-100">
                    <div class="card-body">
                        <h3><i class="fas fa-plus-circle"></i> Registrar Datos</h3>
                        <p>Accede al formulario para ingresar los datos del día.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Opción 2: Consultar Registros -->
        <div class="col-md-4">
            <a href="consulta.html" class="text-decoration-none">
                <div class="card bg-success text-white p-3 d-flex flex-column h-100">
                    <div class="card-body">
                        <h3><i class="fas fa-table"></i> Consultar Registros</h3>
                        <p>Revisa los datos almacenados en la tabla.</p>
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