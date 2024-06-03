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
        Schema::table('tags_herramientas', function (Blueprint $table) {
            $table->foreign(['codigo_herramienta'], 'tags_herramientas_ibfk_1')->references(['id'])->on('herramientas')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tags_herramientas', function (Blueprint $table) {
            $table->dropForeign('tags_herramientas_ibfk_1');
        });
    }
};
