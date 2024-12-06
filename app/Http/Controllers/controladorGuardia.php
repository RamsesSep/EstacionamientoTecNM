<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Bicicleta;

class controladorGuardia extends Controller
{
    public function registros()
    {
        // Obtener todos los vehiculos
        $vehiculos = Vehiculo::all();
        $bicicletas = Bicicleta::all();

        return view('registroGuardia', compact('vehiculos', 'bicicletas'));
    }

    public function scaneo()
    {
        return view('menuGuardia');
    }
}
