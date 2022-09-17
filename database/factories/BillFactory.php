<?php

namespace Database\Factories;

use App\Models\Employe;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employe_id' => Employe::factory(),
            'project_id' => Project::factory(),
            'payment' => fake()->sentence(2),
            'amount' => fake()->numberBetween($min = 0, $max = 10000),
        ];
    }
}
