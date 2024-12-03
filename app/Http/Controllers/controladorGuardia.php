<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class controladorGuardia extends Controller
{
    public function registros()
    {
        // Obtener todos los vehiculos
        $vehiculos = Vehiculo::all();

        return view('registroGuardia', compact('vehiculos'));
    }

    public function scaneo()
    {
        return view('menuGuardia');
    }
}
