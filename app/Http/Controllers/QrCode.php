<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCode extends Controller
{
    public function generate()
    {
        #$qrCode = QrCode::size(250)->generate('https://www.example.com');
        #return view('qrcode', ['qrCode' => $qrCode]);
    }
}
