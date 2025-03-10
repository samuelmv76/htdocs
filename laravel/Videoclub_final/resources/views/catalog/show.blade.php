@extends('layouts.master')

@section('content')
    <h1>Detalles de la Película</h1>

    <h2>Lista de Películas</h2>
    <ul>
        @foreach ($arrayPeliculas as $pelicula)
            <li>{{ $pelicula->title }} - {{ $pelicula->year }}</li>
        @endforeach
    </ul>
@stop