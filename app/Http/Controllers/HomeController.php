<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('Inicio');
    }

    public function loguearse(Request $request)
    {
        // Metodo para usar el modelo
        $Usuario = new Usuario();

        // Recuperamos los datos de la tabla usuarios
        //$Usuario->numero_control = $request->numero_control;
        //$Usuario->contraseña = $request->contraseña;
        
        // Obtener el número de control y la contraseña del formulario
        $numeroControl = $request->input('numero_control');
        $contraseña = $request->input('contraseña');

        echo $numeroControl;
        echo $contraseña;
        // Solo para verificar que si optengo los datos
        //dd($Usuario->numero_control, $Usuario->contraseña);

        // Buscar al usuario en la base de datos por su número de control
        $usuario = Usuario::where('numero_control', $numeroControl)->first();

        // Si el usuario existe y la contraseña es correcta
        if ($usuario && ($contraseña == $usuario->contraseña))
        {
            // Autenticar al usuario
            Auth::login($usuario);
            $request->session()->regenerate();

            // Redirigir a la página principal
            //return redirect()->intended('/inicio');
            return redirect('/inicio')->with('numeroControl', $numeroControl);
        } 
        else 
        {
            // Autenticación fallida
            return back()->withErrors(['error' => 'Credenciales incorrectas']);
        }
        
    }
}
