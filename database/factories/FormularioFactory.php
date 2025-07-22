<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formulario>
 */
class FormularioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'cedula' => $this->faker->numberBetween(10000000, 99999999),
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'ciudad' => $this->faker->randomElement([
                'Bogotá',
                'Medellín',
                'Cali',
                'Barranquilla',
                'Cartagena',
            ]),
            'celular' => $this->faker->numerify('##########'),
            'fecha_inicial' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'fecha_final' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
