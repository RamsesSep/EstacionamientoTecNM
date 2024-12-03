<?php

//Esto es como importar clases de otros archivos haciendo uso de su namespace

use App\Http\Controllers\controladorGuardia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\monitoreo;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\RegistroUsuarioController;

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

// RUTAS DE ACCESO AL SISTEMA
Route::get('/', HomeController::class)->name('inicio.sesion');
Route::post('/login', [HomeController::class, 'loguearse']);

// RUTA PARA REGISTRAR NUEVO USUARIO
Route::get('/registro', [RegistroUsuarioController::class, 'registrarUsuario'])->name('registro.usuario');
Route::post('/registro', [RegistroUsuarioController::class, 'nuevoUsuario']);

// RUTA PARA RECUPERAR CONTRASEÑA (modulo sin funcionar)
Route::get('/recuperar-contraseña', [MenuController::class, 'recuperar'])->name('recuperar.contraseña');

// RUTAS PRINCIPALES
Route::get('/inicio', [VehiculoController::class, 'getVehiculos'])->name('menu.autos');

// RUTA PARA EL MONITOREO DEL ESTACIONAMIENTO
//Route::get('/inicio/monitoreo', [monitoreo::class, 'monitoreo'])->name('monitoreo');
Route::get('/inicio/monitoreo', [monitoreo::class, 'mostrarMonitoreo'])->name('monitoreo');

Route::get('/inicio/registrar-bicicleta', [MenuController::class, 'registrarBici'])->name('registrar.bici');
Route::get('/inicio/perfil', [MenuController::class, 'perfil'])->name('perfil');
Route::get('/inicio/qr', [MenuController::class, 'qr'])->name('qr');

// RUTAS DEL REGISTRO DE AUTOS
Route::get('/inicio/registrar-vehiculo', [VehiculoController::class, 'create'])->name('registrar.auto');
// Esta es la ruta que usa el formulario de nuevo registro de vehiculo
Route::post('/inicio/registrar-vehiculo/nuevo', [VehiculoController::class, 'store']);
// Esta es la ruta que recupera los vehiculos
Route::get('/vehiculos/{vehiculo}', [VehiculoController::class, 'show'])->name('vehiculo.detalle');

Route::get('/registro-guardia', [controladorGuardia::class, 'registros'])->name('registros-vehiculos');
Route::get('/scaneo-guardia', [controladorGuardia::class, 'scaneo'])->name('scaneo-guardia');
