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
        $day_of_week = $this->faker->randomElement(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']);

        $in_class = $this->faker->boolean(0.75);
        if ($in_class){
            $class = $this->faker->numberBetween(1,5).$this->faker->randomLetter();
        }else{
            $class = null;
        }

        return [
            'day_of_week' => $day_of_week,
            'hour_of_schoolday' => $this->faker->numberBetween(1,6),
            'class' => $class
        ];
    }
}