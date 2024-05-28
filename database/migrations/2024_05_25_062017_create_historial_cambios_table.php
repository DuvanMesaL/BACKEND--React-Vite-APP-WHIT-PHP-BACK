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
        Schema::create('historial_cambios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->enum('tipo_cambio', ['Herramienta', 'Obra']);
            $table->integer('id_elemento');
            $table->text('descripcion_cambio');
            $table->timestamp('fecha_cambio')->useCurrent();
            $table->integer('id_usuario')->index('id_usuario');
            $table->boolean('eliminado')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_cambios');
    }
};
