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
        Schema::table('reservas', function (Blueprint $table) {
            $table->foreign(['id_usuario'], 'reservas_ibfk_1')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['codigo_herramienta'], 'reservas_ibfk_2')->references(['codigo_herramienta'])->on('herramientas')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropForeign('reservas_ibfk_1');
            $table->dropForeign('reservas_ibfk_2');
        });
    }
};
