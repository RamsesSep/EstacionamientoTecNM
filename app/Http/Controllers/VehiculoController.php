<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Bicicleta;

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
        // Recuperar el número de control desde la sesión
        $numeroControl = $request->session()->get('numeroControl');

        //$vehiculos = Vehiculo::all(); // Recupera todos los registros de la tabla 'vehiculos'
        // Obtener los vehículos que tienen el mismo número de control (si es necesario)
        $vehiculos = Vehiculo::where('numero_control', $numeroControl)->get();
        $bicicletas = Bicicleta::where('no_control', $numeroControl)->get();

        //return view('Menu', compact('vehiculos')); // Envía los datos a la vista
        // Enviar los datos a la vista, incluyendo los vehículos y el número de control
        return view('Menu', compact('vehiculos', 'bicicletas', 'numeroControl'));
    }

    public function index()
    {
        // Obtener los vehículos que quieres mostrar en el menú (ajusta según tu lógica)
        $vehiculos = Vehiculo::all();

        return view('Menu', compact('vehiculos'));
    }

}
?>