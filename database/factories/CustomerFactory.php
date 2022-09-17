<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        
        return [
            'company' => fake()->company(),
            'adress' => fake()->country(),
            'category' => fake()->sentence(5),
            'person_id' => Person::factory(),
            
        ];
    }
}
