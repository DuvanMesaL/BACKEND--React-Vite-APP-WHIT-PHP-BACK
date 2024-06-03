<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCodigoHerramientaInHerramientasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('herramientas', function (Blueprint $table) {
            // Si el campo ya existe y solo necesitas actualizarlo
            $table->string('codigo_herramienta', 10)->default('0000000000')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('herramientas', function (Blueprint $table) {
            // Revertir los cambios si es necesario
            $table->string('codigo_herramienta', 10)->nullable(false)->change();
        });
    }
}
