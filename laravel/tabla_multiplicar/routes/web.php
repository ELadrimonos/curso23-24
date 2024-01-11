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

Route::get('/', function (){
    return redirect('/tabla');
});

Route::get('tabla', function (){
    tabla(6);
});
Route::get('tabla/{num?}', function ($num){

    if (!is_numeric($num)){
        echo "El valor pasado no es un número valido, tabla del 2 por defecto";
        tabla(2);
    } else tabla($num);
});

function tabla($num): void
{
    for ($i = 1; $i <= 10; $i++) {
        echo "$num x $i = " . ($num * $i) . "<br>";
    }
}
