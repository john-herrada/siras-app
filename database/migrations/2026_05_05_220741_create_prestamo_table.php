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
        Schema::create('prestamo', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_cinta')
            ->references('codigo')
            ->on('cintas')
            ->onDelete('cascade');
            $table->string('usuario_solicitud')
            ->references('id_usuario')
            ->on('users')
            ->onDelete('cascade');
            $table->datetime('fecha_prestamo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamo_models');
    }
};
