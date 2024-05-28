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
        Schema::create('tags_herramientas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('codigo_herramienta')->index('codigo_herramienta');
            $table->string('tag');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags_herramientas');
    }
};
