<?php
include_once 'conexion.php';

// Obtener fecha y mes
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d');
$mes = isset($_GET['mes']) ? $_GET['mes'] : date('m');

// Obtener datos de los usuarios y control de glucosa
$sql = "SELECT U.nombre, U.apellidos, C.fecha, C.deporte, C.lenta
        FROM usuario U
        JOIN control_glucosa C ON U.id_usu = C.id_usu
        WHERE MONTH(C.fecha) = ?
        ORDER BY C.fecha DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $mes);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Glucosa</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Registro de Control de Glucosa</h2>
    <form method="GET">
        <label for="mes">Seleccionar Mes:</label>
        <input type="month" id="mes" name="mes" value="<?php echo date('Y-m'); ?>">
        <button type="submit">Filtrar</button>
    </form>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha</th>
            <th>Deporte</th>
            <th>Insulina Lenta</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["nombre"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["apellidos"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["fecha"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["deporte"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["lenta"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay datos disponibles para este mes</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
