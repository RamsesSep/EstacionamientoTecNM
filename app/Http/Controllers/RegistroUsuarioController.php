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

        // Subir la imagen del usuario
        $file = $request->file('fotoPerfil');
        // Genera un id único o usa el id actual
        $idFotoPerfil = Usuario::max('numero_control') + 1;
        // Usamos el id_bicicleta como nombre del archivo
        $fileName = $idFotoPerfil . '.' . $file->getClientOriginalExtension();

        // Definir la ruta completa para guardar la imagen
        $filePath = public_path('image/perfil/' . $fileName); // Usamos public_path para guardar en public/image/data

        // Mover el archivo a la nueva ubicación
        $file->move(public_path('image/perfil'), $fileName); // Mueve el archivo a la carpeta 'public/image/data'

        // Verificar si el archivo se movió correctamente
        if (!file_exists($filePath)) {
            //\Log::error('Error al guardar la imagen en image/data: ' . $fileName);
            return back()->with('error', 'No se pudo guardar la imagen.');
        } else {
            //\Log::info('Imagen guardada correctamente en: ' . $filePath);
        }

        $usuario->numero_control = $request->numeroControl;
        $usuario->nombre         = $request->usuario;
        $usuario->correo         = $request->correo;
        $usuario->foto           = $request->fotoPerfil;
        $usuario->rol            = "usuario";
        $usuario->contraseña     = $request->contraseña1;
        $usuario->fotoUsuario    = $filePath;

        $usuario->save();

        return redirect('/');
    }
}
