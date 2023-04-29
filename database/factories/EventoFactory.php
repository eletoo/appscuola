<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $assente = $this->faker->boolean(10);
        $data_inizio = $this->faker->dateTimeBetween('2022-09-12 08:00:00','2023-06-08 13:00:00');
        $data_fine = $this->faker->dateTimeBetween($data_inizio,'2023-06-08 13:00:00');

        return [
            'data_inizio' => $data_inizio,
            'data_fine' => $data_fine,
            'descrizione' => $this->faker->sentence(10),
            'assente' => $assente,
            'occupato' => !$assente
        ];
    }
}