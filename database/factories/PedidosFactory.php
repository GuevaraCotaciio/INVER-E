<?php

namespace Database\Factories;

use App\Models\Pedidos;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_cliente'=> $this->faker->numerify,
            'id_producto'=> $this->faker->numerify,
            'tipo_producto' => $this->faker->randomElement(['Comercial', 'Productora', 'Ventas']),
            'cantidad'=> $this->faker->numerify,
            'fecha_entrega'=> $this->faker->unique()->date,
            'hora_entrega'=> $this->faker->unique()->time,
        ];
    }
}
