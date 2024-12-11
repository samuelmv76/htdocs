<?php
// Conexión a la base de datos
$host = 'localhost:3307';
$user = 'root';
$password = '';
$dbname = 'cartas';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta a la base de datos
$sql = "SELECT nombre, login, clave, puntos, extra FROM jugador";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table border="1" cellspacing="0" cellpadding="5">';
    echo '<tr>';
    echo '<th>Nombre</th>';
    echo '<th>Login</th>';
    echo '<th>Clave</th>';
    echo '<th>Puntos</th>';
    echo '<th>Extra</th>';
    echo '</tr>';

    // Mostrar los datos de cada fila
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['nombre']) . '</td>';
        echo '<td>' . htmlspecialchars($row['login']) . '</td>';
        echo '<td>' . htmlspecialchars($row['clave']) . '</td>';
        echo '<td>' . htmlspecialchars($row['puntos']) . '</td>';
        echo '<td>' . htmlspecialchars($row['extra']) . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No hay datos disponibles.';
}

$conn->close();
?>