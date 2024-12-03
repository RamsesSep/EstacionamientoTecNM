<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    // Página de inicio
    public function __invoke()
    {
        return view('Inicio');
    }

    // Método para manejar el inicio de sesión
    public function loguearse(Request $request)
    {
        // Validar las entradas del formulario
        $validated = $request->validate([
            'numero_control' => 'required|string',
            'contraseña' => 'required|string',
        ]);

        // Buscar al usuario en la base de datos por número de control
        $usuario = Usuario::where('numero_control', $validated['numero_control'])->first();

        // Verificar si el usuario existe y la contraseña es válida
        if ($usuario && $validated['contraseña'] == $usuario->contraseña) 
        {
            $this->enviarDatos($usuario->numero_control);

            // Autenticar al usuario
            Auth::login($usuario);
            $request->session()->regenerate();

            // Almacenar datos en la sesión
            $request->session()->put('numeroControl', $usuario->numero_control);

            if ($usuario->rol == "administrador")
            {
                // Redirigir a la página de administrador
                return redirect('/registro-guardia');
            }
            else
            {
                // Redirigir a la página principal con los datos de sesión de usuario normal
                return redirect('/inicio')->with('success', 'Sesión iniciada correctamente');
            }
        }

        // Si las credenciales no son válidas
        return back()->withErrors(['error' => 'Credenciales incorrectas']);
    }

    // Enviar la variable de numero_control
    public function enviarDatos($numero_control)
    {
        return redirect('/inicio')->with('numero_control', $numero_control);
        //return redirect('/inicio/registrar-vehiculo/nuevo')->with('mensaje', $variable);
    }


    // Método para registrar un nuevo usuario
    public function registrar(Request $request)
    {
        // Validar las entradas
        $validated = $request->validate([
            'numero_control' => 'required|string|unique:usuarios',
            'contraseña' => 'required|string|min:8',
        ]);

        // Crear y guardar el nuevo usuario
        $usuario = new Usuario();
        $usuario->numero_control = $validated['numero_control'];
        $usuario->contraseña = Hash::make($validated['contraseña']); // Cifrar la contraseña
        $usuario->save();

        return redirect('/login')->with('success', 'Usuario registrado exitosamente');
    }
}
