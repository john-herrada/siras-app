<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id_usuario' => 'jherrada',
            'nombre_apellido' => 'Jonathan Herrada',
            'password' => Hash::make('sener2026')
        ])->assignRole('Desarrollador');
    }
}
