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
        Schema::create('cintas', function (Blueprint $table) {
            $table->string('codigo')->primary;
            $table->string('caja_resguardo');
            $table->integer('anaquel');
            $table->integer('nivel');
            $table->string('sede');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('cintas');
    }
};
