<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('Menu');
    }

    public function registrarBici()
    {
        return view('registroBici');
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
