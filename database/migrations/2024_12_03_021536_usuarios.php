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
            $table->integer('numero_control')->unsigned()->primary();  
 // Asumiendo que numero_control es la clave primaria
            $table->string('nombre', 100);
            $table->string('correo', 100);
            $table->string('foto', 255)->nullable();
            $table->enum('rol', ['usuario', 'administrador'])->default('usuario');
            $table->string('contraseña', 255);
            $table->timestamps(); // Agrega las columnas created_at y updated_at
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
