<?php
session_start();
include_once 'conexion.php';

// Verificar sesión
if (!isset($_SESSION['id_usu'])) {
    header("Location: index.php");
    exit();
}
$id_usu = $_SESSION['id_usu'];

// Verificar mes/año
if (!isset($_GET['mes']) || !isset($_GET['anio'])) {
    header("Location: seleccionar_fecha.php");
    exit();
}
$mes = $_GET['mes'];
$anio = $_GET['anio'];
$dateFilter = $anio . "-" . $mes . "-%";

// 1) Control de Glucosa
$sqlControl = "SELECT fecha, deporte, lenta 
               FROM control_glucosa 
               WHERE id_usu = ? AND fecha LIKE ? 
               ORDER BY fecha ASC";
$stmt = $conn->prepare($sqlControl);
$stmt->bind_param("is", $id_usu, $dateFilter);
$stmt->execute();
$result = $stmt->get_result();
$controlData = [];
while ($row = $result->fetch_assoc()) {
    $controlData[] = $row;
}
$stmt->close();

// 2) Comida
$sqlComida = "SELECT fecha, tipo_comida, gl_1h, gl_2h, raciones, insulina
              FROM comida
              WHERE id_usu = ? AND fecha LIKE ?
              ORDER BY fecha ASC";
$stmt = $conn->prepare($sqlComida);
$stmt->bind_param("is", $id_usu, $dateFilter);
$stmt->execute();
$result = $stmt->get_result();
$comidaData = [];
while ($row = $result->fetch_assoc()) {
    $comidaData[] = $row;
}
$stmt->close();

// Agrupar comida por fecha
$comidaGrouped = [];
foreach ($comidaData as $c) {
    $f = $c['fecha'];
    if (!isset($comidaGrouped[$f])) {
        $comidaGrouped[$f] = [];
    }
    $comidaGrouped[$f][] = $c;
}

// 3) Hipoglucemia
$sqlHipo = "SELECT fecha, tipo_comida, glucosa, hora 
            FROM hipoglucemia
            WHERE id_usu = ? AND fecha LIKE ?
            ORDER BY fecha ASC";
$stmt = $conn->prepare($sqlHipo);
$stmt->bind_param("is", $id_usu, $dateFilter);
$stmt->execute();
$result = $stmt->get_result();
$hipoData = [];
while ($row = $result->fetch_assoc()) {
    $hipoData[] = $row;
}
$stmt->close();

// Agrupar hipo por fecha
$hipoGrouped = [];
foreach ($hipoData as $h) {
    $f = $h['fecha'];
    if (!isset($hipoGrouped[$f])) {
        $hipoGrouped[$f] = [];
    }
    $hipoGrouped[$f][] = $h;
}

// 4) Hiperglucemia (incluye 'correccion')
$sqlHiper = "SELECT fecha, tipo_comida, glucosa, hora, correccion
             FROM hiperglucemia
             WHERE id_usu = ? AND fecha LIKE ?
             ORDER BY fecha ASC";
$stmt = $conn->prepare($sqlHiper);
$stmt->bind_param("is", $id_usu, $dateFilter);
$stmt->execute();
$result = $stmt->get_result();
$hiperData = [];
while ($row = $result->fetch_assoc()) {
    $hiperData[] = $row;
}
$stmt->close();

// Agrupar hiper por fecha
$hiperGrouped = [];
foreach ($hiperData as $h) {
    $f = $h['fecha'];
    if (!isset($hiperGrouped[$f])) {
        $hiperGrouped[$f] = [];
    }
    $hiperGrouped[$f][] = $h;
}

