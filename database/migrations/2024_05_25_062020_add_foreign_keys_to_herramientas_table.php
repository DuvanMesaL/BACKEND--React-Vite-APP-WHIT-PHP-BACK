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
        Schema::table('herramientas', function (Blueprint $table) {
            $table->foreign(['creado_por'], 'herramientas_ibfk_1')->references(['id'])->on('usuarios')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['actualizado_por'], 'herramientas_ibfk_2')->references(['id'])->on('usuarios')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('herramientas', function (Blueprint $table) {
            $table->dropForeign('herramientas_ibfk_1');
            $table->dropForeign('herramientas_ibfk_2');
        });
    }
};
