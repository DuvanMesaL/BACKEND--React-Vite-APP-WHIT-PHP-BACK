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
        Schema::table('asignacion_herramientas', function (Blueprint $table) {
            $table->foreign(['codigo_obra'], 'asignacion_herramientas_ibfk_1')->references(['codigo_obra'])->on('obras')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['codigo_herramienta'], 'asignacion_herramientas_ibfk_2')->references(['codigo_herramienta'])->on('herramientas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asignacion_herramientas', function (Blueprint $table) {
            $table->dropForeign('asignacion_herramientas_ibfk_1');
            $table->dropForeign('asignacion_herramientas_ibfk_2');
        });
    }
};
