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
        Schema::create('herramientas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo_herramienta', 10); // Limitar a 10 caracteres
            $table->text('descripcion')->nullable();
            $table->enum('estado', ['Disponible', 'Asignada', 'Perdida', 'En Mantenimiento', 'Eliminado']);
            $table->string('categoria')->nullable();
            $table->date('fecha_adquisicion')->nullable();
            $table->date('ultimo_mantenimiento')->nullable();
            $table->string('ubicacion_actual')->nullable();
            $table->string('foto_url')->nullable();
            $table->timestamps();
            $table->foreignId('creado_por')->constrained('usuarios');
            $table->foreignId('actualizado_por')->constrained('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('herramientas');
    }
};
