<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    // Controlador de enrutamiento
    public function create()
    {
        return view('registroAuto');
    }

    // Controlador store | Request $request
    public function store(Request $request)
    {
        $vehiculo = new Vehiculo();

        $vehiculo->placas = $request->placasVehiculo;
        $vehiculo->marca  = $request->marcaVehiculo;
        $vehiculo->modelo = $request->modeloVehiculo;
        $vehiculo->color  = $request->color;
        $vehiculo->tipo   = $request->tipo;
        $vehiculo->numero_control = $request->numeroControl;

        $vehiculo->save();

        return redirect('/inicio');
    }

    public function getVehiculos(Request $request)
    {
        // Obtener el número de control del localStorage
        $numeroControl = $request->input('numero_control');
        
        //echo "Este es el numero de control:".$numeroControl;
        // Recupera todos los registros de la tabla 'vehiculos'
        /*
        $vehiculos = Vehiculo::all();
        // Envía los datos a la vista
        return view('Menu', compact('vehiculos'));
        */
        // Obtener los vehículos del usuario con el número de control especificado
        $vehiculos = Vehiculo::where('numero_control', $numeroControl)->get();

        return view('Menu', compact('vehiculos'));
        //return response()->json($vehiculos); // Devolver los vehículos como JSON
    }

    public function index()
    {
        // Obtener los vehículos que quieres mostrar en el menú
        $vehiculos = Vehiculo::all();

        return view('Menu', compact('vehiculos'));
    }

    public function obtenerVehiculos()
    {
        //
    }

}
?>