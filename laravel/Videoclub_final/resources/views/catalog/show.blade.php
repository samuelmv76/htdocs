<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>VideoClub</title>
</head>
<body>
<!-- resources/views/catalog/show.blade.php -->

<h1>Detalles de la Película</h1>



<h2>Lista de Películas</h2>
<ul>
    @foreach ($arrayPeliculas as $pelicula)
        <li>{{ $pelicula->title }} - {{ $pelicula->year }}</li>  <!-- Cambia 'nombre' y 'anio' por los campos reales de la tabla -->
    @endforeach
</ul>

</body>
</html>