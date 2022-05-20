<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=> $this->faker->company,
            'tipo_empresa'=> $this->faker->randomElement(['Comercial', 'Productora', 'Ventas']),
            'descripcion' => $this->faker->paragraph(),
            'ciudad'=> $this->faker->city,
            'direccion'=> $this->faker->unique()->address,
            'telefono'=> $this->faker->unique()->numerify,
            'email'=> $this->faker->unique()->companyEmail,
            'facebook'=> $this->faker->companyEmail,
            'instagram'=> $this->faker->companyEmail,
            'whatsapp'=> $this->faker->numerify,
            'imagen'=> $this->default('defaul.png'),

        ];
    }
}
