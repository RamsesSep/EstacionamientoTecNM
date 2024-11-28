<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    public function create()
    {
        return view('registroAuto');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            // ... otras validaciones
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048', // Validación de la imagen
        ]);

        $vehiculo = new Vehiculo;
        $vehiculo->marca = $request->marca;
        $vehiculo->modelo = $request->modelo;
        // ... asignar otros campos

        if ($request->hasFile('foto')) {
            $ruta = $request->file('foto')->store('public/imagenes'); // Guarda la imagen
            $vehiculo->foto = $ruta;
        }

        $vehiculo->save();

        return redirect()->route('registrar-vehiculo')->with('success', 'Vehículo registrado correctamente');
    }
}