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
    
    public function registrarAuto()
    {
        return view('registroAuto');
    }

    public function monitoreo()
    {
        return view('monitoreo');
    }
}
