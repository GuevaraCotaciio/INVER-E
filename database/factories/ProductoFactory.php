<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=> $this->faker->name,
            'descripcion'=> $this->faker->randomElement(['lorem ipsum lorem ipsum', 'producto producto']),
            'tipo_producto'=> $this->faker->randomElement(['Adquirido', 'Producido']),
            'calibre_producto' => $this->faker->randomElement(['calibre #12', 'Calibre #10', 'Calibre #8']),
            'clasificacion_producto'=> $this->faker->randomElement(['Carne', 'Condimentos', 'implementos']),
            'cantidad'=> $this->faker->numerify,
            'duracion'=> $this->faker->dayOfMonth,
            'fecha_vencimiento'=> $this->faker->randomElement(['2022-04-11', '2022-04-29', '2022-05-28']),
            'estado_producto'=> $this->faker->randomElement(['Disponible', 'Vencido']),
            'peso_unitario'=> $this->faker->numerify,
            'proveedor'=> $this->faker->userName,
            'valor_venta'=> $this->faker->numerify,
            'valor_compra'=> $this->faker->numerify,
        ];
    }
}
