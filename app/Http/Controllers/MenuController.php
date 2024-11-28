<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('Menu');
    }

    public function registrarUsuario()
    {
        return view('registro');
    }

    public function registrarBici()
    {
        return view('registroBici');
    }

    public function monitoreo()
    {
        return view('monitoreo');
    }

    public function perfil()
    {
        return view('perfil');
    }

    public function qr()
    {
        return view('codigoQR');
    }

    public function recuperar()
    {
        return view('recuperar');
    }
}
