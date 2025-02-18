<?php
include_once 'conexion.php';

// Consulta para obtener los registros de cada usuario y fecha
$sql = "SELECT cg.fecha, cg.deporte, cg.lenta, c.tipo_comida, c.gl_1h, c.gl_2h, c.raciones, c.insulina, 
               hipo.glucosa AS hipo_glucosa, hipo.hora AS hipo_hora, 
               hiper.glucosa AS hiper_glucosa, hiper.hora AS hiper_hora, hiper.correccion
        FROM CONTROL_GLUCOSA cg
        LEFT JOIN COMIDA c ON cg.fecha = c.fecha AND cg.id_usu = c.id_usu
        LEFT JOIN HIPERGLUCEMIA hiper ON c.tipo_comida = hiper.tipo_comida AND c.fecha = hiper.fecha AND c.id_usu = hiper.id_usu
        LEFT JOIN HIPOGLUCEMIA hipo ON c.tipo_comida = hipo.tipo_comida AND c.fecha = hipo.fecha AND c.id_usu = hipo.id_usu
        ORDER BY cg.fecha DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Diabetes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }
        td, th {
            border: 1px solid #dee2e6;
            padding: 8px;
            font-size: 14px;
        }
        .hipo {
            background-color: #a3c7ff;
        }
        .hiper {
            background-color: #ffe599;
        }
        .lenta {
            background-color: #f4a582;
        }
        .navbar {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
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
                        <a class="nav-link" href="registro.php">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="datos.php">Datos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        <h2 class="text-center mb-4">Historial de Datos</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-primary">
                    <tr>
                        <th rowspan="2">Día</th>
                        <th colspan="5">Desayuno</th>
                        <th colspan="3" class="hipo">Hipo</th>
                        <th colspan="3" class="hiper">Híper</th>
                        <th colspan="5">Comida</th>
                        <th colspan="3" class="hipo">Hipo</th>
                        <th colspan="3" class="hiper">Híper</th>
                        <th colspan="5">Cena</th>
                        <th colspan="3" class="hipo">Hipo</th>
                        <th colspan="3" class="hiper">Híper</th>
                        <th class="lenta">Lenta</th>
                    </tr>
                    <tr>
                        <th>GL/1H</th>
                        <th>RAC.</th>
                        <th>INSU.</th>
                        <th>GL/2H</th>
                        <th>Deporte</th>
                        
                        <th>GLU.</th>
                        <th>HORA</th>

                        <th>GLU.</th>
                        <th>HORA</th>
                        <th>CORR.</th>

                        <th>GL/1H</th>
                        <th>RAC.</th>
                        <th>INSU.</th>
                        <th>GL/2H</th>
                        <th>Deporte</th>

                        <th>GLU.</th>
                        <th>HORA</th>

                        <th>GLU.</th>
                        <th>HORA</th>
                        <th>CORR.</th>

                        <th>GL/1H</th>
                        <th>RAC.</th>
                        <th>INSU.</th>
                        <th>GL/2H</th>
                        <th>Deporte</th>

                        <th>GLU.</th>
                        <th>HORA</th>

                        <th>GLU.</th>
                        <th>HORA</th>
                        <th>CORR.</th>

                        <th>Lenta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $current_date = null;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . date("d-m-Y", strtotime($row["fecha"])) . "</td>";
                            echo "<td>" . $row["gl_1h"] . "</td>";
                            echo "<td>" . $row["raciones"] . "</td>";
                            echo "<td>" . $row["insulina"] . "</td>";
                            echo "<td>" . $row["gl_2h"] . "</td>";
                            echo "<td>" . $row["deporte"] . "</td>";
                            
                            echo "<td class='hipo'>" . ($row["hipo_glucosa"] ?? "") . "</td>";
                            echo "<td class='hipo'>" . ($row["hipo_hora"] ?? "") . "</td>";
                            echo "<td class='hipo'></td>";

                            echo "<td class='hiper'>" . ($row["hiper_glucosa"] ?? "") . "</td>";
                            echo "<td class='hiper'>" . ($row["hiper_hora"] ?? "") . "</td>";
                            echo "<td class='hiper'>" . ($row["correccion"] ?? "") . "</td>";

                            echo "<td class='lenta'>" . $row["lenta"] . "</td>";
                            echo "</tr>";

                            $current_date = $row["fecha"];
                        }
                    } else {
                        echo "<tr><td colspan='34'>No hay datos disponibles</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
