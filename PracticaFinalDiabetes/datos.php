<?php
session_start();
include_once 'conexion.php';

// Verificar si el usuario inició sesión
if (!isset($_SESSION['id_usu'])) {
    header("Location: index.php");
    exit();
}
$id_usu = $_SESSION['id_usu'];

// Verificar que se hayan recibido mes y año
if (!isset($_GET['mes']) || !isset($_GET['anio'])) {
    header("Location: seleccionar_fecha.php");
    exit();
}
$mes = $_GET['mes'];
$anio = $_GET['anio'];
// Patrón para filtrar las fechas (por ejemplo: "2025-02-%")
$dateFilter = $anio . "-" . $mes . "-%";

// ---------------------------------------------------------------------
// 1) Consulta de Control de Glucosa (se asume un registro por día)
$sqlControl = "SELECT fecha, deporte, lenta FROM control_glucosa WHERE id_usu = ? AND fecha LIKE ? ORDER BY fecha ASC";
$stmt = $conn->prepare($sqlControl);
$stmt->bind_param("is", $id_usu, $dateFilter);
$stmt->execute();
$resultControl = $stmt->get_result();
$controlData = [];
while ($row = $resultControl->fetch_assoc()) {
    $controlData[] = $row;
}
$stmt->close();

// ---------------------------------------------------------------------
// 2) Consulta de Registros de Comida
$sqlComida = "SELECT fecha, tipo_comida, gl_1h, gl_2h, raciones, insulina FROM comida WHERE id_usu = ? AND fecha LIKE ? ORDER BY fecha ASC";
$stmt = $conn->prepare($sqlComida);
$stmt->bind_param("is", $id_usu, $dateFilter);
$stmt->execute();
$resultComida = $stmt->get_result();
$comidaData = [];
while ($row = $resultComida->fetch_assoc()) {
    $comidaData[] = $row;
}
$stmt->close();

// Agrupar registros de Comida por fecha
$comidaGrouped = [];
foreach ($comidaData as $comida) {
    $fecha = $comida['fecha'];
    if (!isset($comidaGrouped[$fecha])) {
        $comidaGrouped[$fecha] = [];
    }
    $comidaGrouped[$fecha][] = $comida;
}

// ---------------------------------------------------------------------
// 3) Consulta de Hipoglucemia
$sqlHipo = "SELECT fecha, tipo_comida, glucosa, hora FROM hipoglucemia WHERE id_usu = ? AND fecha LIKE ? ORDER BY fecha ASC";
$stmt = $conn->prepare($sqlHipo);
$stmt->bind_param("is", $id_usu, $dateFilter);
$stmt->execute();
$resultHipo = $stmt->get_result();
$hipoData = [];
while ($row = $resultHipo->fetch_assoc()) {
    $hipoData[] = $row;
}
$stmt->close();

// Agrupar registros de Hipoglucemia por fecha
$hipoGrouped = [];
foreach ($hipoData as $record) {
    $fecha = $record['fecha'];
    if (!isset($hipoGrouped[$fecha])) {
        $hipoGrouped[$fecha] = [];
    }
    $hipoGrouped[$fecha][] = $record;
}

// ---------------------------------------------------------------------
// 4) Consulta de Hiperglucemia
$sqlHiper = "SELECT fecha, tipo_comida, glucosa, hora FROM hiperglucemia WHERE id_usu = ? AND fecha LIKE ? ORDER BY fecha ASC";
$stmt = $conn->prepare($sqlHiper);
$stmt->bind_param("is", $id_usu, $dateFilter);
$stmt->execute();
$resultHiper = $stmt->get_result();
$hiperData = [];
while ($row = $resultHiper->fetch_assoc()) {
    $hiperData[] = $row;
}
$stmt->close();

// Agrupar registros de Hiperglucemia por fecha
$hiperGrouped = [];
foreach ($hiperData as $record) {
    $fecha = $record['fecha'];
    if (!isset($hiperGrouped[$fecha])) {
        $hiperGrouped[$fecha] = [];
    }
    $hiperGrouped[$fecha][] = $record;
}

// Función auxiliar: devuelve el primer registro en el grupo que coincida con el tipo de comida
function getRecordForFood($grouped, $fecha, $tipo) {
    if (!isset($grouped[$fecha])) {
        return null;
    }
    foreach ($grouped[$fecha] as $record) {
        if ($record['tipo_comida'] === $tipo) {
            return $record;
        }
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
    .nested-table {
      width: 100%;
      table-layout: fixed;
    }
    .nested-table th,
    .nested-table td {
      padding: 8px 10px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    /* Para la columna Tipo en la tabla anidada */
    .nested-table th:first-child,
    .nested-table td:first-child {
      width: 120px;
    }
  </style>
</head>
<body>
  <?php
    // Obtener iniciales del usuario
    $usuario = $_SESSION['usuario'];
    $iniciales = strtoupper(substr($usuario, 0, 2));
  ?>
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
            <a class="nav-link" href="registro_controlglucosa.php">Registro Control de Glucosa (1 DIARIO)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="registro_comida.php">Registro Comida (Hasta 5 diarios)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="datos.php">Datos</a>
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
    
    <!-- Tarjeta combinada para mostrar Control de Glucosa y Registros Combinados -->
    <div class="card shadow mb-4">
      <div class="card-header bg-info text-white">
        <h4 class="mb-0">Registros Combinados (Control y Registros de Comida con Hipo/Hiper)</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-light">
              <tr>
                <th>DÍA</th>
                <th>Control de Glucosa</th>
                <th>Registros Combinados</th>
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
                        <table class="table table-sm table-bordered nested-table mb-0">
                          <thead>
                            <tr>
                              <th>Tipo</th>
                              <th>G1</th>
                              <th>G2</th>
                              <th>Rac.</th>
                              <th>Insu.</th>
                              <th>Hipo Gluc.</th>
                              <th>Hipo Hora</th>
                              <th>Hiper Gluc.</th>
                              <th>Hiper Hora</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($comidaGrouped[$fecha] as $comida): 
                                  // Obtener registro de Hipoglucemia e Hiperglucemia vinculados a esta comida
                                  $hipoRecord = getRecordForFood($hipoGrouped, $fecha, $comida['tipo_comida']);
                                  $hiperRecord = getRecordForFood($hiperGrouped, $fecha, $comida['tipo_comida']);
                            ?>
                              <tr>
                                <td><?php echo htmlspecialchars($comida['tipo_comida']); ?></td>
                                <td><?php echo htmlspecialchars($comida['gl_1h']); ?></td>
                                <td><?php echo htmlspecialchars($comida['gl_2h']); ?></td>
                                <td><?php echo htmlspecialchars($comida['raciones']); ?></td>
                                <td><?php echo htmlspecialchars($comida['insulina']); ?></td>
                                <td><?php echo $hipoRecord ? htmlspecialchars($hipoRecord['glucosa']) : ''; ?></td>
                                <td><?php echo $hipoRecord ? htmlspecialchars($hipoRecord['hora']) : ''; ?></td>
                                <td><?php echo $hiperRecord ? htmlspecialchars($hiperRecord['glucosa']) : ''; ?></td>
                                <td><?php echo $hiperRecord ? htmlspecialchars($hiperRecord['hora']) : ''; ?></td>
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
