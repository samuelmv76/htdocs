<?php
session_start();
if (!isset($_SESSION['id_usu'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Seleccionar Mes y Año</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
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
<body>

<?php
    // Iniciales del usuario
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
            <a class="nav-link" href="registro_comida.php">Registro Comida (Hasta 5 diarios)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="datos.php">Datos</a>
          </li>
        </ul>
        <div class="d-flex align-items-center ms-auto">
          <div class="profile-circle"><?php echo $iniciales; ?></div>
        </div>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h1 class="text-center">Seleccione Mes y Año</h1>
    <form action="datos.php" method="GET">
      <div class="mb-3">
        <label for="mes" class="form-label">Mes</label>
        <select name="mes" id="mes" class="form-select" required>
          <option value="">Seleccione un mes</option>
          <option value="01">Enero</option>
          <option value="02">Febrero</option>
          <option value="03">Marzo</option>
          <option value="04">Abril</option>
          <option value="05">Mayo</option>
          <option value="06">Junio</option>
          <option value="07">Julio</option>
          <option value="08">Agosto</option>
          <option value="09">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="anio" class="form-label">Año</label>
        <input type="number" name="anio" id="anio" class="form-control" value="<?php echo date('Y'); ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Mostrar Datos</button>
    </form>
  </div>
</body>
</html>
