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
        Schema::create('bicicletas', function (Blueprint $table) {
            $table->id('id_bicicleta');
            $table->string('nombrebici', 50)->nullable();
            $table->string('color', 50)->nullable();
            $table->integer('no_control')->nullable();
            $table->date('fecha_registro');
            $table->binary('fotoBici')->nullable();
            $table->timestamps();

            // Relaciones
            $table->foreign('no_control')->references('numero_control')->on('usuarios')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bicicletas');
    }
};
