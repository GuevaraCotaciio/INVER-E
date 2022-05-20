<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
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
            'apellido'=> $this->faker->lastName,
            'tipo_documento' => $this->faker->randomElement(['CC', 'TI', 'CE']),
            'documento'=> $this->faker->unique()->numerify,
            'genero'=> $this->faker->randomElement(['Mujer', 'Hombre']),
            'edad'=> $this->faker->numerify,
            'telefono'=> $this->faker->numerify,
            'ciudad'=> $this->faker->city,
            'direccion'=> $this->faker->unique()->address,
            'email'=> $this->faker->unique()->safeEmail,
            'tipo_persona'=> $this->faker->randomElement(['Cliente', 'Usuario']),
        ];
    }
}
