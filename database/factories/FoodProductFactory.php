<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodProduct>
 */
class FoodProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'local_name' => fake()->words(),
            'scientific_name' => fake()->words(),
            'serving_size_g' => rand(20, 200)
        ];
    }
}
