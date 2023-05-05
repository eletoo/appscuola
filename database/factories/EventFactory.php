<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $day_of_week = $this->faker->randomElement(['MON','TUE','WED','THU','FRI','SAT']);

        return [
            'description' => $this->faker->sentence(10),
            'day_of_week' => $day_of_week,
            'hour_of_schoolday' => $this->faker->numberBetween(1,6)
        ];
    }
}