<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>VideoClub</title>
</head>
<body>
<!-- resources/views/catalog/edit.blade.php -->

<h1>Editar Película</h1>

@if ($pelicula)
    <p><strong>Título:</strong> {{ $pelicula->title }}</p>
    <p><strong>Año:</strong> {{ $pelicula->year }}</p>
    
    <!-- Puedes agregar más campos aquí si la película tiene más información -->
    
    <form action="" method="POST">
        @csrf
        @method('PUT')
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $pelicula->title }}" required>
        
        <label for="anio">Año:</label>
        <input type="number" name="anio" value="{{ $pelicula->year }}" required>
        
        <button type="submit">Actualizar</button>
    </form>
@else
    <p>La película no se encuentra.</p>
@endif
</body>
</html>