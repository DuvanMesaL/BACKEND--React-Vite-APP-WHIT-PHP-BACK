<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('permisos')->insert([
            ['nombre_permiso' => 'create_user', 'descripcion' => 'Crear usuario'],
            ['nombre_permiso' => 'edit_user', 'descripcion' => 'Editar usuario'],
            ['nombre_permiso' => 'delete_user', 'descripcion' => 'Eliminar usuario'],
            // Añade más permisos según sea necesario
        ]);
    }
}
