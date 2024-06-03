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
            $table->integer('codigo_herramienta')->nullable()->index('codigo_herramienta');
            $table->string('tag')->nullable();
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
