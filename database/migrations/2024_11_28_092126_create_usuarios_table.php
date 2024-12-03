<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('numero_control');  
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('foto')->nullable();
            $table->enum('rol', ['usuario', 'administrador'])->default('usuario');
            $table->string('contraseña');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
