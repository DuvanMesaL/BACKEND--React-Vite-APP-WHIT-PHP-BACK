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
            $table->enum('tipo_documento', ['CC', 'TI', 'CE', 'Pasaporte'])->nullable();
            $table->string('numero_documento');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo_electronico')->nullable()->unique('correo_electronico');
            $table->string('contrasena_hash')->nullable();
            $table->integer('id_rol')->default(2)->index('id_rol');
            $table->enum('estado_cuenta', ['Activo', 'Inactivo'])->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->timestamp('ultima_sesion')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->text('biografia')->nullable();
            $table->enum('preferencia_comunicacion', ['Email', 'Telefono', 'SMS'])->nullable();
            $table->boolean('eliminado')->nullable()->default(false);
            $table->timestamps();
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
