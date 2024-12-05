<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Micronutrient>
 */
class MicronutrientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vitamin_b1' => rand(0, 100),
            'vitamin_b2' => rand(0, 100),
            'vitamin_b3' => rand(0, 100),
            'vitamin_b5' => rand(0, 100),
            'vitamin_b6' => rand(0, 100),
            'vitamin_b7' => rand(0, 100),
            'vitamin_b9' => rand(0, 100),
            'vitamin_b12' => rand(0, 100),
            'vitamin_c' => rand(0, 100),
            'vitamin_a' => rand(0, 100),
            'vitamin_d' => rand(0, 100),
            'vitamin_e' => rand(0, 100),
            'vitamin_k' => rand(0, 100),
            'iron' => rand(0, 100),
            'manganese' => rand(0, 100),
            'copper' => rand(0, 100),
            'zinc' => rand(0, 100),
            'iodine' => rand(0, 100),
            'fluoride' => rand(0, 100),
            'selenium' => rand(0, 100)
        ];
    }
}
