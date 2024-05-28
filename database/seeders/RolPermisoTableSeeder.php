<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolPermisoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('rol_permiso')->insert([
            ['id_rol' => 1, 'id_permiso' => 1], // Asumiendo que el rol con ID 1 y permiso con ID 1 ya existen
            ['id_rol' => 1, 'id_permiso' => 2],
            ['id_rol' => 1, 'id_permiso' => 3],
            // Añade más asignaciones de rol_permiso según sea necesario
        ]);
    }
}
