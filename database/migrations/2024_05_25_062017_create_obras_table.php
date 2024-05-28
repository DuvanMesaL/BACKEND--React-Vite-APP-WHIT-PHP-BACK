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
        Schema::create('obras', function (Blueprint $table) {
            $table->integer('codigo_obra', true);
            $table->string('nombre_proyecto');
            $table->text('descripcion');
            $table->string('ubicacion');
            $table->enum('estado', ['En Progreso', 'Finalizado', 'Cancelado']);
            $table->date('fecha_inicio');
            $table->date('fecha_fin_estimada')->nullable();
            $table->date('fecha_fin_real')->nullable();
            $table->integer('id_usuario')->index('id_usuario');
            $table->text('riesgos_seguridad')->nullable();
            $table->integer('creado_por')->nullable();
            $table->timestamp('creado_en')->useCurrent();
            $table->integer('actualizado_por')->nullable();
            $table->timestamp('actualizado_en')->useCurrentOnUpdate()->useCurrent();
            $table->boolean('eliminado')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
