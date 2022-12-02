<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $fecha = Carbon::now("America/Mexico_City")->format("Y-m-d H:i:s");
        User::insert(
            ['name' => 'Administrador UTVT',
            'email' => 'admin@utvt.com',
            'password' => Hash::make('123admin'),
            'tipo_usuario' => 1, 
            'activo' => 1,],
        );
        User::insert(
            ['name' => 'Usuario UTVT',
            'email' => 'usuario@utvt.com',
            'password' => Hash::make('123usuario'),
            'tipo_usuario' => 2,
            'activo' => 1]
        );
    }
}
