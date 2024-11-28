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
        Schema::create('automoviles', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincremental
            $table->string('placas', 10)->unique(); // Único, pero no clave primaria
            $table->string('marca', 50);
            $table->string('modelo', 50);
            $table->string('color', 50)->nullable();
            $table->string('tipo', 50)->nullable();
            $table->integer('numero_control')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automoviles');
    }
};
