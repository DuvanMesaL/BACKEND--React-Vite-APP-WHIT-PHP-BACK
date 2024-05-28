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
        Schema::create('asignacion_herramientas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('codigo_obra')->index('codigo_obra');
            $table->integer('codigo_herramienta')->index('codigo_herramienta');
            $table->date('fecha_asignacion');
            $table->date('fecha_fin')->nullable();
            $table->boolean('eliminado')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignacion_herramientas');
    }
};
