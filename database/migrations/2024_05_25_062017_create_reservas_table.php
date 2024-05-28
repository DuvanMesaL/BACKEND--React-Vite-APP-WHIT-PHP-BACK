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
        Schema::create('reservas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_usuario')->index('id_usuario');
            $table->integer('codigo_herramienta')->index('codigo_herramienta');
            $table->timestamp('fecha_reserva')->useCurrent();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('creado_por')->nullable();
            $table->timestamp('creado_en')->useCurrent();
            $table->integer('actualizado_por')->nullable();
            $table->timestamp('actualizado_en')->useCurrentOnUpdate()->useCurrent();
            $table->enum('estado', ['Pendiente', 'Confirmada', 'En Espera', 'Cancelada', 'Finalizada']);
            $table->boolean('eliminado')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
