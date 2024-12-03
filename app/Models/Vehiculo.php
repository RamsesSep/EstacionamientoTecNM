<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Vehiculo extends Model
{
    protected $fillable = [
        'placas',
        'marca',
        'modelo',
        'color',
        'tipo',
        'numero_control'
    ];

    public function getQrCodeAttribute()
    {
        return QrCode::size(50)->generate(route('vehiculo.detalle', $this));
    }
}