<?php

//Esto es como importar clases de otros archivos haciendo uso de su namespace
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;

//Get
//Post
//Put
//Patch
//Delete
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', HomeController::class);

Route::get('/menu', [MenuController::class, 'index']);
Route::get('/menu/registro', [MenuController::class, 'registrarUsuario']);
Route::get('/menu/monitoreo', [MenuController::class, 'monitoreo']);
Route::get('/menu/registrar-bicicleta', [MenuController::class, 'registrarBici']);
Route::get('/menu/registrar-automovil', [MenuController::class, 'registrarAuto']);