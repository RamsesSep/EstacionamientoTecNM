<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class RegistroUsuarioController extends Controller
{
    public function registrarUsuario()
    {
        return view('registro');
    }

    public function nuevoUsuario(Request $request)
    {
        $usuario = new Usuario();

        $usuario->numero_control = $request->numeroControl;
        $usuario->nombre         = $request->usuario;
        $usuario->correo         = $request->correo;
        $usuario->foto           = $request->fotoPerfil;
        $usuario->rol            = "usuario";
        $usuario->contraseña     = $request->contraseña1;

        $usuario->save();

        return redirect('/inicio');
    }
}
