<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Pantalla principal';
});

// ----------------------------------------
Route::get('login', function () {
    return "Login usuario";
});
Route::get('logout', function () {
    return "Logout usuario";
});


// ----------------------------------------
Route::prefix('familias-profesionales')->group(function () {
    Route::get('/', function () {
        return 'Listado familias profesionales';
    });

    Route::get('create', function () {
        return 'Añadir familia profesional';
    });

    Route::get('/show/{id}', function ($id) {
        return 'Vista detalle familia profesional ' . $id;
    }) -> where('id', '[0-9]+');

    Route::get('/edit/{id}', function ($id) {
        return 'Modificar familia profesional ' . $id;
    }) -> where('id', '[0-9]+');
});


// ----------------------------------------
Route::get('perfil/{id?}', function ($id = null) {
    if ($id === null)
        return 'Visualizar el usuario propio';
    return 'Visualizar el usuario de ' . $id;
}) -> where('id', '[0-9]+');

