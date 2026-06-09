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
        Schema::create('puertos', function (Blueprint $table) {

            $table->id();

            $table->string('id_html');

            $table->string('nombre_equipo');
            $table->string('serie');

            $table->string('fila');
            $table->string('rack');
            $table->string('posicion_rack');

            $table->string('puerto_origen');
            $table->string('puerto_destino');

            $table->string('fila_destino');
            $table->string('rack_destino');

            $table->string('equipo_destino');
            $table->string('serie_destino');

            $table->timestamps();

            $table->index([
                'fila',
                'rack',
                'id_html'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puertos');
    }
};
