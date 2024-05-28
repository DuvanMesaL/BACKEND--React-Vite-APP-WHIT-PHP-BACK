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
        Schema::create('historial_mantenimiento', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('codigo_herramienta')->index('codigo_herramienta');
            $table->date('fecha_mantenimiento');
            $table->integer('creado_por')->nullable()->index('creado_por');
            $table->timestamp('creado_en')->useCurrent();
            $table->integer('actualizado_por')->nullable()->index('actualizado_por');
            $table->timestamp('actualizado_en')->useCurrentOnUpdate()->useCurrent();
            $table->text('detalles');
            $table->decimal('coste', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_mantenimiento');
    }
};
