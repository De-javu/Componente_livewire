<?php

namespace Database\Seeders;

use App\Models\Formulario;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
         Formulario::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'thomas@moreno.com',
            'password' => bcrypt('Casa12345'), // Contraseña encriptada
        ]);
    }
}