// Funciones para obtener registros hipo/hiper de cada comida
function getHipoForFood($fecha, $tipo, $hipoGrouped) {
    if (!isset($hipoGrouped[$fecha])) return null;
    foreach ($hipoGrouped[$fecha] as $h) {
        if ($h['tipo_comida'] === $tipo) return $h;
    }
    return null;
}
function getHiperForFood($fecha, $tipo, $hiperGrouped) {
    if (!isset($hiperGrouped[$fecha])) return null;
    foreach ($hiperGrouped[$fecha] as $h) {
        if ($h['tipo_comida'] === $tipo) return $h;
    }
    return null;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registros Combinados - Diabetes App</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f1f4f7;
    }
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
    .control-info {
      width: 220px;
    }
    /* Permitir autoajuste de columnas y que respete el min-width en el encabezado */
    .nested-table {
      width: 100%;
      table-layout: auto; /* Cambiado a auto para que respete min-width */
    }
    .nested-table th,
    .nested-table td {
      padding: 8px 10px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    /* Clase para hacer más ancho el encabezado de COMIDA */
    .comida-header {
      min-width: 250px; /* Ajusta según prefieras */
    }

    /* Colores para la cabecera */
    .bg-comida {
      background-color: #ffffff; /* Ajusta a tu gusto */
    }
    .bg-hipo {
      background-color: #b3cde0; /* color suave para HIPO */
    }
    .bg-hiper {
      background-color: #ffe4b2; /* color suave para HIPER */
    }

    /* Color de fondo en las celdas (opcional si quieres colorear columnas) */
    /* ... */
  </style>
</head>
<body>
  <?php
    // Iniciales del usuario
    $usuario = $_SESSION['usuario'];
    $iniciales = strtoupper(substr($usuario, 0, 2));
  ?>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="organizador.php">Diabetes App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="registro_controlglucosa.php">Registro Control de Glucosa (1 DIARIO)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registro_comida.php">Registro Comida (Hasta 5 diarios)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="datos.php">Datos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="estadisticas.php">Estadísticas</a>
          </li>
        </ul>
        <div class="d-flex align-items-center ms-auto">
          <div class="profile-circle"><?php echo $iniciales; ?></div>
        </div>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <h1 class="text-center mb-4">Registros del <?php echo "$mes/$anio"; ?></h1>
    
    <div class="card shadow mb-4">
      <div class="card-header bg-info text-white">
        <h4 class="mb-0">Registros Combinados (Control y Comidas con Hipo/Hiper)</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-light">
              <tr>
                <th>DÍA</th>
                <th>Control de Glucosa</th>
                <th>Registros</th>
              </tr>
            </thead>
            <tbody>
            <?php if (!empty($controlData)): ?>
              <?php foreach ($controlData as $control):
                $fecha = $control['fecha'];
                $dia = date("j", strtotime($fecha));
              ?>
                <tr>
                  <td><?php echo $dia; ?></td>
                  <td class="control-info">
                    <strong>Índice de Actividad:</strong> <?php echo htmlspecialchars($control['deporte']); ?><br>
                    <strong>Insulina Lenta:</strong> <?php echo htmlspecialchars($control['lenta']); ?>
                  </td>
                  <td>
                    <?php if (isset($comidaGrouped[$fecha])): ?>
                      <!-- Tabla anidada con cabecera en 2 filas -->
                      <table class="table table-sm table-bordered nested-table mb-0">
                        <thead>
                          <!-- Fila 1 del encabezado -->
                          <tr>
                            <!-- Añadimos la clase comida-header para darle más ancho -->
                            <th colspan="5" class="bg-comida text-center comida-header">COMIDA</th>
                            <th colspan="2" class="bg-hipo text-center">HIPO</th>
                            <th colspan="3" class="bg-hiper text-center">HIPER</th>
                          </tr>
                          <!-- Fila 2 del encabezado -->
                          <tr>
                            <th class="bg-comida">TIPO</th>
                            <th class="bg-comida">GL/1H</th>
                            <th class="bg-comida">RAC</th>
                            <th class="bg-comida">INSU</th>
                            <th class="bg-comida">GL/2H</th>
                            <th class="bg-hipo">GLU</th>
                            <th class="bg-hipo">HORA</th>
                            <th class="bg-hiper">GLU</th>
                            <th class="bg-hiper">HORA</th>
                            <th class="bg-hiper">CORR</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($comidaGrouped[$fecha] as $comida):
                            $tipo = $comida['tipo_comida'];
                            // Vincular con hipo/hiper
                            $hipoRec = getHipoForFood($fecha, $tipo, $hipoGrouped);
                            $hiperRec = getHiperForFood($fecha, $tipo, $hiperGrouped);
                          ?>
                            <tr>
                              <!-- Comida -->
                              <td><?php echo htmlspecialchars($comida['tipo_comida']); ?></td>
                              <td><?php echo htmlspecialchars($comida['gl_1h']); ?></td>
                              <td><?php echo htmlspecialchars($comida['raciones']); ?></td>
                              <td><?php echo htmlspecialchars($comida['insulina']); ?></td>
                              <td><?php echo htmlspecialchars($comida['gl_2h']); ?></td>
                              <!-- HIPO -->
                              <td><?php echo $hipoRec ? htmlspecialchars($hipoRec['glucosa']) : ''; ?></td>
                              <td><?php echo $hipoRec ? htmlspecialchars($hipoRec['hora']) : ''; ?></td>
                              <!-- HIPER -->
                              <td><?php echo $hiperRec ? htmlspecialchars($hiperRec['glucosa']) : ''; ?></td>
                              <td><?php echo $hiperRec ? htmlspecialchars($hiperRec['hora']) : ''; ?></td>
                              <td><?php echo ($hiperRec && isset($hiperRec['correccion']))
                                         ? htmlspecialchars($hiperRec['correccion']) : ''; ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    <?php else: ?>
                      <p class="text-center"><em>Sin registros de comida</em></p>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="3">No hay registros de Control de Glucosa para este período.</td>
              </tr>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>
