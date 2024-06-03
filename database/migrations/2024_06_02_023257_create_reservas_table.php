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
            $table->integer('id_usuario')->nullable()->index('id_usuario');
            $table->integer('codigo_herramienta')->nullable()->index('codigo_herramienta');
            $table->timestamp('fecha_reserva')->useCurrent();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->integer('creado_por')->nullable()->index('creado_por');
            $table->timestamp('creado_en')->useCurrent();
            $table->integer('actualizado_por')->nullable()->index('actualizado_por');
            $table->timestamp('actualizado_en')->nullable();
            $table->enum('estado', ['Pendiente', 'Confirmada', 'En Espera', 'Cancelada', 'Finalizada'])->nullable();
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
