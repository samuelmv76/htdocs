<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>VideoClub</title>
</head>
<body>
<!-- resources/views/catalog/edit.blade.php -->
@extends('layouts.master')

@section('content')
<h1>Editar Película</h1>

@if ($pelicula)
    <p><strong>Título:</strong> {{ $pelicula->title }}</p>
    <p><strong>Año:</strong> {{ $pelicula->year }}</p>
    
    
    <form action="" method="POST">
        @csrf
        @method('PUT')
        
        <label for="nombre">Nombre:</label>
        <p>{{ $pelicula->title }}</p>
        <label for="anio">Año:</label>
        <p>{{ $pelicula->year }}</p>
        
        
        
    </form>
@else
    <p>La película no se encuentra.</p>
@endif
@stop

</body>
</html>