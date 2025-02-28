<?php
session_start();
include_once 'conexion.php';

$id_usu = $_SESSION['id_usu'];

// Consulta total de registros de control de glucosa
$query1 = "SELECT COUNT(*) AS total_control FROM control_glucosa WHERE id_usu = ?";
$stmt = $conn->prepare($query1);
$stmt->bind_param("i", $id_usu);
$stmt->execute();
$stmt->bind_result($total_control);
$stmt->fetch();
$stmt->close();

// Consulta promedio de insulina lenta
$query2 = "SELECT AVG(lenta) AS avg_lenta FROM control_glucosa WHERE id_usu = ?";
$stmt = $conn->prepare($query2);
$stmt->bind_param("i", $id_usu);
$stmt->execute();
$stmt->bind_result($avg_lenta);
$stmt->fetch();
$stmt->close();

// Consulta total de registros de comida
$query3 = "SELECT COUNT(*) AS total_comida FROM comida WHERE id_usu = ?";
$stmt = $conn->prepare($query3);
$stmt->bind_param("i", $id_usu);
$stmt->execute();
$stmt->bind_result($total_comida);
$stmt->fetch();
$stmt->close();

// Consulta registros de comida agrupados por tipo
$query4 = "SELECT tipo_comida, COUNT(*) AS total 
           FROM comida 
           WHERE id_usu = ? 
           GROUP BY tipo_comida";
$stmt = $conn->prepare($query4);
$stmt->bind_param("i", $id_usu);
$stmt->execute();
$result = $stmt->get_result();
$comida_stats = [];
while($row = $result->fetch_assoc()){
    $comida_stats[] = $row;
}
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Estadísticas - Gestión de Diabetes</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
    }
    .chart-container {
      position: relative;
      margin: auto;
      height: 400px;
      width: 80%;
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
                      <a class="nav-link" href="registro_controlglucosa.php">Registro Control de Glucosa (1 DIARIO)</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="registro_comida.php">Registro Comida (Hasta 5 diarios)</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" href="datos.php">Datos</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" href="estadisticas.php">Estadísticas</a>
                  </li>
              </ul>
              <div class="d-flex align-items-center ms-auto">
                  <div class="profile-circle"><?php echo strtoupper(substr($_SESSION['nombre'] ?? "USUARIO", 0, 2)); ?></div>
              </div>
          </div>
      </div>
  </nav>
  
  <div class="container mt-4">
      <h1 class="text-center mb-4">Estadísticas de la Aplicación</h1>
      
      <div class="row">
          <!-- Total de Control de Glucosa -->
          <div class="col-md-4">
              <div class="alert alert-info text-center">
                  <h4>Total Control de Glucosa</h4>
                  <p class="display-4"><?php echo $total_control; ?></p>
              </div>
          </div>
          <!-- Promedio de Insulina Lenta -->
          <div class="col-md-4">
              <div class="alert alert-success text-center">
                  <h4>Promedio de Insulina Lenta</h4>
                  <p class="display-4"><?php echo number_format($avg_lenta, 2); ?></p>
              </div>
          </div>
          <!-- Total de Comida -->
          <div class="col-md-4">
              <div class="alert alert-warning text-center">
                  <h4>Total Registros de Comida</h4>
                  <p class="display-4"><?php echo $total_comida; ?></p>
              </div>
          </div>
      </div>
      
      <div class="chart-container mt-4">
          <canvas id="comidaChart"></canvas>
      </div>
      
      <script>
          const ctx = document.getElementById('comidaChart').getContext('2d');
          const comidaData = {
              labels: [
                  <?php 
                  foreach($comida_stats as $stat){
                      echo "'" . $stat['tipo_comida'] . "',";
                  }
                  ?>
              ],
              datasets: [{
                  label: 'Registros por Tipo de Comida',
                  data: [
                      <?php 
                      foreach($comida_stats as $stat){
                          echo $stat['total'] . ",";
                      }
                      ?>
                  ],
                  backgroundColor: [
                      'rgba(255, 205, 86, 0.6)',
                      'rgba(54, 162, 235, 0.6)',
                      'rgba(255, 99, 132, 0.6)'
                  ],
                  borderColor: [
                      'rgba(255, 205, 86, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 99, 132, 1)'
                  ],
                  borderWidth: 1
              }]
          };
          
          const comidaChart = new Chart(ctx, {
              type: 'bar',
              data: comidaData,
              options: {
                  scales: {
                      y: {
                          beginAtZero: true,
                          ticks: {
                              stepSize: 1
                          }
                      }
                  }
              }
          });
      </script>
  </div>

  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
