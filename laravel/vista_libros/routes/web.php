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

Route::get("/", function () {
   return redirect("/listado");
});

Route::get('listado', function() {
    $libros = array(
        array("titulo" => "El juego de Ender",
            "autor" => "Orson Scott Card"),
        array("titulo" => "La tabla de Flandes",
            "autor" => "Arturo Pérez Reverte"),
        array("titulo" => "La historia interminable",
            "autor" => "Michael Ende"),
        array("titulo" => "El Señor de los Anillos",
            "autor" => "J.R.R. Tolkien")
    );
    return view('listado', compact('libros'));
})->name('listado_libros');
