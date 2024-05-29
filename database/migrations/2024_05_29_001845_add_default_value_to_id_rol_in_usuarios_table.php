<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueToIdRolInUsuariosTable extends Migration
{
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->integer('id_rol')->default(2)->change();  // Asigna el valor por defecto deseado
        });
    }

    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->integer('id_rol')->change();
        });
    }
}

