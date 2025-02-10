<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pantalla principal');
});

Route::get('/login', function () {
    return 'Login usuario';
});

Route::get('/logout', function () {
    return 'Logout usuario';
});

Route::get('/catalog', function () {
    return 'Listado películas';
});

Route::get('/catalog/show/{id}', function ($id) {
    return 'Vista detalle película '.$id;
});

Route::get('/catalog/create', function() {
    return 'Añadir película';
});

Route::get('/catalog/edit/{id}', function ($id) {
    return 'Modificar película '.$id;
});
