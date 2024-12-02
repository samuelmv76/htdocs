<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Color Aleatorio</title>
    <style>
        /* Estilos para el círculo */
        .circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            color: white;
            text-align: center;
            margin: 20px auto;
        }
        /* Estilos del botón */
        .button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
           session_start();
           require_once 'login.php';
           $conn = new mysqli($hn, $un, $pw, $db);
           if ($conn->connect_error) die("Fatal Error");
           
           if (isset($_POST['submit'])) {
          if (!empty($_POST['usu'])&& !empty($_POST['contra'])) {
              $_SESSION['usu'] = $_POST['usu'];
              $_SESSION['contra']= $_POST['contra'];
              $input_usu=$_SESSION['usu'];        
              $input_contra=$_SESSION['contra'];        
          
           $query = "SELECT nombre,clave FROM usuarios WHERE nombre='$input_usu' AND 
              clave='$input_contra'";
           $result = $conn->query($query);
           if ($result && ($result->num_rows >0)) {
              //echo'Se ha inciado sesion correctamente';
              echo'<h1>Simon</h1>';
              $rows = $result->fetch_assoc(); 
              echo '<br>';
              echo '<h1>Hola '. htmlspecialchars($rows['nombre']) . ', memoriza la combinacion</h1>'. '<br>';
              echo '<br>';

              
// Lista de colores
$colors = ['red', 'blue', 'green', 'yellow'];

for ($i=0; $i <4 ; $i++) { 
    // Selección aleatoria de un color
    $randomColor[$i] = $colors[array_rand($colors)];
?>
    <div class="circle" style="background-color: <?php echo $randomColor[$i]; ?>;">
        <?php echo ucfirst($randomColor[$i]); /*Primera letra en mayuscula*/?> 
    </div>
<?php 
}
    // Guardar el array en una variable de sesión
    $_SESSION['colores_adivinar'] = $randomColor;
    $_SESSION['colores'] = $colors;

              echo '<!-- Formulario para recargar la página y generar un nuevo color -->
<form action="jugar.php" method="POST">
    <button class="button" name="boton" type="submit">VAMOS A JUGAR</button>
</form>';
              exit;
          }
          
          else {
      
              echo 'Fatal error.';
              echo '<br>';
              echo '<a href="inicio.php">Volver</a>';
              exit;
              }
          }
      
          $conn->close();
      }
    ?>

</body>
</html>