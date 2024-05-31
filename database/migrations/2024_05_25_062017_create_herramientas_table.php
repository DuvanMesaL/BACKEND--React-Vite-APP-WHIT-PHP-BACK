<?php

//2024_05_25_062017_create_herramientas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHerramientasTable extends Migration
{
    public function up()
    {
        Schema::create('herramientas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->enum('estado', ['Disponible', 'Asignada', 'Perdida', 'En Mantenimiento', 'Eliminado']);
            $table->string('categoria')->nullable();
            $table->date('fecha_adquisicion')->nullable();
            $table->date('ultimo_mantenimiento')->nullable();
            $table->string('ubicacion_actual')->nullable();
            $table->foreignId('creado_por')->constrained('users');
            $table->foreignId('actualizado_por')->constrained('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('herramientas');
    }
}
