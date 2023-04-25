<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sede;

class SedeFactory extends Factory
{
    public function definition()
    {
        /*$citta=$this->faker->city();
        return [
            'nome_sede'=>'Liceo "G. Leopardi" - '.$citta, 
            'via'=>$this->faker->streetName(), 
            'civico'=>$this->faker->numberBetween(0, 100), 
            'CAP'=>$this->faker->numberBetween(20000,30000),
            'citta'=>$citta, 
            'provincia'=>$this->faker->state()
        ];*/
        return [];
    }
}
