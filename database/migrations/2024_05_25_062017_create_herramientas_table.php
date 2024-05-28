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
        Schema::create('herramientas', function (Blueprint $table) {
            $table->integer('codigo_herramienta', true);
            $table->string('nombre');
            $table->text('descripcion');
            $table->enum('estado', ['Disponible', 'Asignada', 'Perdida', 'En Mantenimiento', 'Eliminado']);
            $table->string('categoria');
            $table->date('fecha_adquisicion');
            $table->date('ultimo_mantenimiento')->nullable();
            $table->string('ubicacion_actual')->nullable();
            $table->boolean('eliminado')->nullable()->default(false);
            $table->integer('creado_por')->nullable()->index('creado_por');
            $table->timestamp('creado_en')->useCurrent();
            $table->integer('actualizado_por')->nullable()->index('actualizado_por');
            $table->timestamp('actualizado_en')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('herramientas');
    }
};
