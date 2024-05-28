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
        Schema::create('telefonos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_usuario')->index('id_usuario');
            $table->string('numero', 20);
            $table->enum('tipo', ['Móvil', 'Fijo']);
            $table->boolean('contacto_emergencia')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefonos');
    }
};
