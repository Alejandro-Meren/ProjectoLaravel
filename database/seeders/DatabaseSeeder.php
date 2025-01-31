<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Servicio;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $usuarios = [
            ['name' => 'Alejandro', 'email' => 'alejandro@example.com', 'password' => bcrypt('12345678')],
            ['name' => 'Maria', 'email' => 'maria@example.com', 'password' => bcrypt('12345678')],
            ['name' => 'Jose', 'email' => 'jose@example.com', 'password' => bcrypt('12345678')],
        ];

        foreach ($usuarios as $usuario) {
            User::create($usuario);
        }

        // Cliente::factory(10)->create();
        $servicios = [
            ['nombre' => 'Corte de Cabello', 'precio' => 15.00],
            ['nombre' => 'Tinte de Cabello', 'precio' => 40.00],
            ['nombre' => 'Peinado', 'precio' => 25.00],
            ['nombre' => 'Manicura', 'precio' => 20.00],
            ['nombre' => 'Pedicura', 'precio' => 25.00],
            ['nombre' => 'Depilación con Cera', 'precio' => 30.00],
            ['nombre' => 'Tratamiento Capilar', 'precio' => 50.00],
        ];

        foreach ($servicios as $servicio) {
            Servicio::create($servicio);
        }
    }
}