<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_persona'=> $this->faker->unique()->numerify,
            'estado_cliente'=> $this->faker->randomElement(['Activo', 'Inactivo']),
            'tipo_cliente' => $this->faker->randomElement(['Comercial', 'Productor', 'Tiendero']),
            'id_pedidos'=> $this->faker->unique()->numerify,
            'id_producto'=> $this->faker->unique()->numerify,
        ];
    }
}
