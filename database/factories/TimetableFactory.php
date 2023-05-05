<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TimetableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $day_of_week = $this->faker->randomElement(['MON','TUE','WED','THU','FRI','SAT']);

        $class = $this->faker->randomElement([$this->faker->numberBetween(1,5).$this->faker->randomLetter(), null]);

        return [
            'day_of_week' => $day_of_week,
            'hour_of_schoolday' => $this->faker->numberBetween(1,6),
            'class' => $class
        ];
    }
}