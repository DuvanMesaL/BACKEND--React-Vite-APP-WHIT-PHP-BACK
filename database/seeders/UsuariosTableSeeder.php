<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuariosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'tipo_documento' => 'CC',
                'numero_documento' => '123456789',
                'nombre' => 'John Doe',
                'correo_electronico' => 'john.doe@example.com',
                'contrasena_hash' => Hash::make('password'),
                'id_rol' => 1, // Asumiendo que el rol con ID 1 ya existe
                'estado_cuenta' => 'Activo',
                'direccion' => '123 Main St',
                'fecha_nacimiento' => '1990-01-01',
                'biografia' => 'Example biography.',
                'preferencia_comunicacion' => 'Email',
                'eliminado' => false,
            ],
            // Puedes añadir más usuarios aquí
        ]);
    }
}
