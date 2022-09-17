<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'service_id' => Service::factory(),
            'estimed_date' => fake()->date(),
            'infos' => fake()->sentence(10)
            

        ];
    }
}
