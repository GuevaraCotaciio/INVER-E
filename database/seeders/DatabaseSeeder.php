<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        \App\Models\Persona::factory(20)->create();
        \App\Models\Empresa::factory(1)->create();
        \App\Models\Pedidos::factory(40)->create();
        \App\Models\Producto::factory(60)->create();
        \App\Models\Cliente::factory(25)->create();
    }
}
