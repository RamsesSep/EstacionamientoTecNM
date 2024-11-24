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
//Route::get('/menu/registrar-bicicleta', [MenuController::class, 'registrarBici']);
//Route::get('/menu/registrar-automovil', [MenuController::class, 'registrarAuto']);

Route::get('/', HomeController::class)->name('inicio.sesion');

Route::get('/menu', [MenuController::class, 'index'])->name('inicio');
Route::get('/menu/registro', [MenuController::class, 'registrarUsuario']);
Route::get('/menu/monitoreo', [MenuController::class, 'monitoreo'])->name('monitoreo');
Route::get('/menu/registrar-automovil', [MenuController::class, 'registrarAuto'])->name('registrar.auto');
Route::get('/menu/registrar-bicicleta', [MenuController::class, 'registrarBici'])->name('registrar.bici');
Route::get('/menu/perfil', [MenuController::class, 'perfil'])->name('perfil');
Route::get('/menu/qr', [MenuController::class, 'qr'])->name('qr');