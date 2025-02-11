<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    return view('welcome');
return view('home', array('nombre' => 'Pedro'));
});

Route::get('/pagina1', function () {
return 'Hola Mundo desde la página 1';
});

Route::get('pagina2/{id}', function($id)
{
return 'User '.$id;
});
/*
Route::get('user/{name?}', function($name = null)
{
return $name;
});
*/
Route::get('user/{id}', function($id)
{
//
})
->where('id', '[0-9]+');