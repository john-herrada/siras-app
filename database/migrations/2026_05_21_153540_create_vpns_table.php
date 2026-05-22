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
        Schema::create('vpn', function (Blueprint $table) {
            $table->id('Id');
            $table->string('nombre_usuario');
            $table->string('puesto');
            $table->integer('telefono');
            $table->integer('extension');
            $table->string('correo');
            $table->string('area');
            $table->string('direccion_ip');
            $table->string('usuario');
            $table->string('clave');
            $table->string('jefe_inmediato');
            $table->string('cargo');
            $table->datetime('fecha_incorporacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vpns');
    }
};
