<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class PersonaleFactory extends Factory
{
    public function definition()
    {
        return [
            'firstname'=>$this->faker->firstName(), 
            'lastname'=>$this->faker->lastName(),
            'ruolo'=>'Docente'
        ];
    }
}
