<?php
include_once 'conexion.php';

// Recoger datos del formulario
$fecha = $_POST['fecha'];
$deporte = $_POST['deporte'];
$lenta = $_POST['lenta'];
$tipo_comida = $_POST['tipo_comida'];
$gl_1h = $_POST['gl_1h'];
$gl_2h = $_POST['gl_2h'];
$raciones = $_POST['raciones'];
$insulina = $_POST['insulina'];
$glucosa_hiper = $_POST['glucosa_hiper'];
$hora_hiper = $_POST['hora_hiper'];
$correccion = $_POST['correccion'];
$glucosa_hipo = $_POST['glucosa_hipo'];
$hora_hipo = $_POST['hora_hipo'];

// Añadir las variables faltantes que son requeridas en la tabla USUARIO
$fecha_nacimiento = $_POST['fecha_nacimiento']; // Recoger fecha de nacimiento
$nombre = $_POST['nombre']; // Recoger nombre
$apellidos = $_POST['apellidos']; // Recoger apellidos
$usuario = $_POST['usuario']; // Recoger usuario
$contra = $_POST['contra']; // Recoger contraseña

// Insertar datos en la tabla USUARIO
$sql_usuario = "INSERT INTO USUARIO (fecha_nacimiento, nombre, apellidos, usuario, contra)
                VALUES ('$fecha_nacimiento', '$nombre', '$apellidos', '$usuario', '$contra')";

if ($conn->query($sql_usuario) === TRUE) {
    $id_usu = $conn->insert_id; // Obtener el ID del usuario insertado

    // Insertar datos en la tabla CONTROL_GLUCOSA
    $sql_control = "INSERT INTO CONTROL_GLUCOSA (fecha, deporte, lenta, id_usu)
                    VALUES ('$fecha', '$deporte', '$lenta', '$id_usu')";

    if ($conn->query($sql_control) === TRUE) {
        // Insertar datos en la tabla COMIDA
        $sql_comida = "INSERT INTO COMIDA (tipo_comida, gl_1h, gl_2h, raciones, insulina, fecha, id_usu)
                       VALUES ('$tipo_comida', '$gl_1h', '$gl_2h', '$raciones', '$insulina', '$fecha', '$id_usu')";

        if ($conn->query($sql_comida) === TRUE) {
            // Insertar datos en la tabla HIPERGLUCEMIA
            $sql_hiper = "INSERT INTO HIPERGLUCEMIA (glucosa, hora, correccion, tipo_comida, fecha, id_usu)
                          VALUES ('$glucosa_hiper', '$hora_hiper', '$correccion', '$tipo_comida', '$fecha', '$id_usu')";

            if ($conn->query($sql_hiper) === TRUE) {
                // Insertar datos en la tabla HIPOGLUCEMIA
                $sql_hipo = "INSERT INTO HIPOGLUCEMIA (glucosa, hora, tipo_comida, fecha, id_usu)
                              VALUES ('$glucosa_hipo', '$hora_hipo', '$tipo_comida', '$fecha', '$id_usu')";

                if ($conn->query($sql_hipo) === TRUE) {
                    echo "Datos insertados correctamente.";
                } else {
                    echo "Error al insertar en HIPOGLUCEMIA: " . $conn->error;
                }
            } else {
                echo "Error al insertar en HIPERGLUCEMIA: " . $conn->error;
            }
        } else {
            echo "Error al insertar en COMIDA: " . $conn->error;
        }
    } else {
        echo "Error al insertar en CONTROL_GLUCOSA: " . $conn->error;
    }
} else {
    echo "Error al insertar en USUARIO: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>