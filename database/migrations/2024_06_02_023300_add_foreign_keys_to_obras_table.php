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
        Schema::table('obras', function (Blueprint $table) {
            $table->foreign(['id_usuario'], 'obras_ibfk_1')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['creado_por'], 'obras_ibfk_2')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['actualizado_por'], 'obras_ibfk_3')->references(['id'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('obras', function (Blueprint $table) {
            $table->dropForeign('obras_ibfk_1');
            $table->dropForeign('obras_ibfk_2');
            $table->dropForeign('obras_ibfk_3');
        });
    }
};
