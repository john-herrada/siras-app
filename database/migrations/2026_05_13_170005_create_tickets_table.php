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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_referencia');
            $table->string('creado_por');
            $table->datetime('fecha_creacion');
            $table->string('nombre_usuario');
            $table->longText('detalles');
            $table->integer('piso');
            $table->string('ala');
            $table->string('referencia_ubicacion');
            $table->string('seguido_por')->nullable();
            $table->datetime('fecha_cierre')->nullable();
            $table->string('estatus')->default('En Proceso');
            $table->longText('observaciones_finales')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
