<?php

// database/seeders/RolesTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['nombre_rol' => 'Admin'],
            ['nombre_rol' => 'User'],
        ]);
    }
}
