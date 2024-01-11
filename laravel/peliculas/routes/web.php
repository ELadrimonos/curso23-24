<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return 'Pantalla Principal';
});

Route::get('login', function () {
    return 'login usuario';
});

Route::get('logout', function () {
    return 'logout usuario';
});

Route::get('catalog', function () {
    return 'Listado de peliculas';
});


// Quitando el valor por defecto de id, la pagina tiraria un error
Route::get('catalog/show/{id?}', function ($id) {
    return 'vista detalle película ' . $id;
});

Route::get('catalog/edit/{id?}', function ($id="?") {
    return 'modificar película ' . $id;
});

Route::get('catalog/create', function () {
    return 'Añadir';
});
