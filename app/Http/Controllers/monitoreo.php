<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

define('CAPACIDAD_MAXIMA', 50); // Cambia este valor según los lugares disponibles.

class monitoreo extends Controller
{
    public function monitoreo()
    {
        // Solo carga la vista sin lógica adicional
        return view('monitoreo');
    }

    public function mostrarMonitoreo()
    {
        // Capacidad total
        $capacidadTotal = CAPACIDAD_MAXIMA;

        // Contar vehículos registrados
        $totalVehiculos = Vehiculo::count();

        // Calcular porcentaje de ocupación
        $porcentajeOcupacion = round(($totalVehiculos / $capacidadTotal) * 100, 2);

        return view('monitoreo', [
            'totalVehiculos' => $totalVehiculos,
            'porcentajeOcupacion' => $porcentajeOcupacion,
            'capacidadTotal' => $capacidadTotal,
        ]);
    }
}
