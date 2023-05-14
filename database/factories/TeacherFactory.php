<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    public function definition()
    {
        return [
            'firstname'=>$this->faker->firstName(), 
            'lastname'=>$this->faker->lastName(),   
            'role'=>'Docente',
            'user_id'=>User::factory(),
        ];
    }
}
