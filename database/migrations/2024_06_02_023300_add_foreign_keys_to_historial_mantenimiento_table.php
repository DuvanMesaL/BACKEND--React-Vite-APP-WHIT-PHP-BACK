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
        Schema::table('historial_mantenimiento', function (Blueprint $table) {
            $table->foreign(['codigo_herramienta'], 'historial_mantenimiento_ibfk_1')->references(['id'])->on('herramientas')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['creado_por'], 'historial_mantenimiento_ibfk_2')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['actualizado_por'], 'historial_mantenimiento_ibfk_3')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historial_mantenimiento', function (Blueprint $table) {
            $table->dropForeign('historial_mantenimiento_ibfk_1');
            $table->dropForeign('historial_mantenimiento_ibfk_2');
            $table->dropForeign('historial_mantenimiento_ibfk_3');
        });
    }
};
