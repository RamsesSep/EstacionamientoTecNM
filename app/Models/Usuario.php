<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    /*
    // Campos asignables de forma masiva
    protected $fillable = [
        'numero_control',
        'nombre',
        'correo',
        'foto',
        'rol',
        'contraseña'
    ];*/

    use HasFactory, Notifiable;

    protected $table = 'usuarios';  
 // Nombre de la tabla en la base de datos
    protected $primaryKey = 'numero_control'; // Clave primaria de la tabla
    public $incrementing = false; // Indica que la clave primaria no es autoincremental
    protected $keyType = 'int'; // Tipo de dato de la clave primaria

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'numero_control',
        'nombre',
        'correo',
        'foto',
        'rol',
        'contraseña',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'contraseña',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',  

    ];
}
