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
        Schema::create('entregas', function (Blueprint $table) {
        $table->id();

        $table->foreignId('id_prestamo');
        $table->string('codigo_cinta');
        $table->string('usuario_solicitud');
        $table->dateTime('fecha_prestamo');
        $table->string('usuario_entrega')->nullable();
        $table->dateTime('fecha_entrega')->nullable();
        $table->string('estatus')->default('pendiente');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};
