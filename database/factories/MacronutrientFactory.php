<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Macronutrient>
 */
class MacronutrientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'calories' => rand(0, 200),
            'sugars_g' => rand(0, 200),
            'fibers_g' => rand(0, 200),
            'starch_g' => rand(0, 200),
            'proteins_g' => rand(0, 200),
            'saturated_fats_g' => rand(0, 200),
            'unsaturated_fats_g' => rand(0, 200),
        ];
    }
}
