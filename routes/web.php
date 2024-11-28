<?php

//Esto es como importar clases de otros archivos haciendo uso de su namespace
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\VehiculoController;

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

Route::get('/registro', [MenuController::class, 'registrarUsuario'])->name('registro.usuario');
Route::get('/recuperar-contraseña', [MenuController::class, 'recuperar'])->name('recuperar.contraseña');

Route::get('/inicio', [MenuController::class, 'index'])->name('inicio');
Route::get('/inicio/monitoreo', [MenuController::class, 'monitoreo'])->name('monitoreo');
Route::get('/inicio/registrar-bicicleta', [MenuController::class, 'registrarBici'])->name('registrar.bici');
Route::get('/inicio/perfil', [MenuController::class, 'perfil'])->name('perfil');
Route::get('/inicio/qr', [MenuController::class, 'qr'])->name('qr');


#Route::get('/inicio/registrar-automovil', [MenuController::class, 'registrarAuto'])->name('registrar.auto');
Route::get('/inicio/registrar-vehiculo', [VehiculoController::class, 'create'])->name('registrar.auto');
Route::post('/inicio/registrar-vehiculo', [VehiculoController::class, 'store']);