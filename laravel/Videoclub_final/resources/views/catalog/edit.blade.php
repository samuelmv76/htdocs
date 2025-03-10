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
            <input type="text" name="nombre" value="{{ $pelicula->title }}" required>
            
            <label for="anio">Año:</label>
            <input type="number" name="anio" value="{{ $pelicula->year }}" required>
            
            <button type="submit">Actualizar</button>
        </form>
    @else
        <p>La película no se encuentra.</p>
    @endif
@stop