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
            $table->string('nombre_proyecto')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('ubicacion')->nullable();
            $table->enum('estado', ['En Progreso', 'Finalizado', 'Cancelado'])->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin_estimada')->nullable();
            $table->date('fecha_fin_real')->nullable();
            $table->integer('id_usuario')->nullable()->index('id_usuario');
            $table->text('riesgos_seguridad')->nullable();
            $table->integer('creado_por')->nullable()->index('creado_por');
            $table->timestamp('creado_en')->useCurrent();
            $table->integer('actualizado_por')->nullable()->index('actualizado_por');
            $table->timestamp('actualizado_en')->nullable();
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
