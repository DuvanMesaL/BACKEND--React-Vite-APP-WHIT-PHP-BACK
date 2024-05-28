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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->enum('tipo_documento', ['CC', 'TI', 'CE', 'Pasaporte']);
            $table->string('numero_documento');
            $table->string('nombre');
            $table->string('correo_electronico')->unique('correo_electronico');
            $table->string('contrasena_hash');
            $table->integer('id_rol')->index('id_rol');
            $table->enum('estado_cuenta', ['Activo', 'Inactivo']);
            $table->timestamp('fecha_registro')->useCurrent();
            $table->timestamp('ultima_sesion')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->text('biografia')->nullable();
            $table->enum('preferencia_comunicacion', ['Email', 'Telefono', 'SMS'])->nullable();
            $table->boolean('eliminado')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
